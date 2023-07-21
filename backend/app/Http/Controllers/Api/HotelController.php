<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShowHotelResource;
use App\Models\Hotel;
use App\Models\Rooms;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    use HttpResponse;
    // ---------------get all hotels---------------
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'search']);
    }
    public function index()
    {
        $hotel = Hotel::all();
        $hotel = ShowHotelResource::collection($hotel);
        if ($hotel)
            return $this->success($hotel, "list of hotels");

        return $this->error("list is empty", 404);
    }
    // -------------Relation hotel with room---------------
    public function HotelRoom()
    {
        // --------------Access to hotel and hotel access to room---------
        $hotel = Hotel::where("user_id", auth()->user()->id)->first();
        $rooms = Rooms::where("hotel_id", $hotel->id)->get();
        return $this->success($rooms, "hotel lists", 200);
    }

    /**
     * 
     * Search function
     * 
     * **/
    public function search(Request $req)
    {
        $input = $req->query('s');
        // Search Query
        $hotels =  DB::select('select * from hotels where hotels.name like :input', ["input" => "%" . $input . "%"]);
        // Return Data
        if (!count($hotels) <= 0) {
            // Return the result data
            return $this->success($hotels, "search result", 200);
        }
        // Error if no result
        return $this->error("not match!");
    }
};
