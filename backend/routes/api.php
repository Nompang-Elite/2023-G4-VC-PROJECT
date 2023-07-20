<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\HotelInfoController;
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
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // More here...
});
//====Hotels Routes========

Route::group(['prefix' => 'hotel'], function () {
    Route::get('/', [HotelController::class, 'index']);
    Route::get('/{id}', [HotelController::class, 'show']);

    //====HotelInfo Routes========
    Route::get('/hotelInfo', [HotelInfoController::class, 'index']);
    // Route::get('/hotel/{id}', [HotelController::class, 'show']);


    Route::get('/info/all', [HotelController::class, 'HotelsInfo']);
    Route::get('/info/{id}', [HotelController::class, 'HotelsInfoId']);


    //======Search Routes=======
    Route::get('/search', [HotelController::class, 'search']);

    // Hotel routes goes here...
});



Route::group(['prefix' => 'admin'], function () {
    Route::post('/login', [AdminController::class, 'login']);
    Route::get('/info', [AdminController::class, 'info']);

    // Admin routes goes here...
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










