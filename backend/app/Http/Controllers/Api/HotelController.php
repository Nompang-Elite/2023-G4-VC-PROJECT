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

     /**
     *get hotel id
     */
    public function show($id)
    {

        //get only one hotel
        $hotel = Hotel::find($id);
        $hotel = new ShowhotelResource($hotel);
        if ($hotel)
        return $this->success($hotel, "list of hotel");

    return $this->error("list is empty", 404);

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

//====get all hotel with info==========
    public function HotelsInfo(){
        $hotel = Hotel::with(['HotelInfos'])->get();
        if ($hotel)
        return $this->success($hotel, "list of hotels with hotels info");

    return $this->error("list is empty", 404);
    }

    //====get only one hotel with info==========

    public function HotelsInfoId($id){
        $hotel = Hotel::with(['HotelInfos'])->find($id);
        if ($hotel)
        return $this->success($hotel, "list of hotel");

    return $this->error("list is empty", 404);

    }

};
