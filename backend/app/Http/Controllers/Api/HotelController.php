<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShowHotelResource;
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
        $hotel = ShowHotelResource::collection($hotel);
        if ($hotel)
            return $this->success($hotel, "list of hotels");

        return $this->error("list is empty", 404);
    }

    // Recovered code start from here
    //----------get only one hotel------------
    public function show($id)
    {
        $hotel = Hotel::find($id);
        $hotel = new ShowHotelResource($hotel);
        return response()->json(['success' => true, 'data' => $hotel], 200);
    }

    //-------delete hotel by id-------
    public function destroy(string $id)
    {
        $hotel = Hotel::find($id);
        $hotel->delete();
        return response()->json(['success' => true, 'data' => $hotel], 200);
    }

    //---------Show room in hotel-------------
    public function HotelRoom()
    {
        $hotel = Hotel::with(['rooms'])->get();
        return response()->json(['success' => true, 'data' => $hotel], 200);
    }

    //---------Show room in each hotel-------------
    public function HotelRoomId($id)
    {
        $hotel = Hotel::with(['rooms'])->find($id);
        return response()->json(['success' => true, 'data' => $hotel], 200);
    }
    // Recovered code end from here

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
