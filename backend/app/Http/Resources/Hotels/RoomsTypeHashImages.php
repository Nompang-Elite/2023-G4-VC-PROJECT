<?php

namespace App\Http\Resources\Hotels;

use App\Models\Images;
use App\Models\RoomImages;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Rooms\TypeHashImages as RoomTypeImageResource;

class RoomsTypeHashImages extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $imgs  = RoomTypeImageResource::collection(RoomImages::where("room_type_id", $this->id)->get());
        $img  = RoomImages::where("room_type_id", $this->id)->first();

        if ($img !== null) {
            $img = Images::find(RoomImages::where("room_type_id", $this->id)->first()->image_id)->image_hash;
        } else
            $img;

        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "max_capacity" => $this->max_capacity,
            "bed_count" => $this->bed_count,
            "price" => $this->price,
            "image" => $img,
            "images" => $imgs,
        ];
    }
}
