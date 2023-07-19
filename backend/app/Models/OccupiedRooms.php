<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OccupiedRooms extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "check_in",
        "check_out",
        "room_id",
    ];

    public static function occupiedRooms($request, $id=null){
        $occupiedRooms = $request->only(['check_in','check_out','room_id']);
        $occupiedRooms = self::updateOrCreate(['id' => $id], $occupiedRooms);
        return $occupiedRooms;  
    }

    public function room()
    {
        return $this->belongsTo(Rooms::class);
    }
}
