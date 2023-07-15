<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\RoomController;
use Illuminate\Support\Facades\Route;




//Hotel controller route
Route::get('/hotel', [HotelController::class, 'index']);
Route::get('/hotel/{id}/details', [HotelController::class, 'show']);
Route::delete('/hotel/{id}/delete', [HotelController::class, 'destroy']);
Route::get('/hotel/search', [HotelController::class, 'search']);



//room controller route
Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/rooms/{id}/details', [RoomController::class, 'show']);
