<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\OccupiedRoomsController;
use App\Http\Controllers\Api\RoomsController;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Authentication Route:
Route::group(['prefix' => '/v1/auth'], function () {
    // Register
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    // Login
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // More here...
});

Route::get('/hotel', [HotelController::class, 'index']);
Route::get('/hotel/search', [HotelController::class, 'search']);

// -------------Rooms List in Hotel owner--------------
Route::get('/room', [RoomsController::class, 'index']);
Route::get('/roomType', [RoomType::class, 'index']);
Route::get('/OccupiedRooms', [OccupiedRoomsController::class, 'index']);