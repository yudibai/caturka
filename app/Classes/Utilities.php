<?php

namespace App\Classes;

use Illuminate\Support\Facades\DB;

class Utilities 
{
    public static function imageUpload($requestImageFileName, $requestName, $imageFileNameFromDB, $requestFileImage, $directoryName) 
    {
        if ($imageFileNameFromDB) 
        {
            if ($requestImageFileName == null)
            {
                $imageFileName = $imageFileNameFromDB;
            } else {
                if ($imageFileNameFromDB != null)
                {
                    if (file_exists(public_path('/assets/images/' .$directoryName .'/'. $imageFileNameFromDB))) {
                        unlink(public_path('/assets/images/' .$directoryName .'/'. $imageFileNameFromDB));
                    }
                }
                $nameFile   =   str_replace(' ','-', strtolower($requestName));
                $file = $requestFileImage;
                $imageFileName = $nameFile .'.'. $file->getClientOriginalExtension();
        
                $destinationPathDefault = public_path('/assets/images/'.$directoryName);
                $file->move($destinationPathDefault, $imageFileName);
            }
        } else {
            $nameFile   =   str_replace(' ','-', strtolower($requestName));
            $file = $requestFileImage;
            $imageFileName = $nameFile .'.'. $file->getClientOriginalExtension();
    
            $destinationPathDefault = public_path('/assets/images/'.$directoryName);
            $file->move($destinationPathDefault, $imageFileName);
        }
        return $imageFileName;
    }
 
}