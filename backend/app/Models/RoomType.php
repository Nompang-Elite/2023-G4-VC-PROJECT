<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "name",
        "description",
        "max_capacity",
        "bed_count",
        "price",
    ];
    public static function room_types($request, $id=null){
        $room_types = $request->only(['name','description', 'max_capacity', 'bed_count', 'price']);
        $room_types = self::updateOrCreate(['id' => $id], $room_types);
        return $room_types;  
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
