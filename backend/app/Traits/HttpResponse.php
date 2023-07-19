<?php

namespace App\Traits;


trait HttpResponse
{
    private function success($data = null, $msg = null, $code = 200)
    {
        return response()->json(
            [
                "status" => "successfully",
                "message" => $msg,
                "data" => $data,
            ],
            $code
        );
    }

    private function error($msg = null, $code = 400)
    {
        return response()->json(
            [
                "status" => "unsuccessful",
                "errors" => $msg,
            ],
            $code
        );
    }

    private function unauthorize($code = 401)
    {
        return response()->json(
            [
                "status" => "unauthorize",
            ],
            $code
        );
    }
}
