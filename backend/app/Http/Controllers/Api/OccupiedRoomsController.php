<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShowOccupiedRoomsResource;
use App\Models\OccupiedRooms;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;

class OccupiedRoomsController extends Controller
{
    use HttpResponse;
    // ------------Get Occupied----------
    public function index()
    {
        $occupied = OccupiedRooms::all();
        $occupied = ShowOccupiedRoomsResource::collection($occupied);
        if ($occupied)
            return $this->success($occupied, "list of occupieds room");

        return $this->error("list is empty", 404);
    }
}
