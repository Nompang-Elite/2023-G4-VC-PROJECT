<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HotelImages;
use App\Models\Images;
use App\Models\RoomImages;
use App\Models\UserImages;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImageUploadController extends Controller
{
    use HttpResponse;

    public function __construct()
    {
        $this->middleware(['auth:api'])->except(['roomImageUpload']);
    }

    public function  uploadImage($req)
    {
        // Solution: https://stackoverflow.com/questions/63501268/how-to-get-the-hashed-name-of-a-file-that-was-uploaded-with-laravel-livewire-in
        // Validation information: https://www.tutsmake.com/image-validation-in-laravel/
        // $req->validate([
        //     "image" => "required|image|mimes:png,jpg|max:2048"
        // ]);

        $validate = Validator::make(
            ["image" => $req->image],
            [
                "image" => "required|image|mimes:png,jpg|max:2048"
            ]
        );

        if (!$validate->fails()) {

            $file = $req->image;

            $filename = $file->hashName();

            $file->move(storage_path('\images'), $filename);

            $img = Images::create(
                [
                    'hash_name' => $filename
                ]
            );
            return $img;
        }

        return $this->error($validate->errors());
    }


    public function userImageUpload(Request $req)
    {
        $img =  $this->uploadImage($req);

        $userId = auth()->user()->id;
        return $this->success(
            UserImages::create(
                [
                    "user_id" => $userId,
                    "image_id" => $img->id
                ]
            ),
            "user image uploaded"
        );
    }

    public function roomImageUpload(Request $req, $roomId)
    {
        $img =  $this->uploadImage($req);
        return $this->success(
            RoomImages::create(
                [
                    "room_id" => $roomId,
                    "image_id" => $img->id
                ]
            ),
            "room image uploaded"

        );
    }

    public function hotelImageUpload(Request $req, $hotelId)
    {
        $img =  $this->uploadImage($req);
        return $this->success(
            HotelImages::create(
                [
                    "hotel_id" => $hotelId,
                    "image_id" => $img->id
                ]
            ),
            "hotel image uploaded"
        );
    }
}
