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
//     return view('welcome');
// });

Route::get('/', 'HomeController@home')->name('home');
Route::get('/home', 'HomeController@home');
Route::get('/about', 'AboutController@about')->name('about');
Route::get('/articles/{id}', 'ArticleController@artikel');