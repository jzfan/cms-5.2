<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::all();
    	$bg = ['aqua', 'green', 'red', 'yellow', 'maroon', 'purple', 'black', 'teal'];
    	return view('backend.category.index', compact('categories', 'bg'));
    }
}
