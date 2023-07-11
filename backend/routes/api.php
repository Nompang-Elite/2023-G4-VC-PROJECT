<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/v1/auth'], function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/test', function () {
        return "Testing";
    });
});
