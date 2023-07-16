<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "name",
        "description",
        "max_capacity",
        "bed_count",
    ];
}
