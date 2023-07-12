<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'location',
        'description',
    ];
 
     //user one to many post
     public function rooms():HasMany
     {
         return $this->hasMany(Room::class);
     }
  
 }
 
