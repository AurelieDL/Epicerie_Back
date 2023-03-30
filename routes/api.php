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

Route::post('/login', 'authController@authenticate')->name('login');
Route::get('/user', 'authController@me')->middleware('auth:sanctum');
// Route::get('/user', 'UserController@index')->middleware('auth:sanctum');
Route::get('/user-info/{id}', 'UserController@getInfos')->middleware('auth:sanctum');

Route::get('/dashboard', 'authController@dashboard')->middleware('auth:sanctum');

Route::apiResource('products', ProductController::class);

//->middleware('jwt.auth');