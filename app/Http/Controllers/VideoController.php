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
		$videoes = Video::all();
    	return view('backend.video.index', compact('videoes'));		
	}

	public function create()
    {
    	return view('backend.video.create');
    }

    public function store(Request $request)
    {
    	$upload = new Upload($request);
    	$upload->saveVideo();
    	// Video::create( $request->input() + ['img' => $this->uploadImageHandle($request)]);
        alert()->success('创建成功！');
    	return redirect('/backend/video');
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->back();
    }

    public function upload(Upload $upload)
    {
        $file = $upload->saveVideo();

        $ffmHandler = new FfmpegHandler($file);
        $name = $ffmHandler->thumb($file);
        $duration = $ffmHandler->duration();

        Video::create([
            'user_id' => \Auth::user()->id,
            'name' => $name,
            'duration' => $duration
        ]);

        return $name;
    }

}
