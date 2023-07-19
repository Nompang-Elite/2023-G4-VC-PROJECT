<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\OccupiedRoomsController;
use App\Http\Controllers\Api\RoomsController;
use App\Http\Controllers\Api\RoomTypesController;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Authentication Route:
Route::group(['prefix' => 'guest'], function () {
    // Register
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    // Login
    Route::post('/login', [AuthController::class, 'log  in'])->name('login');
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // More here...
});

Route::get('/hotel', [HotelController::class, 'index']);
Route::get('/hotel/search', [HotelController::class, 'search']);


// ------------- Route hotel owner--------------
Route::get('/hotel/rooms', [RoomsController::class, 'index']);

//Room_Type
Route::get('/hotel/room_types' , [RoomTypesController::class, 'index']);

//Occupied Room
Route::get('/hotel/occupied' , [OccupiedRoomsController::class, 'index']);

//HotelRoom
Route::get('/hotel/hotelRoom' , [HotelController::class, 'HotelRoom']);










