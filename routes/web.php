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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add-post', 'PostController@create')->name('add-post');
Route::get('/manage-post', 'PostController@index')->name('manage-post');
Route::get('/edit-post', 'PostController@create')->name('edit-post');
Route::get('/delete-post', 'PostController@index')->name('delete-post');
Route::post('/save-post', 'PostController@store')->name('save-post');
