<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\HotelInfo;
use App\Models\User;
use App\Models\UserTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\HttpResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use HttpResponse;

    public function __construct()
    {
        // Route filtering wit middleware:
        $this->middleware('auth:api')->except(['login', 'register', 'error', 'registerHotel']);
    }
    /**
     * 
     * User register
     * 
     * **/
    public function register(Request $req)
    {
        $validate = Validator::make(
            $req->input(),
            [
                "firstname" => "required|max:500",
                "lastname" => "required|max:500",
                "email" => "required|max:1000|email|unique:users,email",
                "phone" => "required|min:9|max:12",
                "gender" => "required|max:2",
                // References:  https://stackoverflow.com/questions/31539727/laravel-password-validation-rule
                "password" => "required|confirmed|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/"
            ]
        );

        // Check if the validation fail:
        if ($validate->fails()) {
            return $this->error(
                $validate->errors(),
                401
            );
        }

        // Create user obj:
        $usr = User::create(
            $req->input()
        );
        // Get account type 
        $usr->user_type = UserTypes::find(User::find($usr->id)->user_type)->type;
        // Add token to user object response
        $usr->access_token = Auth::login($usr);
        // Return success msg:
        return $this->success(
            $usr,
            200
        );
    }

    /*
     * 
     * User Login
     * 
     **/
    public function login(Request $request)
    {
        $validate = Validator::make(
            $request->input(),
            [
                'password' => 'required|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                'email' => 'required|email',
            ]
        );
        if (!$validate->fails()) {
            // Attempt login with auth guard:
            if ($token = auth()->attempt($request->input())) {
                $usr = auth()->user();
                // Get user type via ID
                $usr->user_type = UserTypes::find($usr->user_type)->type;
                $usr->access_token = $token;

                return $this->success(
                    $usr,
                    200
                );
            }
        }
        return $this->error(
            [
                'error' => !$validate->errors() ? $validate->errors() : "Account not available!",
            ],
            401
        );
    }
    /*
     * User Logout
     * 
     * Source Code from: https://dev-yakuza.posstree.com/en/laravel/jwt-logout/
     * **/

    public function logout()
    {
        Auth::guard('api')->logout();

        return response()->json([
            'status' => 'success',
            'message' => 'logout'
        ], 200);
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
            "name" =>  $req->input()["name"],
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
}
