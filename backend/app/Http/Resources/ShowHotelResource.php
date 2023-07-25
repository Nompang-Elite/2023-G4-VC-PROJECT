<?php

namespace App\Http\Resources;

use App\Models\HotelImages;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowHotelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $imgId = HotelImages::where("hotel_id", $this->id)->first()->image_id;
        return [
            'id' => $this->id,
            'name' => $this->name,
            'rate' => $this->rate,
            'location' => $this->location,
            'description' => $this->description,
            'image_hash' => Images::find($imgId)->image_hash
        ];
    }
}
