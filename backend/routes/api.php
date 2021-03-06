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

Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');

Route::group(['middleware' => 'auth:api'], function() {
  Route::apiResource('users', 'UserController');
  Route::get('me', 'ProfileController@me');
  Route::put('users/update-info', 'ProfileController@update_info');
  Route::put('users/change-password', 'ProfileController@update_password');
});


