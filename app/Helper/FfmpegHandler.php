<?php

namespace App\Helper;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use FFMpeg\FFMpeg;
use FFMpeg\FFProbe;
use FFMpeg\Format\Video\X264;
use App\Video;
use FFMpeg\Coordinate\TimeCode;

class FfmpegHandler
{
	protected static $ffm;
	protected static $ffp;

	protected $file;
	protected $video;
	protected $ffprobe;

	public function __construct($file)
	{
		self::$ffm = FFMpeg::create([
		    'ffmpeg.binaries'  => '/usr/bin/ffmpeg',
		    'ffprobe.binaries' => '/usr/bin/ffprobe' 
		    ]);
		self::$ffp = FFProbe::create([
		    'ffmpeg.binaries'  => '/usr/bin/ffmpeg',
		    'ffprobe.binaries' => '/usr/bin/ffprobe' 
		    ]);
		$this->file = $file;
		$this->video = self::$ffm->open($file);
		$this->ffprobe = self::$ffp->streams($file)->videos()->first();
	}

	public  function thumb()
	{
		$name = pathinfo($this->file)['filename'];
		$file_path = public_path('uploads/'). $name.'.jpg';
		$this->video->frame(TimeCode::fromSeconds(10))
    				->save($file_path);
    	\Image::make($file_path)->resize(480, 270)->save();			
    	return $name.'.jpg';
	}

	public function duration()
	{
		return (int) $this->ffprobe->get('duration');	
	}

}