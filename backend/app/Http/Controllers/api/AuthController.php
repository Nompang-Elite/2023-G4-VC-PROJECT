<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        // Route filtering wit middleware:
        $this->middleware('auth:api')->except(['login', 'register', 'error']);
    }

    public function register(Request $request)
    {
        /**
         * Regex pattern source for the validation:
         * https://stackoverflow.com/questions/31539727/laravel-password-validation-rule
         * 
         * */

        // dd($request->input());
        $validate = Validator::make(
            $request->input(),
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'gender' => 'required',
                'phone' => 'required',
                'email' => 'required|email|unique:users,email',
                'account_type' => 'required|alpha_num',
                'password' => 'required|min:10|confirmed|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            ],
            []
        );

        if ($validate->fails()) {
            return response()->json(
                [
                    'error' => $validate->errors()
                ],
                401
            );
        }

        $user = User::create(
            [
                'firstname' => $request['firstname'],
                'lastname' => $request['lastname'],
                'gender' => $request['gender'],
                'phone' => $request['phone'],
                'email' => $request['email'],
                'account_type' => $request['account_type'],
                'password' => $request['password'],
            ]
        );
        return response()->json(
            [
                'user' => $user,
                'access_token' => Auth::login($user)
            ],
            201
        );
    }


    /**
     * 
     * User Login
     * 
     * **/

    public function login(Request $request)
    {
        $validate = Validator::make(
            $request->input(),
            [
                'password' => 'required|min:10|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
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
                'error' => !$validate->errors() ? $validate->errors(): "Account not available!",
            ]
        );
    }

    /**
     * User Logout
     * 
     * Source Code from: https://dev-yakuza.posstree.com/en/laravel/jwt-logout/
     * **/

    public function logout()
    {
        // Check for the existing user:
        if (auth()->hasUser()) {
            // Clear user token with auth():
            Auth::guard('api')->logout();
            // Return a successful message:
            return response()->json([
                'status' => 'success',
                'message' => 'logout'
            ], 201);
        }
        // Return a unseccessfull message if already logout:
        return response()->json([
            'status' => 'unsuccessfuly',
            'message' => 'You already logout'
        ], 204);
    }




    /**
     * HTTP Code docs source:
     * https://kinsta.com/blog/http-status-codes/#:~:text=400s%3A%20Client%20error%20codes%20indicating,the%20fulfillment%20of%20the%20request.
     * **/
}
