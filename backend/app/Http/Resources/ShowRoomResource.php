<?php

namespace App\Http\Resources;

use App\Models\Hotel;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowRoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "number" => $this->number,
            "name" => $this->name,
            "status" => $this->status,
            "room_type_id" => RoomType::find($this->room_type_id),
            // Solution source: https://stackoverflow.com/questions/23612221/how-to-exclude-certains-columns-while-using-eloquent
            "hotel_id" => Hotel::find($this->hotel_id)->makeHidden(['description']),
        ];
    }
}
