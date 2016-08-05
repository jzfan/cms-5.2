<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
use App\Category;

class ArticleController extends Controller
{

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
    	// dd($request->input());
    	Article::create( $request->input() + ['page_img' => $this->pageImgHandle($request)])
    			->categories()->sync([$request->input('category')]);
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

    private function pageImgHandle(Request $request)
    {
    	$page_img = $request->file('page_img');
    	$name = $page_img->getClientOriginalName();
    	$page_img->move(public_path() . '/img/page_img', $name);
    	return $name;
    }
}
