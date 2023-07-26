<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowHotelInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' =>$this -> id,
            'address' =>$this -> address,
            'city' =>$this -> city,
            'country' =>$this -> country,
            'postal_code' =>$this -> postal_code,
            'phone' =>$this -> phone,
            'email' =>$this -> email,
            'hotel_id' =>$this -> hotel_id,
        ];
    }
}
