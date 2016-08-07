<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
use App\Category;
use Image;

class ArticleController extends Controller
{
    public function show(Article $article)
    {
        return view('article', compact('article'));
    }

    public function index()
    {
    	$articles = Article::with('categories')->orderBy('id', 'desc')->paginate(10);

    	return view('backend.article.index', compact('articles'));
    }

    public function create()
    {
    	$categories = Category::all();
    	return view('backend.article.create', compact('categories'));
    }

    public function store(Request $request)
    {
    	Article::create($request->input() + ['page_img' => $this->pageImageHandle($request)]);
    	return redirect('/admin/article');
    }

    public function edit(Article $article)
    {
    	$categories = Category::all();
    	return view('backend.article.edit', compact('article', 'categories'));
    }

    public function update(Article $article, Request $request)
    {
        $article->update($request->input());
        return redirect('/admin/article');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return back();
    }

    private function pageImageHandle(Request $request)
    {
        $page_img = $request->file('page_img');
        $name = $page_img->getClientOriginalName();
        $page_img->move(public_path() . '/img/page_img', $name);
        return $name;
    }


    public function uploadEditorImages(Request $request)
    {
        $img = $request->file('image');
        $name = $img->getClientOriginalName();
        $imgPath = '/img/upload/';
        $img = Image::make($img)->resize(config('image.article.width'), config('image.article.height'))->save(public_path(). $imgPath. $name);
        echo env("APP_URL") . $imgPath . $name;       
    }
}
