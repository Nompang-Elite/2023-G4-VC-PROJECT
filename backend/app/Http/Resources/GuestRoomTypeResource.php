<?php

namespace App\Http\Resources;

use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GuestRoomTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        //          "id": 3,
        //         "room_type_id": 1,
        //         "image_id": 5

        $imgHash = Images::find($this->image_id);
        if ($imgHash) {
            $imgHash = $imgHash->image_hash;
        }
        return [
            "image_hash" => $imgHash
        ];
    }
}
