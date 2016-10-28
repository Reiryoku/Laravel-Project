<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Auth::routes();

Route::get('/', 'HomeController@index');

// User
Route::resource('users',
    'UserController', array(
        'names' => array('index' => 'users.index', 'show' => 'users.show', 'store' => 'users.store', 'edit' => 'users.edit', 'destroy' => 'users.destroy', 'create' => 'users.create')
    )
);
Route::get('user/{id}/posts', array('uses' => 'UserController@posts', 'as' => 'user.posts'));

// Posts
Route::resource('posts', 'PostController');

// Categories
Route::resource('categories', 'CategoryController', ['except' => ['create']]);
Route::resource('tags', 'TagController', ['except' => ['create']]);

// Movies
/* Route::resource('movies','MovieController'); */
Route::get('movie/{id}','MovieController@show');
Route::get('movies','MovieController@index');

// Social
$s = 'social.';
Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'SocialController@redirect']);
Route::get('/social/callback/{provider}',     ['as' => $s . 'callback',     'uses' => 'SocialController@callback']);