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
//     return view('index');
// });


Route::get('/', 'FrontEndController@index');
Route::get('/post/{slug}', 'FrontEndController@singlePost')->name('post.single');
Route::get('/category/{id}', 'FrontEndController@category')->name('category.single');
Route::get('/tag/{id}', 'FrontEndController@tag')->name('tag.single');
Route::get('/results', 'FrontEndController@result')->name('results');



Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::get('/admin/posts/trashed', 'PostController@trashed')->name('posts.trashed');
Route::get('/admin/posts/restore/{id}', 'PostController@restore')->name('posts.restore');
Route::get('/admin/posts/kill/{id}', 'PostController@kill')->name('posts.kill');

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){
    Route::resources([
        'posts' => 'PostController',
        'categories' => 'CategoryController',
        'tags' => 'TagsController',
        'users' => 'UserController',
        'profile' => 'ProfileController',
        'settings'=>"SettingController",
        'frontend'=>"FrontEndController",
        

    ]);
    Route::get('users/admin/{id}', 'UserController@admin')->name('users.admin');
    Route::get('users/not-admin/{id}', 'UserController@not_admin')->name('users.not.admin');
});




