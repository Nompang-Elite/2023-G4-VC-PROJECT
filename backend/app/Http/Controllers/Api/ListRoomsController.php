<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShowRoomsResource;
use App\Models\Rooms;
use Illuminate\Http\Request;

class ListRoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // ---------------get list all rooms---------------
    public function index()
    {
        $listRoom = Rooms::all();
        $listRoom = ShowRoomsResource::collection($listRoom);
        return  response()->json(['Get all list rooms' => true, 'data' => $listRoom], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd(1);
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
