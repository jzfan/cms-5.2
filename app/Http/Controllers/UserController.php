<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UpdateUser;
use App\User;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::orderBy('id', 'desc')->paginate(10);
    	return view('backend.user.index', compact('users'));
    }

    public function edit(user $user)
    {
    	return view('backend.user.edit', compact('user'));
    }

    public function update(user $user, UpdateUser $request)
    {
    	$user->update($request->input());
    	return redirect('/backend/user');
    }

    public function destroy(user $user)
    {
        // dd($user);
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