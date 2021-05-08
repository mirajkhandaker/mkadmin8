<?php

namespace App\Http\Controllers;

use App\CustomClass\OwnLibrary;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    private $moduleId = 6;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { OwnLibrary::validateAccess($this->moduleId,1);
        $users = User::with(['role:id,name','creator:id,name','updator:id,name'])->orderBy('name')->paginate(20);
        return view('backend.user.index',compact('users'));
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
            'contact_no' => 'required|unique:users',
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
        }else{
            $user = new User();
            $user->role_id = $request->role_id;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->contact_no = $request->contact_no;
            $user->password = Hash::make($request->password);

           $image = $request->file('photo');

            if ($image) {
                $image_name = Str::random(20);
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'public/upload/portfolio-pic/';
                $image_url = $upload_path . $image_full_name;
                $image->move($upload_path, $image_full_name);
                $user->photo = $image_url;
            }


            if ($user->save()){
                session()->flash("success","User Added");
                return redirect()->route("user.index");
            }else{
                session()->flash("error","User Not Added");
                return redirect()->back()->withInput();
            }
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
        }else{

            $user->role_id = $request->role_id;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->contact_no = $request->contact_no;
            $user->status = $request->status;
            if(!empty($request->password)){
                $user->password = Hash::make($request->password);
            }

            $image = $request->file('photo');

            if ($image) {
                if ($user->photo){
                    @unlink($user->photo);
                }
                $image_name = Str::random(20);
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'public/upload/portfolio-pic/';
                $image_url = $upload_path . $image_full_name;
                $image->move($upload_path, $image_full_name);
                $user->photo = $image_url;
            }


            if ($user->save()){
                session()->flash("success","User Updated");
                return redirect()->route("user.index");
            }else{
                session()->flash("error","User Not Updated");
                return redirect()->back()->withInput();
            }
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
        if ($user->delete()){
            session()->flash('success','User Delated');
            return redirect()->back();
        }else{
            session()->flash('error','User Delated');
            return redirect()->back();
        }
    }
}
