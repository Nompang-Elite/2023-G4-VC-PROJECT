<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShowRoomsResource;
use App\Models\Rooms;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    use HttpResponse;
    // ---------------get all rooms---------------
    // public function index()
    // {
    //     $room = Rooms::all();
    //     $room = ShowRoomsResource::collection($room);
    //     if ($room)
    //         return $this->success($room, "list of rooms");
            
    //     return $this->error("list is empty", 404);
    // }
    public function index()
    {
        $room = Rooms::where('status','=','unoccupied')->get();
        $room = ShowRoomsResource::collection($room);
        if ($room)
            return $this->success($room, "list of rooms");
            
        return $this->error("list is empty", 404);
    }

}
