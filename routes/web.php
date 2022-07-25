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
Route::group(['middleware' =>['auth']], function(){
    Route::get('/', 'PostController@index');
    Route::get('/posts/create', 'PostController@create');
    Route::get('/posts/{post}/edit', 'PostController@edit');
    Route::put('/posts/{post}', 'PostController@update');
    Route::delete('/posts/{post}', 'PostController@destroy');
    Route::get('/posts/{post}', 'PostController@show');
    Route::post('/posts', 'PostController@store');
    Route::get('/categories/{category}', 'CategoryController@index');
    Route::get('/user', 'UserController@index');
});




/*Route::get('/', function() {
    return view('posts/index');
});
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
