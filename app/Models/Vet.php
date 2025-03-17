<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vet extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'no_telp',
        'alamat',
        'STR',
        'SIP',
        'hewan',
        'jenis_kelamin',
        'foto',
        'tgl_lahir',
        'deskripsi',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'hewan' => 'array',
        'tgl_lahir' => 'date'
    ];


    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
    public function vetDates(): HasMany
    {
        return $this->hasMany(vetDate::class);
    }
    public function vetTimes(): HasMany
    {
        return $this->hasMany(vetTime::class);
    }
}
