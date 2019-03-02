<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Front\HomeController@index');

Route::get('/sign-in', 'Front\HomeController@signin');
Route::post('/sign-in', 'Front\User\UserController@login');

Route::get('/sign-up', 'Front\HomeController@signup');
Route::post('/sign-up', 'Front\User\UserController@register');

Route::group(['middleware' => ['logged.user']], function () {
    /** Posts */
    Route::get('/posts', 'Front\Post\PostController@index');
    Route::get('/posts/add', 'Front\Post\PostController@add');
    Route::post('/posts/add', 'Front\Post\PostController@save');
    Route::get('/posts/{id}', 'Front\Post\PostController@edit');

    Route::get('/sign-out', 'Front\HomeController@signout');

    /** Profile */
    Route::get('/profile/{slug}', 'Front\User\UserController@profile');
    Route::post('/profile/{slug}', 'Front\User\UserController@updateProfile');
});


