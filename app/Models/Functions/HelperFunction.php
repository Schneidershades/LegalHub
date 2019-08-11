<?php

namespace App\Models\Functions;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Session;
use File;
use Image;
use Storage;

class HelperFunction extends Model
{
    public static function uploadAnything($file, $name, $pathDirectory, $saveDatabaseAttribute, $w, $h){
    	$image = $file;
        $filename = $name . '.' . $image->getClientOriginalExtension();

        $directory = $pathDirectory;
        $path = $directory . $filename;

        if(!File::exists($directory)) {
            // path does not exist
            File::makeDirectory($directory, $mode = 0777, true, true);
        }

		list($width, $height, $type, $attr) = getimagesize($image);

        if($w==null){
            $w = 400;
        }

        if($h==null){
            $h = 250;
        }

		if($width < $height)
		{
        	Image::make($image)->resize($h, $w)->save($path);
		}else{
        	Image::make($image)->resize($w, $h)->save($path);
		}

        return $path;
    }
}
