<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - JahitSantai</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        navy: {
                            DEFAULT: '#1F2A44',
                            dark: '#141B2E',
                        }
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F8F9FF;
        }
    </style>
</head>

<body class="text-slate-800">

    <div class="flex min-h-screen">

        {{-- ===================== SIDEBAR ===================== --}}
        <aside class="w-64 bg-white border-r border-black/20 flex flex-col justify-between py-8 px-5">
            <div>
                {{-- Logo --}}
                <a href="{{ url('/beranda') }}" class="flex items-center justify-center gap-2 mb-10 px-1">
                    <img src="{{ asset('images/logoweb.svg') }}" alt="JahitSantai" class="h-11 w-auto">
                </a>

                {{-- Menu --}}
                <nav class="space-y-1">
                    <a href="{{ url('/profil') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-lg bg-navy text-white font-semibold">
                        <img src="{{ asset('images/user.svg') }}" alt="Profil" class="h-5 w-5">
                        Profil
                    </a>

                    <a href="{{ url('/pesan-saya') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-600 font-medium hover:bg-slate-50 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-6l-4 4v-4z" />
                        </svg>
                        Pesan
                    </a>

                    <a href="{{ url('/pengaturan') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-600 font-medium hover:bg-slate-50 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Pengaturan
                    </a>
                </nav>
            </div>

            {{-- Keluar --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-red-600 font-semibold hover:bg-red-50 transition w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Keluar
                </button>
            </form>
        </aside>

        {{-- ===================== MAIN CONTENT ===================== --}}
        <main class="flex-1 px-10 py-10">

            {{-- Header --}}
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-slate-900">Profil Saya</h1>
                <p class="text-slate-500 mt-1">Kelola informasi akun dan pengaturan Anda</p>
            </div>

            {{-- Tabs --}}
            <div class="flex items-center gap-8 border-b border-black/20 mb-6">
                <a href="#" class="pb-3 text-slate-900 font-semibold border-b-2 border-slate-900">Informasi akun</a>
                <a href="#" class="pb-3 text-slate-500 hover:text-slate-900 transition">Ukuran saya</a>
                <a href="#" class="pb-3 text-slate-500 hover:text-slate-900 transition">Riwayat pemesanan</a>
                <a href="#" class="pb-3 text-slate-500 hover:text-slate-900 transition">Riwayat ulasan</a>
            </div>

            {{-- Card: Info user singkat --}}
            <div class="bg-white rounded-xl border border-black/20 p-6 flex items-center justify-between mb-6">
                <div class="flex items-center gap-4">

                    {{-- Foto + upload --}}
                    <form id="form-foto" method="POST" action="{{ route('profil.foto.update') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <label for="foto-upload" class="relative block cursor-pointer group w-16 h-16">
                            <img id="preview-foto"
                                src="{{ auth()->user()->foto ? asset('pfp/' . auth()->user()->foto) : asset('images/default-avatar.png') }}"
                                alt="{{ auth()->user()->name }}"
                                class="w-16 h-16 rounded-full object-cover border border-slate-200">
                            <div
                                class="absolute inset-0 rounded-full bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                        </label>

                        <input id="foto-upload" type="file" name="foto" accept="image/*" class="hidden">
                    </form>

                    <script>
                        document.getElementById('foto-upload').addEventListener('change', function (e) {
                            const file = e.target.files[0];
                            if (file) {
                                document.getElementById('preview-foto').src = URL.createObjectURL(file);
                                document.getElementById('form-foto').submit();
                            }
                        });
                    </script>

                    <div>
                        <h3 class="text-lg font-bold text-slate-900">{{ auth()->user()->name }}</h3>
                        <p class="text-slate-500 text-sm">{{ auth()->user()->email }}</p>
                        <p class="text-slate-400 text-sm mt-1">Bergabung sejak
                            {{ auth()->user()->created_at->translatedFormat('F Y') }}
                        </p>
                    </div>
                </div>
                <button type="button"
                    class="px-4 py-2 rounded-lg border border-slate-200 text-slate-700 font-medium text-sm hover:bg-slate-50 transition">
                    Edit profil
                </button>
            </div>

            {{-- Form Data Pribadi --}}
            <form method="POST" action="{{ route('profil.update') }}">
                @csrf
                @method('PUT')

                <div class="bg-white rounded-xl border border-black/20 p-6 mb-6">
                    <h3 class="text-lg font-bold text-slate-900 mb-5">Data Pribadi</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                                class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-navy/20 focus:border-navy transition">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">Email</label>
                            <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                                class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-navy/20 focus:border-navy transition">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">No. WhatsApp</label>
                            <input type="text" name="no_hp" value="{{ old('no_hp', auth()->user()->no_hp) }}"
                                class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-navy/20 focus:border-navy transition">
                        </div>
                    </div>
                </div>

                {{-- Alamat Tersimpan --}}
                <div class="bg-white rounded-xl border border-black/20 p-6 mb-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-700" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <h3 class="text-lg font-bold text-slate-900">Alamat Tersimpan</h3>
                        </div>
                        <button type="button"
                            class="flex items-center gap-1 text-sm font-medium text-slate-700 hover:text-navy transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            Tambah
                        </button>
                    </div>

                    @forelse (auth()->user()->addresses ?? [] as $address)
                        <div class="border border-black/20 rounded-lg p-4 {{ !$loop->last ? 'mb-3' : '' }}">
                            <p class="font-semibold text-slate-900">{{ $address->label }}</p>
                            <p class="text-sm text-slate-500 mt-1">{{ $address->full_address }}</p>
                        </div>
                    @empty
                        <div class="border border-slate-200 rounded-lg p-4">
                            <p class="font-semibold text-slate-900">Rumah</p>
                            <p class="text-sm text-slate-500 mt-1">
                                Apartemen Skyline Residence, Tower A, Lt. 12, Unit 1204, Jl. Cendrawasih No. 10, Kota
                                Malang, Jawa Timur 60251
                            </p>
                        </div>
                    @endforelse
                </div>

                {{-- Tombol Simpan --}}
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-6 py-3 rounded-lg bg-navy text-white font-semibold hover:bg-navy-dark transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>

        </main>
    </div>

</body>

</html>