<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::post('/admin/article/uploadImage', 'ArticleController@uploadEditorImages');
Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/article/{article}', 'ArticleController@show');

Route::group(['prefix' => 'admin'], function(){
	Route::get('/', 'ArticleController@index');
	Route::resource('article', 'ArticleController', ['except' => 'show']);
	Route::resource('user', 'UserController', ['except' => ['show', 'create', 'store']]);
	Route::resource('role', 'RoleController', ['except' => ['show', 'create', 'edit', 'update']]);
	Route::resource('category', 'CategoryController', ['except' => 'show']);
});
