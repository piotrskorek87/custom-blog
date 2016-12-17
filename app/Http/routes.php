<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

	// Authentication Routes
	Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
	Route::post('auth/login', 'Auth\AuthController@postLogin');
	Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

	// Registration Routes
	Route::get('auth/register', 'Auth\AuthController@getRegister');
	Route::post('auth/register', 'Auth\AuthController@postRegister');

	// Password Reset Routes
	Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
	Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
	Route::post('password/reset', 'Auth\PasswordController@reset');

    // Blog Routes
	Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
	Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);

	// Pages Routes
    Route::get('contact', 'PagesController@getContact');
    Route::post('contact', 'PagesController@postContact');
	Route::get('about', 'PagesController@getAbout');
	Route::get('/', 'PagesController@getIndex');


	Route::group(['middleware' => ['auth']], function () {

		// Posts Routes
		Route::get('posts/index', ['uses' => 'PostController@index', 'as' => 'posts.index']);
		Route::get('posts/create', ['uses' => 'PostController@create', 'as' => 'posts.create']);
	    Route::post('posts/store', ['uses' => 'PostController@store', 'as' => 'posts.store']);
		Route::get('posts/show/{id}', ['uses' => 'PostController@show', 'as' => 'posts.show']);
		Route::get('posts/edit/{id}', ['uses' => 'PostController@edit', 'as' => 'posts.edit']);
	    Route::post('posts/update/{id}', ['uses' => 'PostController@update', 'as' => 'posts.update']);
	    Route::post('posts/delete/{id}', ['uses' => 'PostController@destroy', 'as' => 'posts.destroy']);

		// Categories Routes
	    Route::get('categories/index', ['uses' => 'CategoryController@index', 'as' => 'categories.index']);
		Route::get('categories/create', ['uses' => 'CategoryController@create', 'as' => 'categories.create']);
	    Route::post('categories/store', ['uses' => 'CategoryController@store', 'as' => 'categories.store']);
		Route::get('categories/show/{id}', ['uses' => 'CategoryController@show', 'as' => 'categories.show']);
		Route::get('categories/edit/{id}', ['uses' => 'CategoryController@edit', 'as' => 'categories.edit']);
	    Route::post('categories/update/{id}', ['uses' => 'CategoryController@update', 'as' => 'categories.update']);
	    Route::post('categories/delete/{id}', ['uses' => 'CategoryController@destroy', 'as' => 'categories.destroy']);

		// Tags Routes
	    Route::get('tags/index', ['uses' => 'TagController@index', 'as' => 'tags.index']);
		Route::get('tags/create', ['uses' => 'TagController@create', 'as' => 'tags.create']);
	    Route::post('tags/store', ['uses' => 'TagController@store', 'as' => 'tags.store']);
		Route::get('tags/show/{id}', ['uses' => 'TagController@show', 'as' => 'tags.show']);
		Route::get('tags/edit/{id}', ['uses' => 'TagController@edit', 'as' => 'tags.edit']);
	    Route::post('tags/update/{id}', ['uses' => 'TagController@update', 'as' => 'tags.update']);
	    Route::post('tags/delete/{id}', ['uses' => 'TagController@destroy', 'as' => 'tags.destroy']);

		// Comments Routes
	    Route::get('comments/index', ['uses' => 'CommentsController@index', 'as' => 'comments.index']);
		Route::get('comments/create', ['uses' => 'CommentsController@create', 'as' => 'comments.create']);
	    Route::post('comments/store/{id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
		Route::get('comments/show/{id}', ['uses' => 'CommentsController@show', 'as' => 'comments.show']);
		Route::get('comments/edit/{id}', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
	    Route::post('comments/update/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
		Route::get('comments/delete_confirm/{id}', ['uses' => 'CommentsController@destroy_confirm', 'as' => 'comments.destroy_confirm']);
	    Route::post('comments/delete/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);

	    

	});


