<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'room_type',
        'image',
        'property_type',
        'room_status',
        'price',
        'hotel_id',
    ];

    public function hotel():BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }

}

