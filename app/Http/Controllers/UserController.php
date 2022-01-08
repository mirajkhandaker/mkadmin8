<?php

namespace App\Http\Controllers;

use App\CustomClass\OwnLibrary;
use App\Models\ModuleToRole;
use App\Models\ModuleToUser;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    private $moduleId = 6;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        OwnLibrary::validateAccess($this->moduleId,1);

        if($request->ajax()){
            $name = $request->name;

            $users = User::with(['role:id,name','creator:id,name','updator:id,name'])
                ->orderBy('name');

            if (!empty($name)){
                $users = $users->where("name","LIKE","%$name%");
            }


            return DataTables::of($users)
                ->addColumn('actions', 'backend.user.action')
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('backend.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        OwnLibrary::validateAccess($this->moduleId,2);
        $roles = Role::select('id','name')->where('status','=',1)->get();
        return view('backend.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        OwnLibrary::validateAccess($this->moduleId,2);
        $rules = [
            'role_id' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'contact_no' => 'required|unique:users|max:15',
            'password' => 'required|min:5',
            'confirm_password' => 'required|same:password|min:5',
            'photo' => 'image'
        ];

        $message = [
            'role_id.required' => 'Role is required',
        ];

        $validation = Validator::make($request->all(),$rules,$message);

        if ($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }
        try {
            DB::transaction(function () use($request) {
                $user = new User();
                $user->role_id = $request->role_id;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->contact_no = $request->contact_no;
                $user->password = Hash::make($request->password);

                if ($request->file('photo')) {
                    $user->photo = OwnLibrary::uploadImage($request->file('photo'), 'portfolio-pic', 33.59, 18.89);
                }
                $user->save();

                // Assign Permission
                $this->assignPermission($request->role_id,$user->id);
            });
            session()->flash("success", "User Added");
            return redirect()->route("user.index");
        }catch (\Exception $exception){
            session()->flash("error", "User Not Added\n" . $exception->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        OwnLibrary::validateAccess($this->moduleId,3);
        $roles = Role::select('id','name')->where('status','=',1)->get();
        return view('backend.user.edit',compact('roles','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        OwnLibrary::validateAccess($this->moduleId,3);
        $rules = [
            'role_id' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'contact_no' => 'required|unique:users,contact_no,' . $user->id,
            'photo' => 'image'
        ];

        $message = [
            'role_id.required' => 'Role is required',
        ];

        if (!empty($request->password)){
            $rules['password'] = 'required|min:5';
            $rules['confirm_password'] = 'required|same:password|min:5';
        }

        $validation = Validator::make($request->all(),$rules,$message);

        if ($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }
        try {
            DB::transaction(function () use ($request,$user) {
                $currentRole = $user->role_id;
                $user->role_id = $request->role_id;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->contact_no = $request->contact_no;
                $user->status = $request->status;
                if (!empty($request->password)) {
                    $user->password = Hash::make($request->password);
                }

                if ($request->file('photo')) {
                    if ($user->photo && file_exists($user->photo)) {
                        @unlink($user->photo);
                    }
                    $user->photo = OwnLibrary::uploadImage($request->file('photo'), 'portfolio-pic', 100, 100, $quality = 65);
                }

                $user->save();
                //Change Permission if role change;
                if ($user->role_id != $currentRole) $this->assignPermission($request->role_id, $user->id, true);

            });
            session()->flash("success", "User Updated");
            return redirect()->route("user.index");
        }catch (\Exception $exception){
            session()->flash("error", "User Not Updated.\n".$exception->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        OwnLibrary::validateAccess($this->moduleId,4);
        if ($user->delete()) session()->flash('success','User Deleted');
        else session()->flash('error','User Not Deleted');
        return redirect()->back();
    }

    private function assignPermission($roleId,$userId,$isEdit = false){

        // Remove previous role
        if ($isEdit) ModuleToUser::where('user_id', $userId)->forceDelete();

        $roleActivityList = ModuleToRole::where('role_id', $roleId)->get();
        $data = array();
        if (!empty($roleActivityList)) {
            $i = 0;
            foreach ($roleActivityList as $rActivity) {
                $data[$i]['user_id'] = $userId;
                $data[$i]['module_id'] = $rActivity->module_id;
                $data[$i]['activity_id'] = $rActivity->activity_id;
                $i++;
            }
        }

        if (!empty($data)) {
            ModuleToUser::insert($data);
        }
    }
}
