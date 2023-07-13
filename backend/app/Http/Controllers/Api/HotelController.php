<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShowhotelResource;
use App\Models\Hotel;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    use HttpResponse;

    // ---------------get all hotels---------------
    public function index()
    {
        $hotel = Hotel::all();
        $hotel = ShowhotelResource::collection($hotel);

        return response()->json(['success' => true, 'data' => $hotel], 200);
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
