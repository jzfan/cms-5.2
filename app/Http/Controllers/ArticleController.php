<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateArticle;
use App\Http\Requests\UpdateArticle;
use App\Article;
use App\Category;
use Image;
use Alert;

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

    public function store(CreateArticle $request)
    {
    	Article::create($request->input() + ['page_img' => $this->pageImageHandle($request)]);
        alert()->success('创建成功！');
    	return redirect('/backend/article');
    }

    public function edit(Article $article)
    {
    	$categories = Category::all();
    	return view('backend.article.edit', compact('article', 'categories'));
    }

    public function update(Article $article, UpdateArticle $request)
    {
        $article->update($request->input());
        $article->categories()->sync([$request->input('category')]);
        alert()->success('更新成功！');
        return redirect('/backend/article');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        alert()->success('删除成功！');
        return back();
    }

    private function pageImageHandle($request)
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
        $img = Image::make($img)->resize(config('image.article.width'), null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path(). $imgPath. $name);
        echo env("APP_URL") . $imgPath . $name;       
    }

    public function getJson()
    {
        $articles = Article::orderBy('id', 'desc')->simplePaginate(config('cms.per_page'))->toArray();
        return response()->json(['data'=>$articles, 'code'=>200, 'message'=>'ok']);
    }
}
