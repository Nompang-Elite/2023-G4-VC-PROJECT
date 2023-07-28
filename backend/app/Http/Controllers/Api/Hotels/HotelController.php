<?php

namespace App\Http\Controllers\Api\Hotels;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Rooms;
use App\Models\RoomType;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Psy\Readline\Hoa\Console;

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
    public function addRoom(Request $req)
    {
        // Data template
        // $req = [
        //     "number" => "",
        //     "name" => "",
        //     "room_type_id" => "",
        //     "hotel_id" => 1,
        // ];
        $userId = auth()->user()->id;
        $hotel = Hotel::where("user_id", $userId)->first();
        $input = $req->input();
        $input["number"] = $this->generateRoomName($hotel->name) . "-" . $req->input()["number"];
        $validate = Validator::make(
            $input,
            [
                "number" => "required|unique:rooms,number",
                "name" => "required|max:40",
                "room_type_id" => "required",
            ]
        );
        if (!$validate->fails()) {
            $input["hotel_id"] = $hotel->id;
            $room = Rooms::create($input);
            return $this->success($room, "Room added!");
        }
        return $this->error("Something went wrong!");
    }

    public function getHotelRoomType()
    {
        $userId = auth()->user()->id;
        $hotel = Hotel::where("user_id", $userId)->first();
        $roomType = RoomType::where("hotel_id", $hotel->id)->get();

        if ($roomType) {
            return $this->success($roomType, "Current hotel room type");
        }
        return $this->error("No room type found!");
    }

    public function generateRoomName($name)
    {
        // Solution: https://stackoverflow.com/questions/32633493/get-first-letters-from-a-string-of-two-words-php-fastest-way
        $c = explode(" ", $name);
        $r = "";

        foreach ($c as $o) {
            $r .= $o[0];
        }
        return strtoupper($r);
    }
}
