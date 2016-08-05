<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Admin;

class RoleController extends Controller
{
    public function index()
    {
    	$admins = Admin::with('user')->get();
dd($admins->first()->profile());
    	return view('backend.role.index', compact('roles'));
    }

    public function create()
    {
    	$categories = Category::all();
    	return view('backend.role.create', compact('categories'));
    }

    public function store(Request $request)
    {
    	// dd($request->input());
    	Admin::create( $request->input() + ['page_img' => $this->pageImgHandle($request)])
    			->categories()->sync([$request->input('category')]);
    	return redirect('/admin/role');
    }

    public function edit(Admin $role)
    {
    	$categories = Category::all();
    	return view('backend.role.edit', compact('role', 'categories'));
    }

    public function update(Admin $role, Request $request)
    {
    	$role->update($request->input());
    	return redirect('/admin/role');
    }

    public function destroy(Admin $role)
    {
    	$role->delete();
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
