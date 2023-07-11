<?php

use App\Http\Controllers\api\AuthController;
use Illuminate\Support\Facades\Route;


// Authentication Route:
Route::group(['prefix' => 'auth'], function () {
    // Register
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    // Login
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


    // More here...
});
