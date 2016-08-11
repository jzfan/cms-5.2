<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateCategory;
use App\Http\Requests\UpdateCategory;
use App\Category;
use App\Article;

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
        alert()->success('创建成功！');
    	return redirect('/backend/category');
    }

    public function update(Category $category, UpdateCategory $request)
    {
        $category->update($request->input());
        alert()->success('更新成功！');
        return redirect('/backend/category');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        alert()->success('删除成功！');
        return back();
    }

    public function show(Category $category)
    {
        $articles = $this->getArticlePageByCategory($category);
        return view('frontend.category', compact('articles'));
    }

    public function getArticlesByCategoryJson(Category $category)
    {
        $articles = $this->getArticlePageByCategory($category);
        return response()->json($articles);
    }

    public function getAllJson()
    {
        return response()->json(Category::all());
    }

    private function getArticlePageByCategory($category)
    {
        return Article::whereHas('categories', function ($q) use ($category) {
            $q->where('id', $category->id);
        })->paginate(config('cms.per_page'));
    }
}
