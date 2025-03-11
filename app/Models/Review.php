<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'booking_id',
        'user_id',
        'review',
        'rating'
    ];

    public function booking():BelongsTo
    {
        return $this->belongsTo(Booking::class,'booking_id');
    }
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
