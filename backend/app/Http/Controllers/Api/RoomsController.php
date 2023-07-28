<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShowRoomResource;
use App\Http\Resources\ShowRoomsResource;
use App\Models\Rooms;
use App\Traits\HttpResponse;
use Dotenv\Validator;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    use HttpResponse;

    // -------------Function status (Buttons occupied and unoccupied)---------------
    public function getStatus()
    {
        $room = Rooms::where('status', '=', 'unoccupied')->get();
        $room = ShowRoomsResource::collection($room);
        if ($room)
            return $this->success($room, "list of rooms");
        return $this->error("list is empty", 404);
    }

    // ---------------Function for search name of room--------------
    public function searchRoom(Request $request)
    {
        $search = $request->input('search');
        $room = Rooms::where('name', 'like', '%' . $search . '%')->get();
        return response()->json(['rooms' => $room]);
    }

    // ------------Add room----------
    public function addRooms(Request $request)
    {
        $room = Rooms::create([
            'number' => request('number'),
            'name' => request('name'),
            'status' => request('status'),
            'type' => request('type'),
            "room_type_id" => request("room_type_id"),
            "hotel_id" => request('hotel_id')
        ]);
        return response()->json(['message' => "Create room success", 'data' => $room], 200);
    }

    // ---------------Function Edit room--------------
    public function UpdateRooms(Request  $request, $id)
    {
        $room = Rooms::store($request, $id);
        if ($room)
            return $this->success($room, "list of rooms");

        return $this->error("list is empty", 404);
    }

    // ---------------Function Delete room--------------
    public function removeRoom($id)
    {
        $room = Rooms::find($id);
        if (!$room) {
            return response()->json(['success' => false, 'message' => 'Room not found'], 404);
        }
        $room->delete();
        return response()->json(['success' => true, 'message' => 'Room deleted successfully'], 200);
    }

    //------------Function get Room by ID---------------
    public function getRoomById($id)
    {
        $room = Rooms::find($id);
        return response()->json(['success' => true, 'data' => $room], 200);
    }
}
