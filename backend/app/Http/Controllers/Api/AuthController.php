<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        $this->middleware('auth:api')->except(['login', 'register', 'error']);
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
        // Return success msg:
        return $this->success(
            $data = array_merge(array('user' => $usr), ["access_token" => Auth::login($usr)])
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
            $token = auth()->attempt($request->input());
            if ($token) {
                return response()->json(
                    [
                        'user' => auth()->user(),
                        'access_token' => $token
                    ]
                );
            }
        }
        return response()->json(
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
}
