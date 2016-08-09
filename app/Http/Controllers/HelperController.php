<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HelperController extends Controller
{
    public function showIcons()
    {
    	return view('backend.help.icons');
    }
}
