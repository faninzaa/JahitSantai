@extends('components.layouts.app')
@section('title', 'JahitSantai')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/profilus.css') }}">
@endpush

@section('content')
    @include('profil.header', ['active' => 'info'])

    <div class="info-wrap">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        {{-- Card: Info user singkat --}}
        <div class="card info-user">
            <div class="info-user-left">

                {{-- Foto + upload --}}
                <form id="form-foto" method="POST" action="{{ route('profil.foto.update') }}"
                    enctype="multipart/form-data">
                    @csrf

                    <label for="foto-upload" class="avatar-upload">
                        <img id="preview-foto"
                            src="{{ auth()->user()->foto ? asset('storage/' . auth()->user()->foto) : asset('images/default-avatar.png') }}"
                            alt="{{ auth()->user()->name }}">
                        <span class="avatar-overlay">
                            <svg viewBox="0 0 24 24">
                                <path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </span>
                    </label>

                    <input id="foto-upload" type="file" name="foto" accept="image/*" hidden>
                </form>

                <div>
                    <h3 class="info-name">{{ auth()->user()->name }}</h3>
                    <p class="info-email">{{ auth()->user()->email }}</p>
                    <p class="info-since">Bergabung sejak
                        {{ auth()->user()->created_at->translatedFormat('F Y') }}</p>
                </div>
            </div>

            <button type="button" class="btn">Edit profil</button>
        </div>

        {{-- Form --}}
        <form method="POST" action="{{ route('profil.update') }}">
            @csrf
            @method('PUT')

            {{-- Data Pribadi --}}
            <div class="card form-card">
                <h3 class="form-title">Data Pribadi</h3>

                <div class="form-grid">
                    <div class="field">
                        <label for="name">Nama Lengkap</label>
                        <input id="name" type="text" name="name" value="{{ old('name', auth()->user()->name) }}">
                    </div>

                    <div class="field">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email"
                            value="{{ old('email', auth()->user()->email) }}">
                    </div>

                    <div class="field">
                        <label for="no_hp">No. WhatsApp</label>
                        <input id="no_hp" type="text" name="no_hp" value="{{ old('no_hp', auth()->user()->no_hp) }}">
                    </div>
                </div>
            </div>

            {{-- Alamat Tersimpan --}}
            <div class="card form-card">
                <div class="addr-head">
                    <div class="addr-title">
                        <svg viewBox="0 0 24 24">
                            <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <h3 class="form-title">Alamat Tersimpan</h3>
                    </div>
                    <button type="button" class="addr-add">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah
                    </button>
                </div>

                @forelse (auth()->user()->addresses ?? [] as $address)
                    <div class="addr-item">
                        <p class="addr-label">{{ $address->label }}</p>
                        <p class="addr-text">{{ $address->full_address }}</p>
                    </div>
                @empty
                    <div class="addr-item">
                        <p class="addr-label">Rumah</p>
                        <p class="addr-text">
                            Apartemen Skyline Residence, Tower A, Lt. 12, Unit 1204, Jl. Cendrawasih No. 10, Kota
                            Malang, Jawa Timur 60251
                        </p>
                    </div>
                @endforelse
            </div>

            {{-- Tombol Simpan --}}
            <div class="save-row">
                <button type="submit" class="btn btn-fill btn-lg">Simpan Perubahan</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('foto-upload').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                document.getElementById('preview-foto').src = URL.createObjectURL(file);
                document.getElementById('form-foto').submit();
            }
        });
    </script>
@endsection