<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShowRoomTypesResource;
use App\Models\RoomType;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;

class RoomTypesController extends Controller
{
   use HttpResponse;
   // ------------Get room_types--------------
   public function index()
   {
      $roomType = RoomType::all();
      $roomType = ShowRoomTypesResource::collection($roomType);
      if ($roomType)
         return $this->success($roomType, "list of roomType");

      return $this->error("list is empty", 404);
   }
}
