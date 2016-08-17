<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TestController extends Controller
{
    public function req(Request $request)
    {
    	$this->mg($request);
    	dd($request->input());
    }
    public function mg($request){
    	$request->merge(['i'=>2]);
    }

    public function index()
    {
    	return view('test');
    }

    public function upload(Request $request)
    {
    	$file = $request->input('file');
    	echo $file->getClientOriginalName();
    }

    public function ff()
    {
        $file = public_path().'/'.'a.wmv';
        $ffm = new \App\Helper\FfmpegHandler($file);
        echo $ffm->thumb();
    }
}
