<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UkuranBawah extends Model
{
    protected $table = 'ukuranbawah';

    protected $fillable = [
        'profil_ukuran_id',
        'lingkar_panggul1',
        'lingkar_panggul2',
        'panjang_rok',
        'ban',
        'panggul1',
        'panggul2',
    ];

    public function profilUkuran()
    {
        return $this->belongsTo(ProfilUkuran::class, 'profil_ukuran_id');
    }
}