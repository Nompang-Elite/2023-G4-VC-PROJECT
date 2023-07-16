<?php

namespace App\Http\Resources;

use App\Models\Rooms;
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
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'location' => $this->location,
            'description' => $this->description,
            'rooms' => Rooms::where("hotel_id", $this->id)->get()
        ];
    }
}
