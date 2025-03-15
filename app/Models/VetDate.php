<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VetDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'vet_id',
        'tanggal'
    ];

    public function vet():BelongsTo
    {
        return $this->belongsTo(Vet::class,'vet_id');
    }
}
