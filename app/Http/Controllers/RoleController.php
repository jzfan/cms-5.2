<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Admin;
use App\User;

class RoleController extends Controller
{
    public function index()
    {
    	$admins = Admin::with('user')->orderBy('id', 'asc')->get();
    	return view('backend.role.index', compact('admins'));
    }

    public function store(Request $request)
    {
        $user = User::whereIdOrEmail($request->input('id'), $request->input('email'))->first();
    	Admin::create(['user_id' => $user->id]);
    	return redirect('/admin/role');
    }

    public function destroy(Admin $admin)
    {
    	$admin->delete();
    	return back();
    }
}
