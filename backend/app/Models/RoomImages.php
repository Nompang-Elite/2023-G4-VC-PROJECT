<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomImages extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "room_id",
        "image_id",
    ];
    public static function hotel($request, $id=null){
        $roomImage = $request->only(['room_id','image_id']);
        $roomImage = self::updateOrCreate(['id' => $id], $roomImage);
        return $roomImage;  
    }

    public function room()
    {
        return $this->belongsTo(Rooms::class);
    }
}
