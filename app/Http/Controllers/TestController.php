<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use PhpSms;

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

    public function sms()
    {
        $templates = [
    'YunTongXun' => '109524',
];
        $to = '13797528120';
        $res = PhpSms::make()->to($to)->template(['YunTongXun'=>config('phpsms.agents.YunTongXun.template_id.wuHanLianZheng')])
                ->data(['8888', '60'])
                ->send();
    dd($res);
    }
}
