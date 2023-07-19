<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rooms extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "name",
        "number",
        "room_type_id",
        "hotel_id",
        "room_type_id",
        "hotel_id",
    ];
    // Relationship between room has many occupiedRoom
    public function rooms():HasMany{
        return $this->hasMany(Rooms::class);
    }
}
