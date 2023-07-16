<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HostedAt extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "occupied_id",
        "user_id",
    ];
}
