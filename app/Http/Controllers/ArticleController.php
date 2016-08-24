<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateArticle;
use App\Http\Requests\UpdateArticle;
use App\Article;
use App\Category;
use Image;
use Alert;
use App\Jobs\JpushJob;


class ArticleController extends Controller
{
    public function show(Article $article)
    {
        return view('frontend.article', compact('article'));
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
        $article = Article::create($request->input() + ['page_img' => $this->pageImageHandle($request)]);
        $article->categories()->attach($request->input('category'));
        return redirect('/backend/article');
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('backend.article.edit', compact('article', 'categories'));
    }

    public function update(Article $article, UpdateArticle $request)
    {
        $article->update($request->input() + ['page_img' => $this->pageImageHandle($request)]);
        $article->categories()->sync([$request->input('category')]);
        return redirect('/backend/article');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return back();
    }

    private function pageImageHandle($request)
    {
        $page_img = $request->file('page_img');
        $name = str_random(10) . '.' . $page_img->getClientOriginalExtension();
        $page_img->move(public_path() . '/img/page_img', $name);
        return $name;
    }

    // public function uploadEditorImages(Request $request)
    // {
    //     $img = $request->file('image');
    //     $name = $img->getClientOriginalName();
    //     $imgPath = '/img/upload/';
    //     $img = Image::make($img)->resize(config('image.article.width'), null, function ($constraint) {
    //             $constraint->aspectRatio();
    //         })->save(public_path(). $imgPath. $name);
    //     echo env("APP_URL") . $imgPath . $name;       
    // }

    public function getJson()
    {
        $articles = Article::orderBy('id', 'desc')->simplePaginate(config('cms.per_page'))->toArray();
        return response()->json(['data' => $articles, 'code' => 200, 'message' => 'ok']);
    }

    public function getOneJson($id)
    {
        $article = Article::find($id);
        if (is_null($article)){
            return response()->json(['code' => 1404, 'message' => 'not found']);
        }
        return response()->json(['data' => $article, 'code' => 200, 'message' => 'ok']);
    }

    public function push(Article $article)
    {
	unset($article->content);
        $response = $this->dispatch(new JpushJob($article));
        return response()->json($response);
    }
}
