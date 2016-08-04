<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
    	$articles = Article::paginate(10);

    	return view('backend.article.index', compact('articles'));
    }
}
