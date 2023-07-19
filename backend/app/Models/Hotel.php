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
        'image',
        'location',
        'description',
    ];

    public static function hotel($request, $id=null){
        $hotel = $request->only(['name','image', 'location', 'description']);
        $hotel = self::updateOrCreate(['id' => $id], $hotel);
        return $hotel;  
    }

    public function room()
    {
        return $this->hasMany(Rooms::class);
    }
}
