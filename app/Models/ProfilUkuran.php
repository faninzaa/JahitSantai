<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilUkuran extends Model
{
    protected $table = 'profilukuran';

    protected $fillable = [
        'user_id',
        'nama_profil',
        'waktu',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ukuranAtas()
    {
        return $this->hasOne(UkuranAtas::class, 'profil_ukuran_id');
    }

    public function ukuranBawah()
    {
        return $this->hasOne(UkuranBawah::class, 'profil_ukuran_id');
    }

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'profil_ukuran_id');
    }
}