<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\StartController;
use App\Http\Controllers\Api\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/startplatform', [StartController::class, 'start']);
Route::post('/createAdmin',[StartController::class, 'createAdmin']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/get_users',[UserController::class,'getusers']);
Route::post('/createuser',[UserController::class,'createUser']);