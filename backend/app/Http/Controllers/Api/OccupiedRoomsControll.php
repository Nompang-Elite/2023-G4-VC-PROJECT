<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShowOccupiedRoomsResource;
use App\Models\OccupiedRooms;
use Illuminate\Http\Request;

class OccupiedRoomsControll extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $occupiedRoom = OccupiedRooms::all();
        $occupiedRooms = ShowOccupiedRoomsResource::collection($occupiedRoom);
        return response()->json(['success' =>true, 'date' =>$occupiedRooms],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $occupiedRoom = OccupiedRooms::create([
            'room_id'=>request('room_id'),
            'check_in'=>request('check_in'),
            'check_out'=>request('check_out'),
        ]);
        return response()->json(['success' =>true, 'date' =>$occupiedRoom],201);
    }
}
