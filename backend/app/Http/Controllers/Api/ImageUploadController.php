<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HotelImages;
use App\Models\Images;
use App\Models\RoomImages;
use App\Models\UserImages;
use App\Http\Resources\Hotels\HotelImages as HotelImagesResource;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImageUploadController extends Controller
{
    use HttpResponse;

    public function __construct()
    {
        $this->middleware(['auth:api'])->except(['getHotelImages', 'roomImageUpload', 'hotelImageUpload']);
    }

    public function imgVlidationCheck($req)
    {
        $validate = Validator::make(
            ["image" => $req->image],
            [
                "image" => "required|image|mimes:png,jpg|max:2048"
            ]
        );
        return !$validate->fails() ? ["status" => true] : ["status" => false, "errors" => $validate->errors()];
    }

    public function  uploadImage($req)
    {
        // Solution: https://stackoverflow.com/questions/63501268/how-to-get-the-hashed-name-of-a-file-that-was-uploaded-with-laravel-livewire-in
        // Validation information: https://www.tutsmake.com/image-validation-in-laravel/
        // $req->validate([
        //     "image" => "required|image|mimes:png,jpg|max:2048"
        // ]);
        $validate = $this->imgVlidationCheck($req)["status"];

        // dd(base64_encode(file_get_contents($req->image)));

        if ($validate) {
            $file = $req->image;

            $filename = $file->hashName();

            $file->move(storage_path('\images'), $filename);
            // Solution: https://stackoverflow.com/questions/71292454/how-can-i-store-the-images-as-blob-file-in-database-using-laravel-8
            // Decode blob file to base64:
            $ecodedToBase64 = base64_encode(
                // Get file as blob:
                file_get_contents($file)
            );
            $img = Images::create(
                [
                    'image_hash' => $ecodedToBase64
                ]
            );
            return $img;
        }
        return $this->error($validate["errors"]);
    }


    public function userImageUpload(Request $req)
    {
        if ($this->imgVlidationCheck($req)["status"]) {
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
        return $this->error($this->imgVlidationCheck($req)["errors"]);
    }

    public function roomImageUpload(Request $req)
    {
        if ($this->imgVlidationCheck($req)["status"]) {
            $img =  $this->uploadImage($req);
            return $this->success(
                RoomImages::create(
                    [
                        "room_id" => $req->room_type,
                        "image_id" => $img->id
                    ]
                ),
                "room image uploaded"

            );
        }
        return $this->error($this->imgVlidationCheck($req)["errors"]);
    }

    public function hotelImageUpload(Request $req)
    {
        if ($this->imgVlidationCheck($req)["status"]) {
            $img =  $this->uploadImage($req);
            return $this->success(
                HotelImages::create(
                    [
                        "hotel_id" => $req->hotel_id,
                        "image_id" => $img->id
                    ]
                ),
                "hotel image uploaded"
            );
        }

        return $this->error($this->imgVlidationCheck($req)["errors"]);
    }

    public function getHotelImages(Request $req)
    {
        // NOTE: To use the base64 has in img src, the "data:image/*;base64," need to be included.
        // References : https://stackoverflow.com/questions/7650587/using-javascript-to-display-a-blob
        $hotelImages = HotelImagesResource::collection(HotelImages::where("hotel_id", $req->hotel_id)->get());
        return $this->success(
            $hotelImages
        );
    }
}
