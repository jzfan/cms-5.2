<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateCategory;
use App\Http\Requests\UpdateCategory;
use Cms\Category;
use Cms\Article;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::with('articles')->get();
    	$bg = ['green', 'aqua', 'red', 'yellow', 'maroon', 'purple', 'black', 'teal'];
    	$total = Article::all()->count();
    	return view('backend.category.index', compact('categories', 'bg', 'total'));
    }

    public function store(CreateCategory $request)
    {
    	Category::create($request->input());
    	return redirect('/backend/category');
    }

    public function update(Category $category, UpdateCategory $request)
    {
        $category->update($request->input());
        return redirect('/backend/category');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }

    public function show(Category $category)
    {
        $articles = $this->getArticlePageByCategory($category);
        return view('frontend.category', compact('articles'));
    }

    public function getArticlesByCategoryJson(Category $category)
    {
        $articles = $this->getArticlePageByCategory($category)->toArray();
        return response()->json(['data'=>$articles, 'code'=>200, 'message'=>'ok']);
    }

    public function getAllJson()
    {
        return response()->json(['data'=>Category::all()->toArray(), 'code'=>200, 'message'=>'ok']);
    }

    private function getArticlePageByCategory($category)
    {
        return Article::whereHas('categories', function ($q) use ($category) {
            $q->where('id', $category->id);
        })->simplePaginate(config('cms.per_page'));
    }
}
