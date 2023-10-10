<?php

namespace App\Classes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Utilities 
{
    public static function imageUpload($requestImageFileName, $requestName, $imageFileNameFromDB, $requestFileImage, $directoryName) 
    {
        if ($requestImageFileName == null) {
            if ($imageFileNameFromDB == null || $imageFileNameFromDB == "") {
                $imageFileName = "";
            } else {
                $imageFileName = $imageFileNameFromDB;
            }
        } else {
            if ($imageFileNameFromDB != "" && file_exists(public_path('/assets/images/' .$directoryName .'/'. $imageFileNameFromDB))) {
                unlink(public_path('/assets/images/' .$directoryName .'/'. $imageFileNameFromDB));
            }
            $nameFile = Str::random(16);
            $file = $requestFileImage;
            $imageFileName = $nameFile .'.'. $file->getClientOriginalExtension();
    
            $destinationPathDefault = public_path('/assets/images/'.$directoryName);
            $file->move($destinationPathDefault, $imageFileName);
        }
        return $imageFileName;
    }
 
}