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
Route::get('user/{id}', array('uses' => 'UserController@show', 'as' => 'profile'));
Route::get('user/{id}/posts', array('uses' => 'UserController@posts', 'as' => 'user.posts'));
// Posts
Route::resource('posts', 'PostController');
// Categories
Route::resource('categories', 'CategoryController', ['except' => ['create']]);
Route::resource('tags', 'TagController', ['except' => ['create']]);
// Movies
Route::get('movie/{id}', ['uses' => 'MovieController@show', 'as' => 'movie.show']);
Route::get('movie/{id}/getData','MovieController@getData');
Route::get('movies/getPopular','MovieController@getPopular');
Route::get('movies','MovieController@index');
// Roles
Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index']);
Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create']);
Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store']);
Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit']);
Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update']);
Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy']);
// Dashboard
Route::get('dashboard', array('uses' => 'DashboardController@index', 'as' => 'dashboard'));
Route::group(array('prefix' => 'dashboard'), function()
{
    Route::get('/', 'DashboardController@index');
    Route::get('settings', 'DashboardController@settings');
    Route::get('users', 'DashboardController@users');
	Route::get('posts', 'DashboardController@posts');
    Route::get('reviews', 'DashboardController@reviews');
    Route::get('news', 'DashboardController@news');
    Route::get('tags', 'DashboardController@tags');
    Route::get('categories', 'DashboardController@categories');
});
