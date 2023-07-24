<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelImages extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "hotel_id",
        "image_id",
    ];
}
