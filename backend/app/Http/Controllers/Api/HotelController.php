<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShowHotelResource;
use App\Models\Hotel;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    use HttpResponse;
    // ---------------get all hotels---------------
    public function index()
    {
        $hotel = Hotel::all();
        $hotel = ShowHotelResource::collection($hotel);
        if ($hotel)
            return $this->success($hotel, "list of hotels");

        return $this->error("list is empty", 404);
    }
}
