<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\ProfilUkuran;
use App\Models\UkuranAtas;
use App\Models\UkuranBawah;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Midtrans\Config;
use Midtrans\Snap;

class PesananController extends Controller
{
    public function create()
    {
        $layanan = (object) [
            'id'           => 1,
            'nama_layanan' => 'Permak Rok',
            'harga'        => 30000,
            'gambar'       => 'images/gambaratas.png',
        ];

        $subtotal = 30000;
        $ongkir   = 10000;
        $total    = $subtotal + $ongkir;

        return view('pesanan', compact('layanan', 'subtotal', 'ongkir', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'layanan_id'         => 'required|integer',
            'nama_penerima'      => 'required|string|max:255',
            'no_hp'              => 'required|string|max:20',
            'alamat'             => 'required|string',
            'metode_pengiriman'  => 'required|in:kurir,ambil_sendiri',
            'pinggang'           => 'nullable|numeric',
            'pinggul'            => 'nullable|numeric',
            'panjang_rok'        => 'nullable|numeric',
            'catatan'            => 'nullable|string',
        ]);

        // TODO: kalau nanti tabel layanan asli sudah dipakai, ganti findOrFail
        $harga    = 30000;
        $subtotal = $harga;
        $ongkir   = $request->metode_pengiriman === 'kurir' ? 10000 : 0;
        $total    = $subtotal + $ongkir;

        $pesanan = DB::transaction(function () use ($request, $total) {
            $profil = ProfilUkuran::create([
                'user_id'     => auth()->id(),
                'nama_profil' => 'Pesanan ' . now()->format('d-m-Y H:i'),
                'waktu'       => now(),
            ]);

            UkuranAtas::create([
                'profil_ukuran_id' => $profil->id,
                'lingkar_pinggang' => $request->pinggang,
            ]);

            UkuranBawah::create([
                'profil_ukuran_id' => $profil->id,
                'panggul1'         => $request->pinggul,
                'panjang_rok'      => $request->panjang_rok,
            ]);

            $orderId = 'JS-' . strtoupper(uniqid());

            return Pesanan::create([
                'user_id'           => auth()->id(),
                'layanan_id'        => $request->layanan_id,
                'profil_ukuran_id'  => $profil->id,
                'order_id'          => $orderId,
                'status'            => 'pending',
                'total'             => $total,
                'metode_pengiriman' => $request->metode_pengiriman,
                'alamat'            => $request->alamat,
                'no_hp'             => $request->no_hp,
                'nama_penerima'     => $request->nama_penerima,
                'catatan'           => $request->catatan,
                'waktu'             => now(),
            ]);
        });

        Config::$serverKey    = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized  = true;
        Config::$is3ds        = true;

        $snapToken = Snap::getSnapToken([
            'transaction_details' => [
                'order_id'     => $pesanan->order_id,
                'gross_amount' => (int) $pesanan->total,
            ],
            'customer_details' => [
                'first_name' => $request->nama_penerima,
                'phone'      => $request->no_hp,
            ],
        ]);

        $pesanan->update(['snap_token' => $snapToken]);

        // arahkan ke halaman BAYAR dulu, bukan langsung sukses
        return redirect()->route('pesanan.bayar', $pesanan->id);
    }

    public function bayar(Pesanan $pesanan)
    {
        abort_if($pesanan->user_id !== auth()->id(), 403);

        return view('pesanan.bayar', compact('pesanan'));
    }

    public function sukses(Pesanan $pesanan)
    {
        abort_if($pesanan->user_id !== auth()->id(), 403);

        $noPesanan = $pesanan->order_id;
        $total     = $pesanan->total;
        $metode    = 'Midtrans';
        $status    = $pesanan->status; // <-- ini yang menentukan tampilan, bukan asumsi

        return view('pesanansukses', compact('noPesanan', 'total', 'metode', 'status'));
    }
}