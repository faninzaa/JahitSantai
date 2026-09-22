<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $fillable = [
        'user_id',
        'layanan_id',
        'profil_ukuran_id',
        'order_id',
        'snap_token',
        'status',
        'total',
        'metode_pengiriman',
        'alamat',
        'no_hp',
        'nama_penerima',
        'catatan',
        'waktu',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function profilUkuran()
    {
        return $this->belongsTo(ProfilUkuran::class, 'profil_ukuran_id');
    }
}