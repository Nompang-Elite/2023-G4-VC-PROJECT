<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




//Hotel controller route
Route::get('/hotel', [HotelController::class,'index']);
Route::get('/hotel/{id}', [HotelController::class,'show']);
Route::delete('/hotel/{id}', [HotelController::class,'destroy']);
//room controller route
Route::get('/rooms', [RoomController::class,'index']);
Route::get('/hotel/{id}', [RoomController::class,'show']);

//room in hotel route
Route::get("/hotel_room", [HotelController::class,'HotelRoom']);
Route::get("/hotel_room/{id}", [HotelController::class,'HotelRoomId']);
