<?php

namespace App\Http\Resources;

use App\Models\Reservations;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GuestReserveResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
        $reservation = Reservations::find($this->reservation_id);
        $excludedProperty = [
            "current_location",
            "user_type",
            "email_verified_at",
            "created_at",
            "updated_at"
        ];
        return [
            "id" => $this->id,
            "number_of_room" => $this->number_of_room,
            "status" => $this->status,
            "reserved_by" => [
                "date_in" => "2017-11-19",
                "date_out" => "2001-12-01",
                "made_by" => "unknown",
                "user_id" => User::find($reservation->user_id)->makeHidden($excludedProperty),
            ],
        ];
    }
}
