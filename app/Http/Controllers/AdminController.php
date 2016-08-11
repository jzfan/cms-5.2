<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateAdmin;
use App\Admin;
use App\User;

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
        alert()->success('创建成功！');
    	return redirect('/backend/admin');
    }

    public function destroy(Admin $admin)
    {
    	$admin->delete();
        alert()->success('删除成功！');
    	return back();
    }
}
