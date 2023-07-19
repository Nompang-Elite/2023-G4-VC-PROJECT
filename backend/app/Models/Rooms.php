<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "number",
        "name",
        "status",
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
