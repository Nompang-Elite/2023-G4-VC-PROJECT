<?php

namespace App\Http\Resources;

use App\Models\HostedAt;
use App\Models\OccupiedRooms;
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

        // $res = ReservedRooms::find($this->hotel_id);
        // $res->room_type = RoomType::find($res->room_type_id);

        $host = HostedAt::where("user_id", $this->user_id)->get();
        $h = [];
        foreach ($host as $i) {
            array_push($h, Rooms::find(OccupiedRooms::find($i->occupied_id)->room_id)->number);        // $occ = OccupiedRooms::find($host->occupied_id);
        }
        $user = User::find($this->user_id);
        $res = [
            "id" => $this->id,
            "date_in" => $this->date_in,
            "date_out" => $this->date_out,
            "firstname" => $user->firstname,
            "lastname" => $user->lastname,
            "hotel_id" => $this->hotel_id,
            "room" => $h,
        ];
        return  $res;
    }
}
