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

Route::get('/test',function(){
	return ['name' => 'Iqbal Ahmed Tuhin'];
});

Route::get('post','PostApiController@index');
Route::get('post/{id}','PostApiController@show');
Route::post('post','PostApiController@store');
Route::put('post/{id}','PostApiController@update');
Route::delete('post/{id}','PostApiController@delete');