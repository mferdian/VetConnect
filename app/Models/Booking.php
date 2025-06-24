<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'vet_id',
        'vet_date_id',
        'vet_time_id',
        'keluhan',
        'total_harga',
        'status',
        'status_bayar',
        'metode_pembayaran'
    ];

    public static function generateUniqueOrderId(): string
    {
        $prefix = 'ORDER-';

        do {
            $randomString = $prefix . mt_rand(100000, 999999); // Random 6 digit
        } while (self::where('order_id', $randomString)->exists());

        return $randomString;
    }


    protected $casts = [
        'total_harga' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function vet(): BelongsTo
    {
        return $this->belongsTo(Vet::class);
    }

    public function vetDate(): BelongsTo
    {
        return $this->belongsTo(VetDate::class);
    }

    public function vetTime(): BelongsTo
    {
        return $this->belongsTo(VetTime::class);
    }

    // Scopes
    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeCanceled($query)
    {
        return $query->where('status', 'canceled');
    }

    public function scopePaidSuccessfully($query)
    {
        return $query->where('status_bayar', 'berhasil');
    }

    // Accessor untuk format currency
    public function getFormattedTotalHargaAttribute()
    {
        return 'Rp ' . number_format($this->total_harga, 0, ',', '.');
    }

    public function review(): HasOne
    {
        return $this->hasOne(Review::class);
    }
}
