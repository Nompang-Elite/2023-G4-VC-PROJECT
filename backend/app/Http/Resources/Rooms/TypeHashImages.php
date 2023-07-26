<?php

namespace App\Http\Resources\Rooms;

use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TypeHashImages extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "image_hash" => Images::find($this->image_id)
        ];
    }
}
