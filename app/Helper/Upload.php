<?php

namespace App\Helper;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use FFMpeg\FFMpeg;
use FFMpeg\Format\Video\X264;
use App\Video;

class Upload
{
	use DispatchesJobs;

	public $file;

	protected $ffmpeg;

	public function __construct(Request $request, $fileName='file')
	{
		if ($request->hasFile($fileName) && $request->file($fileName)->isValid()) {
			$this->file = $request->file($fileName);
		}		
	}

	public function saveVideo($path='video')
	{
		$destinationPath = public_path().'/'.$path;
		$file_name = md5(time() . rand(0, 1000) ). '.' . $this->file->getClientOriginalExtension();
    	if ($this->file->move($destinationPath, $file_name)){
    		return $destinationPath.'/'.$file_name;
    	}
    	return false;
	}

	// private function video2Mp4($path)
	// {
 // 		$ffmpeg = FFMpeg::create([
	// 	    'ffmpeg.binaries'  => '/usr/bin/ffmpeg',
	// 	    'ffprobe.binaries' => '/usr/bin/ffprobe' 
	// 	]);
	// 	$video = $ffmpeg->open($this->file);
	// 	$newName = str_random(12).'.mp4';
	// 	$destinationPath = public_path().'/'.$path.'/'.$newName;
	// 	$video->save(new X264('libmp3lame', 'libx264'), $destinationPath);
	// 	return $newName;			
	// }

}