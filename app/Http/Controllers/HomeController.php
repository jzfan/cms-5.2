<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Cms\Article;
use Cms\Video;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->take(4)->get();
        $videos = Video::orderBy('id', 'desc')->take(2)->get();
        return view('home', compact('articles', 'videos'));
    }
}
