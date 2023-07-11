<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShowhotelResource;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
// ---------------get all hotels---------------
    public function index()
    {
        $hotel = Hotel::all();
        $hotel = ShowhotelResource::collection($hotel);
      
        return response()->json(['success' => true, 'data' =>$hotel],200);
    }
}
