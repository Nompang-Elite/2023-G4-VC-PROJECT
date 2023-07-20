<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "date_in",
        "date_out",
        "made_by",
        "user_id",
        "hotel_id",
    ];
}
