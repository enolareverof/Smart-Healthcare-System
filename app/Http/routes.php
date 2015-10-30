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

// Routes for User Resource

Route::get('user/activate/{activation_code}', array(
	'as' => 'user.activate',
	'uses' => 'UserController@activate'
));
Route::get('user/login', array(
	'as' => 'user.get.login',
	'uses' => 'UserController@getLogIn'
));
Route::post('user/login', array(
	'as' => 'user.post.login',
	'uses' => 'UserController@postLogIn'
));
Route::get('user/logout', array(
	'middleware' => ['role:admin|moderator|user'],
	'as' => 'user.get.logout',
	'uses' => 'UserController@getLogOut'
));

Route::get('user', array(
	'as' => 'user.index',
	'uses' => 'UserController@index'
));
Route::get('user/create', array(
	'as' => 'user.create',
	'uses' => 'UserController@create'
));
Route::get('user/{user}', array(
	'as' => 'user.show',
	'uses' => 'UserController@show'
));
Route::post('user', array(
	'as' => 'user.store',
	'uses' => 'UserController@store'
));
Route::get('user/{user}/edit', array(
	'as' => 'user.edit',
	'uses' => 'UserController@edit'
));
Route::put('user/{user}', array(
	'as' => 'user.update',
	'uses' => 'UserController@update'
));
Route::patch('user/{user}', array(
	'as' => '',
	'uses' => 'UserController@update'
));
Route::delete('user/{user}', array(
	'as' => 'user.destroy',
	'uses' => 'UserController@destroy'
));


// Routes for Post Resource

Route::get('post', array(
	'as' => 'post.index',
	'uses' => 'PostController@index'
));
Route::get('post/create', array(
	'middleware' => ['role:admin|moderator|user'],
	'as' => 'post.create',
	'uses' => 'PostController@create'
));
Route::get('post/{post}', array(
	'as' => 'post.show',
	'uses' => 'PostController@show'
));
Route::post('post', array(
	'as' => 'post.store',
	'uses' => 'PostController@store'
));
Route::get('post/{post}/edit', array(
	'as' => 'post.edit',
	'uses' => 'PostController@edit'
));
Route::put('post/{post}', array(
	'as' => 'post.update',
	'uses' => 'PostController@update'
));
Route::patch('post/{post}', array(
	'as' => '',
	'uses' => 'PostController@update'
));
Route::delete('post/{post}', array(
	'as' => 'post.destroy',
	'uses' => 'PostController@destroy'
));

// Routes for Category Resource

Route::get('category', array(
	'as' => 'category.index',
	'uses' => 'CategoryController@index'
));
Route::get('category/create', array(
	'middleware' => ['role:admin|moderator'],
	'as' => 'category.create',
	'uses' => 'CategoryController@create'
));
Route::get('category/{category}', array(
	'as' => 'category.show',
	'uses' => 'CategoryController@show'
));
Route::post('category', array(
	'as' => 'category.store',
	'uses' => 'CategoryController@store'
));
Route::get('category/{category}/edit', array(
	'middleware' => ['role:admin|moderator'],
	'as' => 'category.edit',
	'uses' => 'CategoryController@edit'
));
Route::put('category/{category}', array(
	'as' => 'category.update',
	'uses' => 'CategoryController@update'
));
Route::patch('category/{category}', array(
	'as' => '',
	'uses' => 'CategoryController@update'
));
Route::delete('category/{category}', array(
	'as' => 'category.destroy',
	'uses' => 'CategoryController@destroy'
));

// Routes for Comment Resource

Route::get('comment', array(
	'as' => 'comment.index',
	'uses' => 'CommentController@index'
));
Route::get('comment/create', array(
	'as' => 'comment.create',
	'uses' => 'CommentController@create'
));
Route::get('comment/{comment}', array(
	'as' => 'comment.show',
	'uses' => 'CommentController@show'
));
Route::post('comment', array(
	'as' => 'comment.store',
	'uses' => 'CommentController@store'
));
Route::get('comment/{comment}/edit', array(
	'as' => 'comment.edit',
	'uses' => 'CommentController@edit'
));
Route::put('comment/{comment}', array(
	'as' => 'comment.update',
	'uses' => 'CommentController@update'
));
Route::patch('comment/{comment}', array(
	'as' => '',
	'uses' => 'CommentController@update'
));
Route::delete('comment/{comment}', array(
	'as' => 'comment.destroy',
	'uses' => 'CommentController@destroy'
));

// Routes for Review Resource

Route::get('review', array(
	'as' => 'review.index',
	'uses' => 'ReviewController@index'
));
Route::get('review/create', array(
	'middleware' => ['role:admin|moderator'],
	'as' => 'review.create',
	'uses' => 'ReviewController@create'
));
Route::get('review/{review}', array(
	'as' => 'review.show',
	'uses' => 'ReviewController@show'
));
Route::post('review', array(
	'as' => 'review.store',
	'uses' => 'ReviewController@store'
));
Route::get('review/{review}/edit', array(
	'middleware' => ['role:admin|moderator'],
	'as' => 'review.edit',
	'uses' => 'ReviewController@edit'
));
Route::put('review/{review}', array(
	'as' => 'review.update',
	'uses' => 'ReviewController@update'
));
Route::patch('review/{review}', array(
	'as' => '',
	'uses' => 'ReviewController@update'
));
Route::delete('review/{review}', array(
	'as' => 'review.destroy',
	'uses' => 'ReviewController@destroy'
));

// RESTful Resource Controllers
// Route::resource('user', 'UserController');
// Route::resource('post', 'PostController');
// Route::resource('category', 'CategoryController');
// Route::resource('comment', 'CommentController');

// Display all SQL executed in Eloquent
// Event::listen('illuminate.query', function($query)
// {
//     var_dump($query);
// });