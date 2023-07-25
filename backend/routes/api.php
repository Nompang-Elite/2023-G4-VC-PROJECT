<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Guest\GuestController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\Hotels\HotelController as HotelsHotelController;
use App\Http\Controllers\Api\ImageUploadController;
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

    // Post reviews
    Route::post("/post/review", [GuestController::class, "postReview"]);
    // More here...
});

Route::get('/hotel', [HotelController::class, 'index']);
Route::get('/hotel/search', [HotelController::class, 'search']);


// ------------- Route hotel owner--------------
Route::get('/all/rooms', [RoomsController::class, 'index']);

//Room_Type
Route::get('/hotel/room_types', [RoomTypesController::class, 'index']);

//Occupied Room 
Route::get('/hotel/rooms/{status}', [HotelController::class, 'filterRooms']);

//HotelRoom
Route::get('/hotel/rooms', [HotelController::class, 'hoteRooms']);





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
});
