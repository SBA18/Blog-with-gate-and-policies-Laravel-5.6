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

// Route::get('/', function () {
//     $posts = \App\Post::where('status', true)->latest()->paginate(10);

//     return view('posts.index', compact('posts'));
// });
Route::get('/', 'PostsController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Posts Routes
Route::resource('posts', 'PostsController');

// Category routes
Route::resource('categories', 'CategoriesController');

Route::get('category/{category}', 'CategoriesController@show')->name('category');
Route::get('user/{user}', 'UsersController@showPost')->name('userPosts');