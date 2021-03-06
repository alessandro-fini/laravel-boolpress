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

Route::get('/', 'HomeController@index')->name('home_page');
Route::get('/contatti', 'HomeController@contacts')->name('guest.contacts');
Route::post('/contatti', 'HomeController@sendEmail')->name('guest.contacts.email');
Route::get('/posts', 'PostController@index')->name('guest.post.index');
Route::get('/posts/{slug}', 'PostController@show')->name('guest.post.show');

Auth::routes();

/* Route::get('/home', 'HomeController@index')->name('home')->middleware('auth'); */

Route::prefix('admin')
->namespace('Admin')
->middleware('auth')
->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/profile', 'HomeController@profile')->name('user.profile');
    Route::post('/token-gen', 'HomeController@tokenGen')->name('token-gen');
    Route::resource('post', 'PostController');
});
