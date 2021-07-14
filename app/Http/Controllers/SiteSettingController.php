<?php

namespace App\Http\Controllers;

use App\CustomClass\OwnLibrary;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiteSettingController extends Controller
{
    protected $moduleId = 10;

    public function edit(){
        OwnLibrary::validateAccess($this->moduleId,3);
        $setting = SiteSetting::find(1);
        if (empty($setting)){
            $setting = new SiteSetting();
        }
        return view('backend.site-setting.edit',compact('setting'));
    }

    public function update(Request $request){
        OwnLibrary::validateAccess($this->moduleId,3);
        $rules = [
            'logo' => 'image',
            'icon' => 'image',
            'email' => 'required|email',
            'contact_no' => 'max:15',
            'site_title' => 'max:90',
            'meta_description' => 'max:180',
            'meta_keyword' => 'max:180',
            'copy_right' => 'max:50',
        ];

        $message = [

        ];

        $validation = Validator::make($request->all(),$rules,$message);

        if ($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }

        $setting = SiteSetting::find(1);

        if (empty($setting)){
            $setting = new SiteSetting();
        }

        $setting->email = $request->email ?? Null;
        $setting->contact_no = $request->contact_no ?? Null;
        $setting->site_title = $request->site_title ?? Null;
        $setting->meta_description = $request->meta_description ?? Null;
        $setting->meta_keyword = $request->meta_keyword ?? Null;
        $setting->copy_right = $request->copy_right ?? Null;

        if ($request->hasFile('icon')){
            if (!empty($setting->icon)){
                @unlink($setting->icon);
            }
            $icon = OwnLibrary::uploadImage($request->icon, "site-setting");
            $setting->icon = $icon;
        }

        if ($request->hasFile('logo')){
            if (!empty($setting->logo)){
                @unlink($setting->logo);
            }
            $logo = OwnLibrary::uploadImage($request->logo, "site-setting");
            $setting->logo = $logo;
        }

        if ($setting->save()){
            session()->flash("success","Site Setting Updated");
            return redirect()->route("site.setting.edit");
        }else{
            session()->flash("error","Site Setting Not Updated");
            return redirect()->back()->withInput();
        }
    }
}
