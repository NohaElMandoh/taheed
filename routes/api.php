<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Authentication Routes

Route::post('register', 'App\Http\Controllers\API\Auth\RegisterController@register'); /// first step
Route::post('verify', 'App\Http\Controllers\API\Auth\VerificationController@verify')->middleware('auth:sanctum'); /// second step

Route::post('update_phone', 'App\Http\Controllers\API\Auth\RegisterController@update_phone')->middleware('auth:sanctum');/// third  step
Route::post('update_info', 'App\Http\Controllers\API\Auth\RegisterController@update_info')->middleware('auth:sanctum');/// fourth  step

Route::post('createOrder', 'App\Http\Controllers\API\Auth\OrderController@createOrder')->middleware('auth:sanctum');/// create order  step

