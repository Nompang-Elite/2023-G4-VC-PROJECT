<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservedRooms extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "number_of_room",
        "status",
        "reservation_id",
        "reservation_id",
        "room_type_id",
    ];
}
