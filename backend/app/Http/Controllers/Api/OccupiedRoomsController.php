<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShowOccupiedRoomsResource;
use App\Models\OccupiedRooms;
use Illuminate\Http\Request;

class OccupiedRoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd(1);
        $occupiedRoom = OccupiedRooms::all();
        $occupiedRoom = ShowOccupiedRoomsResource::collection($occupiedRoom);
        return  response()->json(['Get all occupied rooms' => true, 'data' => $occupiedRoom], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
