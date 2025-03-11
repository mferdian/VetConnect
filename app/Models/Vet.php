<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vet extends Model
{
    use HasFactory;

    protected $fillable =
    [
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
        'deskripsi'
    ];


    public function schedules():HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    public function articles():HasMany
    {
        return $this->hasMany(Article::class);
    }

}
