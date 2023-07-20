<?php

namespace App\Http\Resources;

use App\Models\HostedAt;
use App\Models\OccupiedRooms;
use App\Models\Reservations;
use App\Models\ReservedRooms;
use App\Models\Rooms;
use App\Models\RoomType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GuestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // $reservation = Reservations::find($this->reservation_id);
        // $reservedRoom = ReservedRooms::find($reservation->id);
        // $roomType = RoomType::find($reservedRoom->room_type_id);
        // $user = User::find($reservation->user_id);



        return  [];
    }
}
