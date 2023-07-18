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
}
