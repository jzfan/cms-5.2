<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateAdmin;
use Cms\Admin;
use Cms\User;

class AdminController extends Controller
{
    public function index()
    {
    	$admins = Admin::with('user')->orderBy('id', 'asc')->get();
    	return view('backend.admin.index', compact('admins'));
    }

    public function store(CreateAdmin $request)
    {
        $user = User::whereIdOrEmail($request->input('id'), $request->input('email'))->first();
    	Admin::create(['user_id' => $user->id]);
    	return redirect('/backend/admin');
    }

    public function destroy(Admin $admin)
    {
    	$admin->delete();
    	return back();
    }
}
