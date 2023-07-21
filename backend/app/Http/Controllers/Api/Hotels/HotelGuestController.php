<?php

namespace App\Http\Controllers\Api\Hotels;

use App\Http\Controllers\Controller;
use App\Http\Resources\GuestResource;
use App\Http\Resources\ReservedRoomsResource;
use App\Models\Hotel;
use App\Models\OccupiedRooms;
use App\Models\Reservations;
use App\Models\Rooms;
use App\Models\RoomType;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelGuestController extends Controller
{
    use HttpResponse;
    public function getHotelGuests($id)
    {
        $hotel = Hotel::find($id);
        if ($hotel) {
            $rooms = Rooms::where("hotel_id", $hotel->id)->get();
            $reservedRooms = ReservedRoomsResource::collection($rooms);
            return $this->success($reservedRooms);
        }
        return $this->error("not found", 404);
    }

    public function reservedGuestAtHotel($id)
    {
        $reservation = GuestResource::collection(Reservations::where("hotel_id", (integer)$id)->get());

        return $this->success(
            $reservation
        );
    }
}
