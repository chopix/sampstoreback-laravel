<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function () {
    Route::controller(UserController::class)->prefix('user')->group(function () {
        Route::get('/', 'index');
        Route::get('{id}', 'show');
    });


    Route::controller(AuthController::class)->prefix('auth')->group(function () {
        Route::post('register', 'register');
        Route::post('login', 'login');
    });
});

