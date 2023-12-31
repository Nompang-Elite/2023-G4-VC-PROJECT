<?php

namespace App\Http\Resources;

use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowRoomsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' =>$this -> id,
            'number' =>$this -> number,
            'name' =>$this -> name,
            'status' =>$this -> status,
            "room_type_id"=>RoomType::find($this->room_type_id),
            "hotel_id"=>$this->hotel_id
            // 'hotel_id' =>$this -> hotel_id,
            // 'room_type_id' =>$this -> room_type_id,
        ];
    }
}
