<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UpdateUser;
use App\User;
use App\Jobs\UploadDropzoneImage;

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

    public function uploadAvatar(Request $request)
    {
        return $this->dispatch(new UploadDropzoneImage($request));
    }

}