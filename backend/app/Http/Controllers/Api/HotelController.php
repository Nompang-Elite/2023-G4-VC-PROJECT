<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Hotels\HotelDetailImages as HotelDetailImagesRes;
use App\Http\Resources\Hotels\HotelReviews as HotelReviewsResource;
use App\Http\Resources\Hotels\RoomsTypeHashImages as RoomsTypeHashImagesRes;
use App\Http\Resources\ShowHotelResource;
use App\Models\Hotel;
use App\Models\HotelImages;
use App\Models\HotelInfo;
use App\Models\Reviews;
use App\Models\RoomType;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Rooms\OccupiedRooms as OccupiedRoomsRes;
use App\Models\Rooms;

class HotelController extends Controller
{
    use HttpResponse;
    // ---------------get all hotels---------------
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'search', 'HotelsInfoId', 'getHotelReviews']);
    }
    public function index()
    {
        $hotel = Hotel::all();
        $hotel = ShowHotelResource::collection($hotel);
        if ($hotel)
            return $this->success($hotel, "list of hotels");

        return $this->error("list is empty", 404);
    }
    // -------------Relation hotel with room---------------
    public function hotelRooms()
    {
        // --------------Access to hotel and hotel access to room---------
        $hotel = Hotel::where("user_id", auth()->user()->id)->first();
        $rooms = Rooms::where("hotel_id", $hotel->id)->get();
        return $this->success($rooms, "hotel lists", 200);
    }

    // -------------Filter hotel with room---------------
    public function filterRooms($status = "unoccupied")
    {
        $rooms = Rooms::where("hotel_id", Hotel::where("user_id", auth()->user()->id)->first()->id)->where("status", $status)->get();
        $filters = OccupiedRoomsRes::collection($rooms);
        return $this->success($filters);
    }
    // Recovered code start from here
    //----------get only one hotel------------
    public function show($id)
    {
        $hotel = Hotel::find($id);
        $hotel = new ShowHotelResource($hotel);
        return response()->json(['success' => true, 'data' => $hotel], 200);
    }

    //-------delete hotel by id-------
    public function destroy(string $id)
    {
        $hotel = Hotel::find($id);
        $hotel->delete();
        return response()->json(['success' => true, 'data' => $hotel], 200);
    }

    //---------Show room in hotel-------------
    public function HotelRoom()
    {
        $hotel = Hotel::with(['rooms'])->get();
        return response()->json(['success' => true, 'data' => $hotel], 200);
    }

    //---------Show room in each hotel-------------
    public function HotelRoomId($id)
    {
        $hotel = Hotel::with(['rooms'])->find($id);
        return response()->json(['success' => true, 'data' => $hotel], 200);
    }
    // Recovered code end from here

    /**
     * 
     * Search function
     * 
     * **/
    public function search(Request $req)
    {
        $input = $req->query('s');
        // Search Query
        $hotels =  DB::select('select * from hotels where hotels.name like :input', ["input" => "%" . $input . "%"]);
        // Return Data
        if (!count($hotels) <= 0) {
            // Return the result data
            return $this->success($hotels, "search result", 200);
        }
        // Error if no result
        return $this->error("not match!");
    }

    //====get all hotel with info==========
    public function HotelsInfo()
    {
        $hotel = Hotel::with(['HotelInfos', 'Rooms', 'RoomsType'])->get();
        if ($hotel)
            return $this->success($hotel, "list of hotels with hotels info");

        return $this->error("list is empty", 404);
    }

    //====get only one hotel with info==========

    public function HotelsInfoId($id)
    {
        $hotel = Hotel::find($id);

        $hotelInfo = HotelInfo::where("hotel_id", $hotel->id)->get();

        $hotel->images = HotelDetailImagesRes::collection(HotelImages::where("hotel_id", $hotel->id)->get());
        $hotel->info = $hotelInfo;

        $hotel->room_type = RoomsTypeHashImagesRes::collection(RoomType::where("hotel_id", $hotel->id)->get());

        $result = $hotel;

        return $this->success($result, "list of hotel");
    }

    // Hotel reveiews
    public function getHotelReviews(Request $req)
    {
        $reviews = HotelReviewsResource::collection(Reviews::where(
            "hotel_id",
            (int)$req->input(
                "hotel_id"
            )
        )->get());

        if (count($reviews) >= 1) {
            return $this->success($reviews, "reviews");
        }
        return $this->error("no reviews", 404);
    }
};
