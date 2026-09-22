<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfilController extends Controller
{
    // Tab: Informasi akun
    public function show(Request $request)
    {
        return view('profil.profiluser', [
            'user' => $request->user(),
        ]);
    }

    // Tab: Riwayat pemesanan
    public function riwayatPemesanan(Request $request)
    {
        return view('profil.profilpemesanan');
    }

    // Tab: Riwayat ulasan
    public function riwayatUlasan(Request $request)
    {
        return view('profil.profilulasan');
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'no_hp' => ['nullable', 'string', 'max:15'],
        ]);

        $user->update($validated);

        return redirect()->route('profil.show')->with('success', 'Profil berhasil diperbarui.');
    }

    public function updateFoto(Request $request)
    {
        $request->validate([
            'foto' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'], // maks 2MB
        ]);

        $user = $request->user();

        // Hapus foto lama kalau ada
        if ($user->foto) {
            Storage::disk('public')->delete($user->foto);
        }

        // Simpan foto baru: hasilnya "pfp/namafile.jpg" di storage/app/public
        $path = $request->file('foto')->store('pfp', 'public');

        $user->update(['foto' => $path]);

        return redirect()->route('profil.show')->with('success', 'Foto profil berhasil diperbarui.');
    }
}