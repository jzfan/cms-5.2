<?php

namespace Cms\Helper;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use FFMpeg\FFMpeg;
use FFMpeg\Format\Video\X264;
use Cms\Video;
use Validator;
use Image;

class Upload
{
	use DispatchesJobs;

	public $file;

	protected $ffmpeg;

	public static function saveVideo($request, $save_path = 'video')
	{
		$file = $request->file('file');
		$destinationPath = public_path().'/'.$save_path;
		$file_name = md5(time() . rand(0, 1000) ). '.' . $file->getClientOriginalExtension();
    	if ($file->move($destinationPath, $file_name)){
    		return $destinationPath.'/'.$file_name;
    	}
    	return false;
	}

	public static function multiple_upload($request, $save_path = 'uploads')
	{
		$file = $request->file('file');	
	    // getting all of the post data
	    $file_name_arr = [];
	    foreach($file as $file) {
	      $rules = ['file' => 'required|mimes:png,gif,jpeg']; //'required|mimes:png,gif,jpeg,txt,pdf,doc'
	      $validator = Validator::make(['file'=> $file], $rules);
	      if($validator->fails()){
	      	return false;
	      }
	        $destinationPath = $save_path;
	        $filename = $file->getClientOriginalName();
	        $file->move($destinationPath, $filename);
	        $file_name_arr[] = $filename;
	    }
	    return $file_name_arr;
  	}

  	public static function multiple_upload_base64($request, $save_path = 'uploads')
  	{
  		$files = $request->input('file');
  		$file_name_arr = [];
  		foreach ($files as $file) {
  			$filename = str_random(12).'.jpg';
  			Image::make($file)->save(public_path($save_path. '/'. $filename));
  			$file_name_arr[] = $filename;
  		}
  		return $file_name_arr;
  	}

}