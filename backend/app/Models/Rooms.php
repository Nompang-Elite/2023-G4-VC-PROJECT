<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "name",
        "number",
        "room_type_id",
        "hotel_id",
    ];
    public static function room($request, $id=null){
        $room = $request->only(['name','number', 'room_type_id', 'hotel_id']);
        $room = self::updateOrCreate(['id' => $id], $room);
        return $room;  
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    
    public function roomImage()
    {
        return $this->hasMany(RoomImages::class);
    }
}



