<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Booking extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'user_id',
        'schedule_id',
        'keluhan',
        'total_harga',
        'status',
        'status_bayar',
        'metode_pembayaran'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function schedule():BelongsTo
    {
        return $this->belongsTo(Schedule::class,'schedule_id');
    }

    public function reviews():HasMany
    {
        return $this->hasMany(Review::class);
    }

}
