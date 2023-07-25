<?php

namespace App\Http\Resources\Hotels;

use App\Models\Images;
use App\Models\RoomImages;
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
        if ($img !== null) {
            $img = Images::find($img->id)->image_hash;
        }
        return [
            "name" => $this->name,
            "description" => $this->description,
            "max_capacity" => $this->max_capacity,
            "bed_count" => $this->bed_count,
            "price" => $this->price,
            "image" => $img,
        ];
    }
}
