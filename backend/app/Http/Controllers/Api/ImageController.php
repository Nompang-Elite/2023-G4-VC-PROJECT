<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    use HttpResponse;

    public function uploadImage(Request $req)
    {
        $req->validate([
            "image" => "required|image|mimes:png,jpg"
        ]);

        $file = $req->file('image');

        $filename =  date('YmdHi') . "." . $file->getClientOriginalExtension();

        $file->move(public_path('image'), $filename);

        return $this->success($filename);
    }
}
