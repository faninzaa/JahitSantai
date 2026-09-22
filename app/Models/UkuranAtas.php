<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UkuranAtas extends Model
{
    protected $table = 'ukuranatas';

    protected $fillable = [
        'profil_ukuran_id',
        'lingkar_badan',
        'lingkar_dada',
        'lebar_dada',
        'lebar_punggung',
        'lebar_bahu',
        'panjang_punggung',
        'panjang_baju',
        'panjang_lengan',
        'lingkar_lengan',
        'panjang_siku',
        'lingkar_siku',
        'lingkar_pinggang',
    ];

    public function profilUkuran()
    {
        return $this->belongsTo(ProfilUkuran::class, 'profil_ukuran_id');
    }
}