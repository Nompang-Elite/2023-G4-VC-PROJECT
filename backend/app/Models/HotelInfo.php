<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelInfo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "address",
        "city",
        "country",
        "postal_code",
        "phone",
        "email",
        "hotel_id",
    ];
}
