<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GuestControll;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\Hotels\HotelGuestController;
use App\Http\Controllers\Api\OccupiedRoomsControll;
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


Route::group(['prefix' => 'hotel'], function () {
    Route::get('/', [HotelController::class, 'index']);
    Route::get('/search', [HotelController::class, 'search']);

    Route::get('/{id}/guests', [HotelGuestController::class, 'getHotelGuests']);
    Route::get('/guests/reserved', [HotelGuestController::class, 'reservedGuestAtHotel']);

    // Hotel routes goes here...
});



Route::group(['prefix' => 'admin'], function () {
    Route::post('/login', [AdminController::class, 'login']);
    Route::get('/info', [AdminController::class, 'info']);

    // Admin routes goes here...
});
