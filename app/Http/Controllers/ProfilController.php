<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfilController extends Controller
{
    public function show()
    {
        return view('profil', [
            'user' => auth()->user(),
        ]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
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

        $user = auth()->user();

        // Hapus foto lama kalau ada
        if ($user->foto) {
            Storage::disk('public')->delete($user->foto);
        }

        // Simpan foto baru
        $path = $request->file('foto')->store('pfp', 'public');

        $user->update(['foto' => $path]);

        return redirect()->route('profil.show')->with('success', 'Foto profil berhasil diperbarui.');
    }
}