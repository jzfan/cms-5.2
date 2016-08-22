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

	Route::auth();

	Route::get('/', 'HomeController@index');

	Route::get('/article/{article}', 'ArticleController@show');
	Route::get('/category/{category}', 'CategoryController@show');
	Route::get('/video/{video}', 'VideoController@show');

	Route::group(['prefix' => 'backend', 'middleware' => 'admin'], function(){
		Route::get('/', 'ArticleController@index');
		Route::resource('article', 'ArticleController', ['except' => 'show']);
		Route::resource('user', 'UserController', ['except' => ['show', 'create', 'store']]);
		Route::resource('admin', 'AdminController', ['except' => ['show', 'create', 'edit', 'update']]);
		Route::resource('category', 'CategoryController', ['except' => ['show', 'create', 'edit']]);
		Route::resource('slider', 'SliderController', ['except' => ['show']]);
		Route::resource('video', 'VideoController', ['except' => ['show', 'create', 'store', 'show', 'edit']]);

		Route::post('/article/uploadImage', 'ArticleController@uploadEditorImages');
		Route::post('/upload/avatar', 'UserController@uploadAvatar');
		
// Route::get('/test', 'TestController@index');
// Route::post('/test/upload', 'TestController@upload');
		Route::post('/upload/video', 'VideoController@upload');
		Route::get('/help/icon', 'HelperController@showIcons');
	});
});

Route::group(['prefix'=>'api', 'middleware'=>'api'], function(){

	Route::get('/slider/{category_id}', 'SliderController@getJsonByCategory');
	Route::get('/article', 'ArticleController@getJson');
	Route::get('/article/{id}', 'ArticleController@getOneJson');
	Route::get('/category/{category}', 'CategoryController@getArticlesByCategoryJson');
	Route::get('/category', 'CategoryController@getAllJson');
	Route::get('/video', 'VideoController@getJson');
	Route::post('/token', 'Auth\\JwtController@authenticate');
	Route::get('/user', 'Auth\\JwtController@getAuthenticatedUser');
	Route::post('/register', 'Auth\\JwtController@register');
});

Route::group(['prefix'=>'api', 'middleware'=>'throttle:1'], function(){
	Route::post('/verify', 'Auth\\JwtController@postVerify');
	Route::get('/verify/{phone}', 'Auth\\JwtController@getVerify');
});