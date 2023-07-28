<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\HotelInfo;
use App\Models\User;
use App\Models\UserTypes;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    use HttpResponse;
    public function __construct()
    {
        // Declare admin role auth
        $this->middleware(['auth.role:admin', 'auth:api'])->except(['login']);
    }

    public function info()
    {
        // Get the current login user
        if ($usr = auth()->user()) {
            // Get the type of user via ID
            $usr->user_type = UserTypes::find($usr->user_type)->type;
            // Return the data
            return $this->success($usr, "admin information");
        };
        // Return error messages:
        return $this->error("something went wrong!", 400);
    }

    public function login(Request $req)
    {
        // Checing validation with validateRequest function
        if ($this->validateRequest($req->input(), [
            "email" => "required|email",
            "password" => "required"
        ])) {
            if ($token = auth()->attempt($req->input())) {
                // Store as variable
                $usr = auth()->user();
                // Convert user type id to its type name
                $usr->user_type = UserTypes::find($usr->user_type)->type;
                $usr->access_token = $token;
                return $usr->user_type  == "admin" ? $this->success($usr, "authorized") : $this->error("please login with admin account!");
            }
            return $this->error("unauthorized");
        };
        return $this->error("unauthorized");
    }

    private function validateRequest($req, $rules = [])
    {
        $validate = Validator::make($req, $rules);
        // Return fails if the validation is false
        if ($validate->fails()) {
            return false;
        }
        // Return true if the validation is true
        return true;
    }
    public function registerHotel(Request $req)
    {

        $usr = [
            "firstname" => $req->input()["firstname"],
            "lastname" => $req->input()["lastname"],
            "email" => $req->input()["email"],
            "phone" => $req->input()["phone"],
            "gender" => $req->input()["gender"],
            "password" => $req->input()["password"],
            "password_confirmation" => $req->input()["password_confirmation"],
            "user_type" => 2, // Hotel owner id is 2
        ];
        $validateUser = Validator::make($usr, [
            "firstname" => "required|max:500",
            "lastname" => "required|max:500",
            "email" => "required|max:1000|email|unique:users,email",
            "phone" => "required|min:9|max:12",
            "gender" => "required|max:2",
            // References:  https://stackoverflow.com/questions/31539727/laravel-password-validation-rule
            "password" => "required|confirmed|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/"
        ]);


        $hotel = [
            "name" =>  $req->input()["hotel_name"],
            "description" => $req->input()["description"],
        ];
        $validateHotel = Validator::make($hotel, [
            "name" => "required|unique:hotels|max:500",
            "description" => "required|min:10"
        ]);

        $hotelInfo = [
            "city" => $req->input()["city"],
            "country" => $req->input()["country"],
            "address" => $req->input()["address"],
            "postal_code" => $req->input()["postal_code"],
            "phone" => $req->input()["hotel_phone"],
            "email" => $req->input()["hotel_email"],
        ];
        $validateHotelInfo = Validator::make($hotelInfo, [
            "city" => "required",
            "country" => "required",
            "address" => "required",
            "postal_code" => "required",
            "phone" => "required|min:9|max:12",
            "email" => "required|max:1000|email|unique:users,email",
        ]);


        if (!$validateUser->fails() && !$validateHotel->fails() && !$validateHotelInfo->fails()) {
            // Hotel owner register
            $usr = User::create($usr);
            User::find($usr->id)->user_type = 2;
            // Hotel register
            $hotel['user_id'] = $usr->id;
            $hotel = Hotel::create($hotel);
            // Hotel info register
            $hotelInfo['hotel_id'] = $hotel->id;
            $hotelInfo = HotelInfo::create($hotelInfo);
            // Response
            return $this->success([
                $usr, $hotel, $hotelInfo
            ], "created");
        };

        return $this->error([
            $validateUser->errors(),
            $validateHotel->errors(),
            $validateHotelInfo->errors()
        ]);
    }
    // Get all user 
    public function getAllUsers()
    {
        $users = User::where("user_type", 2)->orWhere("user_type", 3)->get();

        return  $this->success($users, "Get user");
    }
    // Get all guests
    public function getGuest()
    {
        $guests = User::where("user_type", 3)->get();

        return $this->success($guests, "Get Guest");
    }
    public function getOwner()
    {
        $guests = User::where("user_type", 2)->get();

        return $this->success($guests, "Get Owner");
    }
    //========= Delete user==========
    public function deleteUser($id)
    {
        $user =User::find($id);
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'user not found'], 404);
        }
        $user->delete();
        return response()->json(['success' => true, 'message' => 'user deleted successfully',$user], 200);
    }
}
