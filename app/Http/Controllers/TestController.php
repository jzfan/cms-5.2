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
}
