<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Guest\GuestController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\Hotels\HotelController as HotelsHotelController;
use App\Http\Controllers\Api\ImageUploadController;
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

    // Post reviews
    Route::post("/post/review", [GuestController::class, "postReview"]);
    // More here...
});


Route::group(['prefix' => 'hotel'], function () {
    Route::get('/', [HotelController::class, 'index']);
    Route::get('/search', [HotelController::class, 'search']);

    Route::post('/upload/image', [ImageUploadController::class, 'hotelImageUpload']);
    Route::post('/get/images', [ImageUploadController::class, "getHotelImages"]);
    Route::post('/reviews', [HotelController::class, "getHotelReviews"]);

    Route::post('/info', [HotelsHotelController::class, "getHotelInfo"]);
    // Hotel routes goes here...
});



Route::group(['prefix' => 'admin'], function () {
    Route::post('/login', [AdminController::class, 'login']);
    Route::get('/info', [AdminController::class, 'info']);

    // Admin routes goes here...
    
    Route::get('/users/{type}', [AdminController::class, 'getUsersInfo']);
});
