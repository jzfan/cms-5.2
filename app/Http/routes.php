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
Route::group(['middleware'=>'web'], function(){

	Route::get('/', function () {
	    return view('welcome');
	});

	Route::auth();

	Route::get('/home', 'HomeController@index');

	Route::get('/article/{article}', 'ArticleController@show');

	Route::group(['prefix' => 'backend', 'middleware' => 'admin'], function(){
		Route::get('/', 'ArticleController@index');
		Route::resource('article', 'ArticleController', ['except' => 'show']);
		Route::resource('user', 'UserController', ['except' => ['show', 'create', 'store']]);
		Route::resource('admin', 'AdminController', ['except' => ['show', 'create', 'edit', 'update']]);
		Route::resource('category', 'CategoryController', ['except' => ['show', 'create', 'edit']]);
		Route::resource('slider', 'SliderController', ['except' => ['show']]);

		Route::post('/backend/article/uploadImage', 'ArticleController@uploadEditorImages');
		Route::get('/help/icon', 'HelperController@showIcons');
	});
});

Route::group(['prefix'=>'api', 'middleware'=>'api'], function(){

	Route::get('/slider', 'SliderController@getJson');
	Route::get('/article', 'ArticleController@getJson');
	Route::get('/category/{category}', 'CategoryController@getArticlesByCategoryJson');
	Route::get('/category', 'CategoryController@getAllJson');
	Route::post('/token', 'Auth\\JwtController@authenticate');
	Route::get('/user', 'Auth\\JwtController@getAuthenticatedUser');
});

Route::get('/category/{category}', 'CategoryController@show');