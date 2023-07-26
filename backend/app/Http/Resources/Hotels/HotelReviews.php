<?php

namespace App\Http\Resources\Hotels;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HotelReviews extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user = User::find($this->user_id)->makeHidden(
            [
                "phone",
                "gender",
                "email",
                "current_location",
                "email_verified_at",
                "created_at",
                "updated_at",
            ]
        );
        $currentReview = [
            "id" => $this->id,
            "hotel_id" => $this->hotel_id,
            "comment" => $this->comment,
            "rate" => $this->rate,
            "user" => $user,
        ];
        return $currentReview;
    }
}
