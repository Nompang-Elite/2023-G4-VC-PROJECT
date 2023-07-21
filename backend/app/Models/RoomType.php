<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function Rooms():HasMany
    {
        return $this->hasMany(Rooms::class);
    }
    public function RoomImages():HasMany
    {
        return $this->hasMany(RoomImages::class);
    }
}
