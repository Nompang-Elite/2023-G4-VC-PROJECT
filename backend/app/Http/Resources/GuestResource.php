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
        $hostedAt = HostedAt::find($this->user_id);
        $occupied = OccupiedRooms::find($hostedAt->occupied_id);
        $room = Rooms::find($occupied->room_id);
        $roomType = RoomType::find($room->room_type_id);

        $res = [
            "id" => $this->id,
            "date_in" => $this->date_in,
            "date_out" => $this->date_out,
            "made_by" => $this->made_by,
            "user_id" => $this->user_id,
            "hotel_id" => $this->hotel_id,
            "room_status" => $room->number,
            "room_type" => $roomType->name,
        ];

        return  $res;
    }
}
