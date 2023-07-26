<?php

namespace App\Http\Resources;

use App\Models\RoomImages;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomTypeImgResource extends JsonResource
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
            "name" => $this->name,
            "images" => RoomImages::find($this->id)
        ];
    }
}
