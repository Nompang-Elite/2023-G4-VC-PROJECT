<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',    
        'description',
    ];

    public function rooms()
    {
        return $this->hasMany(Rooms::class);
    }
}
