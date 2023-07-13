<?php

namespace App\Http\Resources;

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
            'id'=>$this->id,
            'room_type'=>$this->room_type,
            'room_number'=>$this->room_number,
            'image'=>$this->image,
            'property_type'=>$this->property_type,
            'room_status'=>$this->room_status,
            'price'=>$this->price,
            'hotel_id'=>$this->hotel->id,
        ];
    }
}
