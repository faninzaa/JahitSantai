@extends('layouts.app')
@section('title', 'Pengaturan - JahitSantai')

@section('content')
    <h1 class="page-title">Profil Saya</h1>
    <p class="page-subtitle">Kelola informasi akun dan pengaturan Anda</p>

    @php
        $notif = [
            'status'  => 'Update status pengerjaan pesanan',
            'jadwal'  => 'Jadwal pengantaran',
            'invoice' => 'Invoice dan nota digital',
            'chat'    => 'Pengingat chat penjahit',
        ];
        $bahasa = ['id' => 'Bahasa Indonesia', 'en' => 'English'];
        $bell = '<svg viewBox="0 0 24 24"><path d="M6 16v-5a6 6 0 0 1 12 0v5l2 2H4z" /><path d="M10 21h4" /></svg>';
    @endphp

    <form id="form-pengaturan" method="POST" action="{{ route('pengaturan.update') }}" class="set-wrap">
        @csrf
        @method('PUT')

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Notifikasi --}}
        <section class="card set-card">
            <h2 class="set-title">Notifikasi</h2>
            <p class="set-desc">Kelola seluruh pemberitahuan aktivitas, status pesanan, dan dokumen transaksi melalui email</p>
            <hr class="set-line">

            @foreach ($notif as $key => $label)
                <div class="toggle-row">
                    <span class="set-icon">{!! $bell !!}</span>
                    <span>{{ $label }}</span>
                    <label class="switch">
                        <input type="checkbox" name="notif_{{ $key }}" value="1"
                            {{ $p['notif'][$key] ?? true ? 'checked' : '' }}>
                        <span></span>
                    </label>
                </div>
            @endforeach
        </section>

        {{-- Bahasa --}}
        <section class="card set-card">
            <h2 class="set-title">Bahasa</h2>
            <p class="set-desc">Atur preferensi bahasa untuk antarmuka aplikasi dan pesan notifikasi</p>
            <hr class="set-line">

            <div class="lang-label">
                <span class="set-icon">
                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9" /><path d="M3 12h18M12 3c3 3 3 15 0 18M12 3c-3 3-3 15 0 18" /></svg>
                </span>
                Bahasa Aplikasi
            </div>
            <div class="lang-options">
                @foreach ($bahasa as $kode => $nama)
                    <label class="lang-opt">
                        <input type="radio" name="bahasa_app" value="{{ $kode }}"
                            {{ ($p['bahasa_app'] ?? 'id') === $kode ? 'checked' : '' }}>
                        <span class="lang-name">{{ $nama }} @if ($kode === 'id')<small>(Default)</small>@endif</span>
                        <span class="lang-radio"></span>
                    </label>
                @endforeach
            </div>

            <div class="lang-label">
                <span class="set-icon">{!! $bell !!}</span>
                Bahasa Notifikasi
            </div>
            <div class="lang-options">
                @foreach ($bahasa as $kode => $nama)
                    <label class="lang-opt">
                        <input type="radio" name="bahasa_notif" value="{{ $kode }}"
                            {{ ($p['bahasa_notif'] ?? 'id') === $kode ? 'checked' : '' }}>
                        <span class="lang-name">{{ $nama }} @if ($kode === 'id')<small>(Default)</small>@endif</span>
                        <span class="lang-radio"></span>
                    </label>
                @endforeach
            </div>
        </section>
    </form>

    <script>
        // Simpan otomatis setiap kali ada perubahan
        document.getElementById('form-pengaturan').addEventListener('change', function () {
            this.submit();
        });
    </script>
@endsection