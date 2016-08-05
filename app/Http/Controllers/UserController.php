<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::orderBy('id', 'desc')->paginate(10);
    	return view('backend.user.index', compact('users'));
    }

    public function store(Request $request)
    {
    	// dd($request->input());
    	user::create( $request->input() + ['page_img' => $this->pageImgHandle($request)])
    			->categories()->sync([$request->input('category')]);
    	return redirect('/admin/user');
    }

    public function edit(user $user)
    {
    	return view('backend.user.edit', compact('user'));
    }

    public function update(user $user, Request $request)
    {
    	$user->update($request->input());
    	return redirect('/admin/user');
    }

    public function destroy(user $user)
    {
    	$user->delete();
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