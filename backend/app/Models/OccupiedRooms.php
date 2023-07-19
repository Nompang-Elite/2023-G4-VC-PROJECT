<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OccupiedRooms extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "room_id",
        "check_in",
        "check_out",
        
    ];
    
}
