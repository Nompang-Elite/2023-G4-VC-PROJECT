<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserImages extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "user_id",
        "image_id",
    ];
}
