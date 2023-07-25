<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Guest\GuestController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\ImageUploadController;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Hotels\HotelController as HotelsHotelController;
use App\Http\Controllers\Api\ImageUploadController;
use App\Http\Controllers\Api\OccupiedRoomsController;
use App\Http\Controllers\Api\RoomsController;
use App\Http\Controllers\Api\RoomTypesController;
use App\Models\RoomType;
use App\Http\Controllers\Api\RoomController;
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
Route::get('/hotel/{id}/details', [HotelController::class, 'show']);
Route::delete('/hotel/{id}/delete', [HotelController::class, 'destroy']);
Route::get('/hotel/search', [HotelController::class, 'search']);



Route::group(['prefix' => 'hotel'], function () {
    Route::get('/', [HotelController::class, 'index']);
    Route::get('/{id}', [HotelController::class, 'show']);

    //====HotelInfo Routes========
    Route::get('/hotelInfo', [HotelInfoController::class, 'index']);
    // Route::get('/hotel/{id}', [HotelController::class, 'show']);


    Route::get('/info/all', [HotelController::class, 'HotelsInfo']);
    Route::get('/info/{id}', [HotelController::class, 'HotelsInfoId']);

    //=============Rooms in hotel==========
    Route::get('/room/all', [RoomsController::class, 'index']);
    //=============Rooms in hotel==========
    Route::get('/room_types/type', [RoomTypesController::class, 'index']);


    //======Search Routes=======
    Route::get('/search', [HotelController::class, 'search']);

    Route::post('/upload/image', [ImageUploadController::class, 'hotelImageUpload']);
    Route::post('/get/images', [ImageUploadController::class, "getHotelImages"]);
    Route::post('/reviews', [HotelController::class, "getHotelReviews"]);

    // ------------- Route hotel owner--------------
    Route::get('/all/rooms', [RoomsController::class, 'index']);

    //Room_Type
    Route::get('/room_types', [RoomTypesController::class, 'index']);

    //Occupied Room 
    Route::get('/rooms/{status}', [HotelController::class, 'filterRooms']);

    //HotelRoom
    Route::get('/rooms', [HotelController::class, 'hotelRooms']);

    Route::post('/info', [HotelsHotelController::class, "getHotelInfo"]);
    // Hotel routes goes here...
});

Route::group(['prefix' => 'admin'], function () {
    Route::post('/login', [AdminController::class, 'login']);
    Route::get('/info', [AdminController::class, 'info']);

    // Admin routes goes here...
});



//room controller route
Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/rooms/{id}/details', [RoomController::class, 'show']);
