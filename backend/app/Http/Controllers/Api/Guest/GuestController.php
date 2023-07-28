<?php

namespace App\Http\Controllers\Api\Guest;

use App\Http\Controllers\Controller;
use App\Models\HostedAt;
use App\Models\Hotel;
use App\Models\OccupiedRooms;
use App\Models\Reservations;
use App\Models\ReservedRooms;
use App\Models\Reviews;
use App\Models\Rooms;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuestController extends Controller
{
    use HttpResponse;


    public function __construct()
    {
        $this->middleware("auth:api")->except(["calRating"]);
    }

    // Caculating the rate of hotel
    public function calRating($hotelId)
    {
        $hotel = Hotel::find($hotelId);

        $reviews = Reviews::where("hotel_id", $hotelId)->get();

        (int) $rateCount = 0;
        foreach ($reviews as $r) {
            $rateCount += $r->rate;
        }

        $average = round($rateCount / max(count($reviews), 1));

        $hotel->rate = $average;

        $hotel->save();

        return $this->success($hotel);
    }

    // Post user reviews
    public function postReview(Request $req)
    {
        $validate = Validator::make(
            $req->input(),
            [
                "rate" => "required|numeric",
                "hotel_id" => "required",
                "comment" => "required|min:10|string|",
            ]
        );

        if (!$validate->fails()) {

            $reviews = $req->input();

            $reviews["user_id"] = auth()->user()->id;

            $this->calRating($reviews["hotel_id"]);

            return $this->success(
                Reviews::create(
                    $reviews
                ),
                201
            );
        }

        return $this->error("something went wrong");
    }
    public function userBooking(Request $req)
    {
        // Reserved room
        // "number_of_room",
        // "status",
        // "reservation_id",
        // "room_type_id",

        // Reservation
        // "date_in",
        // "date_out",
        // "made_by",
        // "user_id",
        // "hotel_id",


        $isValid = Validator::make(
            $req->input(),
            [
                "date_in" => "required",
                "date_out" => "required",
                "hotel_id" => "required",
                "number_of_room" => "required",
                "room_type_id" => "required",
            ]
        );

        $userId = auth()->user()->id;
        if (!$isValid->fails()) {
            $reservationForm = [
                "date_in" => $req->input()["date_in"],
                "date_out" => $req->input()["date_out"],
                "hotel_id" => (int)$req->input()["hotel_id"],
                "user_id" => $userId,
            ];

            $reservation = Reservations::create($reservationForm);
            // User reserve
            $reservedRoomForm = [
                "number_of_room" => $req->input()["number_of_room"],
                "status" => "reserved",
                "reservation_id" => $reservation->id,
                "room_type_id" => (int)$req->input()["room_type_id"],
            ];

            // Bind with reserved room
            $reservedRoom = ReservedRooms::create($reservedRoomForm);

            $rooms = Rooms::where("hotel_id", $req->input()["hotel_id"])->get();
            $occupied = null;
            $hostAt = null;
            $booked = true;
            foreach ($rooms as $room) {
                if ($room["status"] == "unoccupied" && $booked) {

                    $occupied = OccupiedRooms::create(
                        [
                            "check_in" => "2023-07-28 00:55:57",
                            "check_out" => "2023-07-28 00:55:57",
                            "room_id" => $room["id"],
                        ]
                    );

                    optional(Rooms::find($room['id']))->update(["status" => "occupied"]);
                    $hostAt = HostedAt::create(
                        [
                            "user_id" => $userId,
                            "occupied_id" => $occupied->id
                        ]
                    );
                    $booked = false;
                }
            }
            return $this->success([
                "reservation" => $reservation,
                "reserved_room" => $reservedRoom,
                "occupied" => $occupied,
                "host_at" => $hostAt
            ]);
        }
        return $this->error($isValid->errors(), "Something went wrong!");
    }
}
