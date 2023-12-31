<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\Hotels\HotelGuestController;
use App\Http\Controllers\Api\OccupiedRoomsControll;
use App\Http\Controllers\Api\Guest\GuestController;
use App\Http\Controllers\Api\HotelInfoController;
use App\Http\Controllers\Api\ImageUploadController;
use App\Http\Controllers\Api\Hotels\HotelController as HotelsHotelController;
use App\Http\Controllers\Api\ReviewsController;
use App\Http\Controllers\Api\RoomTypesController;
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
    // Booking
    Route::post("/reserve/room", [GuestController::class, "userBooking"]);
    // More here...
});

Route::get('/hotel', [HotelController::class, 'index']);
Route::get('/hotel/{id}/details', [HotelController::class, 'show']);
Route::delete('/hotel/{id}/delete', [HotelController::class, 'destroy']);
Route::get('/hotel/search', [HotelController::class, 'search']);



Route::group(['prefix' => 'hotel'], function () {
    Route::get('/', [HotelController::class, 'index']);
    Route::get('/{id}', [HotelController::class, 'show']);


    Route::get('/info/all', [HotelController::class, 'HotelsInfo']);
    Route::get('/info/{id}', [HotelController::class, 'HotelsInfoId']);
    Route::post('/room/type/detail', [GuestController::class, 'getRoomType']);
    //=============Rooms in hotel==========
    Route::get('/room_types/type', [RoomTypesController::class, 'index']);


    //======Search Routes=======
    Route::get('/search', [HotelController::class, 'search']);

    Route::get('/{id}/guests', [HotelGuestController::class, 'getHotelGuests']);
    Route::get('/{id}/guests/reserved', [HotelGuestController::class, 'reservedGuestAtHotel']);

    Route::post('/upload/image', [ImageUploadController::class, 'hotelImageUpload']);
    Route::post('/get/images', [ImageUploadController::class, "getHotelImages"]);
    Route::post('/reviews', [HotelController::class, "getHotelReviews"]);

    // ------------- Route hotel owner--------------
    //Filter Reviews rating 
    Route::get('/reviews/filter/{rate}', [ReviewsController::class, 'filterReviews']);


    //search name in room
    Route::get('/search_room', [RoomController::class, "searchRoom"]);

    // ------------- Route hotel owner--------------
    //Room_Type
    Route::get('/room_types', [RoomTypesController::class, 'index']);

    //Occupied Room 
    Route::get('/rooms/filter/{status}', [HotelController::class, 'filterRooms']);

    //HotelRoom
    Route::get('/rooms/all', [HotelController::class, 'hotelRooms']);

    Route::post('/info', [HotelsHotelController::class, "getHotelInfo"]);

    Route::post('/room/type', [HotelsHotelController::class, "getHotelRoomType"]);
    Route::post('/room/add', [HotelsHotelController::class, "addRoom"]);
    // Hotel routes goes here...
});

Route::group(['prefix' => 'admin'], function () {
    Route::post('/login', [AdminController::class, 'login']);
    Route::get('/info', [AdminController::class, 'info']);
    //HotelInfo route 
    Route::get('/hotelInfo', [HotelInfoController::class, 'hotelInfo']);
    // HotelInfo route delete
    Route::delete('hotelInfo/{id}', [HotelInfoController::class, 'deletHotelInfo']);
    // hotelInfo Update
    Route::put('/hotelInfoUpdate/{id}', [HotelInfoController::class, 'update']);

    // Admin routes goes here...
    Route::post('/hotels/register', [AdminController::class, 'registerHotel']);
    Route::get('/users/all', [AdminController::class, 'getAllUsers']);
    Route::get('/users/guests', [AdminController::class, 'getGuest']);
    Route::get('/users/owners', [AdminController::class, 'getOwner']);
});



//room controller route
Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/rooms/{id}/details', [RoomController::class, 'show']);
