<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rooms extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "number",
        "name",
        "status",
        "room_type_id",
        "hotel_id",
    ];
// ------------------------Update function---------------
    public static function store($request,$id = null)
    {
        //request values
        $room = $request->only(['number','name', 'status','room_type_id','hotel_id']);
        $room = self::updateOrCreate(['id'=> $id], $room);
        return $room;
    }


    public function hotel():BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }
    public function RoomType():BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }
}
