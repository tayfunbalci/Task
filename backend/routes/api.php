<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\StudentController;

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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(["middleware" => ['auth:sanctum', 'ability:parent']], function() {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('auth_user', [AuthController::class, 'getAuthUser']);
    Route::post('auth_user_edit', [AuthController::class, 'updateAuthUser']);
    Route::apiResource('student', StudentController::class)->only('index');
});


