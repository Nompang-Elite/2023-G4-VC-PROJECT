<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserTypes;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

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
    //<-------------- Get Userimage and username ----------------------->//
    public function getUsersInfo($type)
    {
        $user = User::where("user_type", UserTypes::where("type", (string)$type)->first()->id)->get();
        return $this->success($user, "User information");
    }
}
