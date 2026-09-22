<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    private const DEFAULTS = [
        'notif' => ['status' => true, 'jadwal' => true, 'invoice' => true, 'chat' => true],
        'bahasa_app' => 'id',
        'bahasa_notif' => 'id',
    ];

    public function index()
    {
        return view('profil.profilpengaturan', [
            'p' => session('pengaturan', self::DEFAULTS),
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'bahasa_app'   => ['nullable', 'in:id,en'],
            'bahasa_notif' => ['nullable', 'in:id,en'],
        ]);

        $data = [
            'notif' => [
                'status'  => $request->boolean('notif_status'),
                'jadwal'  => $request->boolean('notif_jadwal'),
                'invoice' => $request->boolean('notif_invoice'),
                'chat'    => $request->boolean('notif_chat'),
            ],
            'bahasa_app'   => $request->input('bahasa_app', 'id'),
            'bahasa_notif' => $request->input('bahasa_notif', 'id'),
        ];

        // SEMENTARA disimpan di session. Untuk permanen, simpan ke database
        // (mis. kolom JSON "pengaturan" di tabel users).
        session(['pengaturan' => $data]);

        // Sambung ke route lang.switch yang sudah ada (memakai session 'locale')
        session()->put('locale', $data['bahasa_app']);

        return redirect()->route('pengaturan.index')->with('success', 'Pengaturan berhasil disimpan.');
    }
}