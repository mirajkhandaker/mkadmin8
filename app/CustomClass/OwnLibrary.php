<?php

namespace App\CustomClass;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class OwnLibrary {

    public static function validateAccess($moduleId = null, $activityId = null) {
        $haystack = Session::get('acl');

        $needle = array($moduleId => $activityId);

        if (!self::in_array_r($needle, $haystack)) {
            $url = route('admin.login.view');
            echo "<script> location.href='".$url."'; </script>";
            exit;
        }
    }

    public static function in_array_r($needle, $haystack) {

        $needleArr = array_keys($needle);
        $needleKey = $needleArr[0];
        $needleVal = $needle[$needleKey];

        foreach ($haystack as $key => $item) {
            if ($needleKey == $key) {
                foreach ($item as $activityItem) {
                    if ($needleVal == $activityItem) {
                        return true;
                    }
                }
            }
        }

        return false;
    }

    public static function paginationSerial($modelObject){
        return ($modelObject->currentpage()-1)* $modelObject->perpage() + 1;
    }

    public static function uploadImage($image,$folderName,$width=null,$height=null,$quality = 90,$fileName=null,$ext = 'webp'){
        $image_name = $fileName ?? Str::random(20);
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = 'upload/'.$folderName.'/';
        if(!File::isDirectory($upload_path)){
            File::makeDirectory($upload_path, 0777, true, true);
        }
        $image_url = $upload_path . $image_full_name;
        $img = Image::make($image);
        $img->encode($ext, $quality)->resize($width, $height,function($constraint)
        {
            $constraint->aspectRatio();
        })->save($image_url);
        return $image_url;
    }
}
