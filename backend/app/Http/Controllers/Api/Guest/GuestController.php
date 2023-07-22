<?php

namespace App\Http\Controllers\Api\Guest;

use App\Http\Controllers\Controller;
use App\Models\Reviews;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuestController extends Controller
{
    use HttpResponse;


    public function __construct()
    {
        $this->middleware("auth:api")->except([]);
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
            return $this->success(
                Reviews::create(
                    $reviews
                ),
                201
            );
        }

        return $this->error("something went wrong");
    }
}
