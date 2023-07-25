<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hotel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'rate',
        'description',
        'rate',
    ];

    public function HotelInfos():HasMany
    {
        return $this->hasMany(HotelInfo::class);
    }
    public function Rooms():HasMany
    {
        return $this->hasMany(Rooms::class);
    }
    public function RoomsType():HasMany
    {
        return $this->hasMany(RoomType::class);
    }
}
