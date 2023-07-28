<?php

namespace App\Http\Resources\Hotels;

use App\Models\Images;
use App\Models\RoomImages;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomsTypeHashImages extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $img  = RoomImages::where("room_type_id", $this->id)->first();
        // dd($img);
        if ($img !== null) {
            $img = Images::find($img->image_id)->image_hash;
        }
        $count = count(Rooms::where("room_type_id", $this->id)->where("hotel_id", $this->hotel_id)->where("status", "unoccupied")->get());

        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "max_capacity" => $this->max_capacity,
            "bed_count" => $this->bed_count,
            "price" => $this->price,
            "image" => $img,
            "count" => $count
        ];
    }
}
