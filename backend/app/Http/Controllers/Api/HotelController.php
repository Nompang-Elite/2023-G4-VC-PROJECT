<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShowHotelResource;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
//-----------get all hotels-----------
    public function index()
    {
        $hotel = Hotel::all();
        $hotel = ShowHotelResource::collection($hotel);
      
        return response()->json(['success' => true, 'data' =>$hotel],200);
    }


//----------get only one hotel------------
    public function show($id)
    {
        $hotel = Hotel::find($id);
        $hotel = new ShowHotelResource($hotel);
        return response()->json(['success' => true, 'data' =>$hotel],200);

    }

//-------delete hotel by id-------
    public function destroy(string $id)
    {
        $hotel = Hotel::find($id);
        $hotel->delete();
        return response()->json(['success' => true, 'data' => $hotel],200);
    }

//---------Show room in hotel-------------
    public function HotelRoom(){
        $hotel = Hotel::with(['rooms'])->get();
        return response()->json(['success' => true, 'data' => $hotel],200);
    }

//---------Show room in each hotel-------------
    public function HotelRoomId($id){
        $hotel = Hotel::with(['rooms'])->find($id);
        return response()->json(['success' => true, 'data' => $hotel],200);
    }

}

