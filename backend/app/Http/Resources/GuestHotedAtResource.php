<?php

namespace App\Http\Resources;

use App\Models\HostedAt;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GuestHotedAtResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "occupied_id" => $this->id,
            "check_in" => $this->check_in,
            "check_out" => $this->check_out,
            "hoted_by" =>  HostedAt::find($this->id)
        ];
    }
}
