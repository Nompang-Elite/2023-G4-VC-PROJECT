<?php

namespace App\Http\Controllers\Api\Hotels;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    use HttpResponse;


    public function __construct()
    {
        $this->middleware(['auth:api'])->except([]);
    }

    public function getHotelInfo(Request $req)
    {
        $hotel = Hotel::find($req->hotel_id);

        if ($hotel->user_id == auth()->user()->id) {
            return $this->success($hotel);
        }
    }
}
