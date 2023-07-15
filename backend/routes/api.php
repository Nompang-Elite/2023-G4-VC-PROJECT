<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\RoomController;
use Illuminate\Support\Facades\Route;




//Hotel controller route
Route::get('/hotel', [HotelController::class, 'index']);
Route::get('/hotel/{id}', [HotelController::class, 'show']);
Route::delete('/hotel/{id}', [HotelController::class, 'destroy']);
//room controller route
Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/hotel/{id}', [RoomController::class, 'show']);

Route::get('/hotel', [HotelController::class, 'index']);
Route::get('/hotel/search', [HotelController::class, 'search']);
