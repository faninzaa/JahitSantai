<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

// Halaman utama -> arahkan ke beranda
Route::get('/berandablmlogin', function () {
    return view('berandablmlogin');
});

Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');

Route::get('/beranda', function () {
    return view('beranda');
})->name('beranda');

Route::get('/auth/google/redirect', [AuthController::class, 'googleRedirect'])->name('google.redirect');
Route::get('/auth/google/callback', [AuthController::class, 'googleCallback']);

// ==== Register ====
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// ==== Login ====
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// ==== Lupa Password ====
Route::get('/lupa-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/lupa-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// ==== Halaman publik ====
Route::get('/layananblmlogin', function () {
    return view('layananblmlogin');
});

Route::get('/layanan', function () {
    return view('layanan');
});

Route::get('/tentangblmlogin', function () {
    return view('tentangblmlogin');
});

Route::get('/tentangkami', function () {
    return view('tentangkami');
});

Route::get('/detaillayanan', function () {
    return view('detaillayanan');
});

Route::post('/pesanan', [PesananController::class, 'checkout']);
Route::get('/pesanan', [PesananController::class, 'create'])->name('pesanan.create');
Route::post('/pesanan', [PesananController::class, 'store'])->name('pesanan.store');
Route::get('/pesanan/{id}/sukses', [PesananController::class, 'sukses'])->name('pesanan.sukses');

Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');

// ==== Route yang butuh login ====
Route::middleware('auth')->group(function () {
    Route::get('/dashboarduser', function () {
        return view('admin.dashboarduser');
    })->name('dashboarduser');

    // Logout (cukup didefinisikan sekali)
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Profil
    Route::get('/profil/profiluser', [ProfilController::class, 'show'])->name('profil.show');
    Route::put('/profil/profiluser', [ProfilController::class, 'update'])->name('profil.update');
    Route::post('/profil/foto', [ProfilController::class, 'updateFoto'])->name('profil.foto.update');

    Route::get('/profil/profilpemesanan', [ProfilController::class, 'riwayatPemesanan'])->name('profil.pesanan');
    Route::get('/profil/profilulasan', [ProfilController::class, 'riwayatUlasan'])->name('profil.ulasan');
    Route::get('/profil/profilukuran', [ProfilController::class, 'ukuran'])->name('profil.ukuran');
    //Route::get('/pesan-saya', [PesanController::class, 'index'])->name('pesan.index');
    Route::get('/profil/profilpengaturan', [PengaturanController::class, 'index'])->name('pengaturan.index');
});

Route::get('/api/users', [UserController::class, 'index']);
Route::delete('/api/users/{id}', [UserController::class, 'destroy']);