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
Route::get('/favorite-post', 'PostController@favorite')->name('favorite-post');
Route::get('/edit-post/{post_id}', 'PostController@edit')->name('edit-post');
Route::get('/fav-post/{post_id}', 'PostController@fav')->name('fav-post');
Route::get('/unfav-post/{post_id}', 'PostController@unfav')->name('unfav-post');
Route::get('/complete-post/{post_id}', 'PostController@complete')->name('complete-post');
Route::get('/un-complete-post/{post_id}', 'PostController@un_complete')->name('un-complete-post');
Route::get('/delete-post/{post_id}', 'PostController@destroy')->name('delete-post');
Route::post('/save-post', 'PostController@store')->name('save-post');
Route::post('/update-post/{post_id}', 'PostController@update')->name('update-post');
