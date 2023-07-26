<?php

namespace App\Http\Resources;

use App\Models\OccupiedRooms;
use App\Models\ReservedRooms;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservedRoomsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */


    public function toArray(Request $request): array
    {
        $occupied = GuestHotedAtResource::collection(OccupiedRooms::where("room_id", $this->id)->get());
        $reserved = GuestReserveResource::collection(ReservedRooms::where("room_type_id", $this->room_type_id)->get());
        return [
            "room_id" => $this->id,
            "reserved" => $reserved,
            "occupied" => $occupied,
        ];
    }
}
