<?php

use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::resource('posts', 'PostsController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


// Route::resource('/admin/users', 'Admin\UsersController', ['except' => ['show', 'create', 'store']]);

// Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
//     Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
// });

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});


// Route::get('/publisher/articles', 'Publisher\ArticlesController@index')->name('publisher.articles.index'); // same

Route::namespace('Publisher')->prefix('publisher')->name('publisher.articles.index')->middleware('can:create-posts')->group(function(){
    Route::get('/articles', 'ArticlesController@index');
});

