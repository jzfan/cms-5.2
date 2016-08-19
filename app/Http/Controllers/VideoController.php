<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Upload;
use App\Helper\FfmpegHandler;
use App\Http\Requests;
use App\Video;

class VideoController extends Controller
{
	public function index()
	{
		$videoes = Video::orderBy('id', 'desc')->get();
    	return view('backend.video.index', compact('videoes'));		
	}

    public function show(Video $video)
    {
        return view('frontend.video', compact('video'));
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->back();
    }

    public function upload(Upload $upload)
    {
        $file = $upload->saveVideo();
        $name = pathinfo($file)['filename'];

        $ffmHandler = new FfmpegHandler($file);
        $thumb = $ffmHandler->thumb($file);
        $duration = $ffmHandler->duration();
        Video::create([
            'user_id' => \Auth::user()->id,
            'name' => $name,
            'ext' => pathinfo($file)['extension'],
            'thumb' => $thumb,
            'duration' => $duration
        ]);

        return $name;
    }

    public function getJson()
    {
        $videos = Video::orderBy('id', 'desc')->get()->toArray();
        return response()->json(['data'=>$videos, 'code'=>200, 'message'=>'ok']);
    }

}
