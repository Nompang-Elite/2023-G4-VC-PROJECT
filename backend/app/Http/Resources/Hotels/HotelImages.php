<?php

namespace App\Http\Resources\Hotels;

use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HotelImages extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $result = [
            "id" =>  $this->id,
            "hotel_id" =>  $this->hotel_id,
            "image_id" =>  $this->image_id,
            "image_hash" =>  Images::find($this->image_id)->image_hash,
        ];
        return $result;
    }
}
