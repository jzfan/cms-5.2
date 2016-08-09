<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
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

    public function store(Request $request)
    {
    	Category::create($request->input());
    	return redirect('/backend/category');
    }

    public function update(Category $category, Request $request)
    {
        $category->update($request->input());
        return redirect('/backend/category');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
}
