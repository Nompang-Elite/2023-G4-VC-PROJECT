<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShowRoomResource;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    
//------------get all rooms---------------
    public function index()
    {
        $room = Room::all();
        $room = ShowRoomResource::collection($room);
      
        return response()->json(['success' => true, 'data' =>$room],200);
    }

 

//-------get only one room------------
    public function show($id)
    {
        $room = Room::find($id);
        $room = new ShowRoomResource($room);
        return response()->json(['success' => true, 'data' =>$room],200);

    }

}

