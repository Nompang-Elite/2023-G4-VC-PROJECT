<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OccupiedRooms extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "room_id",
        "check_in",
        "check_out",

    ];
    // Relationship between occupiedRoom has many hostedAt
    public function occupiedRooms(): HasMany
    {
        return $this->hasMany(OccupiedRooms::class);
    }
    // Relationship between room and occupiedRoom
    public function room()
    {
        return $this->belongsTo(Rooms::class);
    }
}
