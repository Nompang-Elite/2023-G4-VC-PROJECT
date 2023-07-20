<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowRoomTypesResource extends JsonResource
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
            'name' =>$this -> name,
            'description' =>$this -> description,
            'max_capacity' =>$this -> max_capacity,
            'bed_count' => $this -> bed_count,
            'price' => $this -> price,
        ];
    }
}
