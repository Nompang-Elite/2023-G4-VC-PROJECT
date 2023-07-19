<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\HotelInfoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Authentication Route:
Route::group(['prefix' => 'guest'], function () {
    // Register
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    // Login
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


    // More here...
});
//====Hotels Routes========

Route::group(['prefix' => 'hotel'], function () {
    Route::get('/', [HotelController::class, 'index']);
    Route::get('/hotel/{id}', [HotelController::class, 'show']);

//====HotelInfo Routes========
Route::get('/hotelInfo', [HotelInfoController::class, 'index']);
// Route::get('/hotel/{id}', [HotelController::class, 'show']);


Route::get('/hotelsInfo', [HotelController::class, 'HotelsInfo']);
Route::get('/hotelsInfo/{id}', [HotelController::class, 'HotelsInfoId']);


//======Search Routes=======
Route::get('/search', [HotelController::class, 'search']);

    // Hotel routes goes here...
});



Route::group(['prefix' => 'admin'], function () {
    Route::post('/login', [AdminController::class, 'login']);
    Route::get('/info', [AdminController::class, 'info']);

    // Admin routes goes here...
});
