<?php

namespace App\Http\Resources;

use App\Models\HotelImages;
use App\Models\HotelInfo;
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
        $imgId = HotelImages::where("hotel_id", $this->id)->first();
        $info = HotelInfo::find($this->id);
        if ($imgId !==  null) {
            $hash = Images::find($imgId->image_id)->image_hash;
        } else
            $hash = $imgId;
        return [
            'id' => $this->id,
            'name' => $this->name,
            'rate' => $this->rate,
            'description' => $this->description,
            "info" => $info,
            'image_hash' => $hash
        ];
    }
}
