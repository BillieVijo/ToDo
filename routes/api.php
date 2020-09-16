<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('posts', 'Api\ApiController@getAllPosts');
Route::get('posts/{id}', 'Api\ApiController@getPost');
Route::post('posts', 'Api\ApiController@createPost');
Route::put('posts/{id}', 'Api\ApiController@updatePost');
Route::delete('posts/{id}','Api\ApiController@deletePost');

Route::post('login', 'Api\UserController@login');
Route::post('register', 'Api\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
	Route::post('details', 'Api\UserController@details');
});
