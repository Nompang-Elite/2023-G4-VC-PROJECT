<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShowHotelInfoResource;
use App\Models\HotelInfo;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;

class HotelInfoController extends Controller
{
    use HttpResponse;
    /**
     * Display a listing of the resource.
     */
    public function hotelInfo()
    {
        // dd(HotelInfo::all());
        $HotelInfo = HotelInfo::all();
        $HotelInfo = ShowHotelInfoResource::collection($HotelInfo);
        if ($HotelInfo)
            return $this->success($HotelInfo, "list of hotelInfo");

        return $this->error("list is empty", 404);
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
            $HotelInfo = hotelInfo::store($request, $id);
            if ($HotelInfo)
                return $this->success($HotelInfo, "list of hotelInfo");

            return $this->error("list is empty", 404);
            
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
