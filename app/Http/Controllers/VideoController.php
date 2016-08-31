<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cms\Helper\Upload;
use Cms\Helper\FfmpegHandler;
use App\Http\Requests;
use Cms\Video;

class VideoController extends Controller
{
	public function index()
	{
		$videos = Video::orderBy('id', 'desc')->paginate(6);
    	return view('backend.video.index', compact('videos'));		
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

    public function upload(Request $request)
    {
        $file_name = Upload::saveVideo($request);
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
