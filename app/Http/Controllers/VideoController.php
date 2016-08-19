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

    public function upload(Upload $upload, Request $request)
    {
        $file_name = $upload->saveVideo();
        $ffmHandler = new FfmpegHandler($file_name);
        Video::create([
            'user_id' => \Auth::user()->id,
            'original_name' => $request->file('file')->getClientOriginalName(),
            'file_name' => pathinfo($file_name)['basename'],
            'ext' => $request->file('file')->getClientOriginalExtension(),
            'thumb' => $ffmHandler->thumb(),
            'duration' => $ffmHandler->duration()
        ]);

        return pathinfo($file_name)['filename'];
    }

    public function getJson()
    {
        $videos = Video::orderBy('id', 'desc')->get()->toArray();
        return response()->json(['data'=>$videos, 'code'=>200, 'message'=>'ok']);
    }

}
