<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan - JahitSantai</title>
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

    {{-- ===================== NAVBAR ===================== --}}
    <header class="bg-white sticky top-0 z-50 border-b border-black/10">
        <nav class="max-w-7xl mx-auto px-6 md:px-10 h-20 grid grid-cols-3 items-center">
            <a href="{{ url('/') }}" class="flex items-center gap-2 text-2xl font-bold text-slate-900 justify-self-start">
                <img src="{{ asset('images/logoweb.svg') }}" alt="JahitSantai" class="h-11 w-auto">
            </a>

            <ul class="hidden md:flex items-center gap-10 text-slate-700 font-medium justify-self-center">
                <li><a href="{{ url('/berandablmlogin') }}" class="hover:text-slate-900">{{ __('nav.home') }}</a></li>
                <li><a href="{{ url('/katalogblmlogin') }}" class="text-slate-900 border-b-2 border-slate-900 pb-1">{{ __('nav.services') }}</a></li>
                <li><a href="{{ url('/tentang-kami') }}" class="hover:text-slate-900">{{ __('nav.about') }}</a></li>
            </ul>

            <div class="flex items-center gap-3 justify-self-end">
                <div class="flex items-center text-sm font-medium text-slate-500">
                    <a href="{{ route('lang.switch', 'id') }}"
                        class="{{ app()->getLocale() === 'id' ? 'text-slate-900 font-semibold' : '' }}">ID</a>
                    <span class="mx-1 text-slate-300">/</span>
                    <a href="{{ route('lang.switch', 'en') }}"
                        class="{{ app()->getLocale() === 'en' ? 'text-slate-900 font-semibold' : '' }}">EN</a>
                </div>

                <a href="{{ url('/login') }}" class="px-5 py-2.5 rounded-md text-white font-semibold transition"
                    style="background-color: #1F2A44;">
                    {{ __('nav.login') }}
                </a>
            </div>
        </nav>
    </header>

    {{-- ===================== HERO / JUDUL ===================== --}}
    <section class="py-16 text-center">
        <div class="max-w-2xl mx-auto px-6">
            <h1 class="text-4xl md:text-5xl font-bold text-[#1F2A44]">Eksplor Layanan Jahit</h1>
            <p class="mt-4 text-slate-500">
                Temukan layanan jahit, permak, dan busana custom sesuai kebutuhan Anda.
            </p>

            {{-- Search bar --}}
            <form method="GET" action="{{ url('/layanan') }}" class="mt-8">
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-4 top-1/2 -translate-y-1/2 h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
                    </svg>
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari layanan"
                        class="w-full pl-12 pr-4 py-3.5 rounded-lg border border-slate-200 bg-white focus:outline-none focus:ring-2 focus:ring-navy/20 focus:border-navy transition">
                </div>
            </form>

            {{-- Filter pills --}}
            <div class="mt-6 flex flex-wrap items-center justify-center gap-2">
                @php
                    $kategori = ['Semua', 'Permak', 'Jahit Baru', 'Custom Desain', 'Aksesoris'];
                    $aktif = request('kategori', 'Semua');
                @endphp

                @foreach ($kategori as $item)
                    <a href="{{ url('/layanan') }}?kategori={{ urlencode($item) }}"
                        class="px-5 py-2 rounded-full text-sm font-medium border transition
                            {{ $aktif === $item
                                ? 'bg-navy text-white border-navy'
                                : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-50' }}">
                        {{ $item }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===================== GRID LAYANAN ===================== --}}
    <section class="pb-20">
        <div class="max-w-7xl mx-auto px-6 md:px-10">

            @php
                $items = [
                    [
                        'nama' => 'Permak Rok',
                        'kategori' => 'Permak',
                        'deskripsi' => 'Kecilkan pinggang, pendekkan panjang, atau rapikan kelim rok sesuai bentuk badan dan...',
                        'harga' => 'Rp 20.000',
                        'gambar' => 'images/gambaratas.png',
                    ],
                    [
                        'nama' => 'Jahit Kemeja',
                        'kategori' => 'Jahit Baru',
                        'deskripsi' => 'Buat kemeja custom dengan bahan pilihan Anda. Pilih ukuran, warna, dan detail...',
                        'harga' => 'Rp 100.000',
                        'gambar' => 'images/gambaratas.png',
                    ],
                    [
                        'nama' => 'Custom Kebaya',
                        'kategori' => 'Custom Desain',
                        'deskripsi' => 'Buat kemeja custom dengan bahan pilihan Anda. Pilih ukuran, warna, dan detail...',
                        'harga' => 'Rp 170.000',
                        'gambar' => 'images/gambaratas.png',
                    ],
                    [
                        'nama' => 'Custom Dress',
                        'kategori' => 'Custom Desain',
                        'deskripsi' => 'Desain dress impian Anda dan biarkan kami mewujudkannya dengan jahitan presisi...',
                        'harga' => 'Rp 300.000',
                        'gambar' => 'images/gambaratas.png',
                    ],
                ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($items as $item)
                    {{-- Card: gambar diberi padding & rounded sendiri, tidak memenuhi lebar card --}}
                    <div class="bg-white rounded-2xl border border-black/10 shadow-sm p-3 flex flex-col">
                        <img src="{{ asset($item['gambar']) }}" alt="{{ $item['nama'] }}"
                            class="w-full h-48 object-cover rounded-xl">

                        <div class="pt-5 px-2 pb-2 flex flex-col flex-1">
                            <div class="flex items-start justify-between gap-2">
                                <h3 class="text-lg font-bold text-slate-900">{{ $item['nama'] }}</h3>
                                <span class="shrink-0 text-xs font-medium bg-indigo-100 text-indigo-600 px-2.5 py-1 rounded-full">
                                    {{ $item['kategori'] }}
                                </span>
                            </div>

                            <p class="mt-2 text-sm text-slate-500 leading-relaxed line-clamp-2">
                                {{ $item['deskripsi'] }}
                            </p>

                            <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between">
                                <div>
                                    <p class="text-xs text-slate-400">Mulai dari</p>
                                    <p class="font-bold text-slate-900">{{ $item['harga'] }}</p>
                                </div>
                                <a href="{{ url('/layanan/' . \Illuminate\Support\Str::slug($item['nama'])) }}"
                                    class="flex items-center gap-1 text-sm font-semibold text-navy hover:underline">
                                    Lihat Detail
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-12 flex items-center justify-center gap-2">
                @for ($i = 1; $i <= 5; $i++)
                    <a href="{{ url('/layanan') }}?page={{ $i }}"
                        class="w-10 h-10 flex items-center justify-center rounded-full text-sm font-medium transition
                            {{ request('page', 1) == $i
                                ? 'bg-navy text-white'
                                : 'bg-white border border-slate-200 text-slate-600 hover:bg-slate-50' }}">
                        {{ $i }}
                    </a>
                @endfor
                <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full border border-slate-200 text-slate-600 hover:bg-slate-50 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

        </div>
    </section>

    {{-- ===================== FOOTER ===================== --}}
    <footer class="bg-slate-900 text-slate-300">
        <div class="max-w-7xl mx-auto px-6 md:px-10 py-16 grid grid-cols-1 md:grid-cols-4 gap-10">
            <div>
                <h3 class="text-white text-xl font-bold">JahitSantai</h3>
                <p class="mt-4 text-sm leading-relaxed text-slate-400">
                    Solusi jahit dan permak modern yang menghargai waktu dan kualitas Anda. Kami hadir membawa kemudahan tailoring ke depan pintu rumah Anda.
                </p>
            </div>

            <div>
                <h4 class="text-white font-semibold tracking-wide">Layanan Kami</h4>
                <ul class="mt-4 space-y-3 text-sm text-slate-400">
                    <li><a href="#" class="hover:text-white">Permak Pakaian</a></li>
                    <li><a href="#" class="hover:text-white">Jahit Baru</a></li>
                    <li><a href="#" class="hover:text-white">Custom Desain</a></li>
                    <li><a href="#" class="hover:text-white">Ukur di Rumah</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-semibold tracking-wide">Bantuan</h4>
                <ul class="mt-4 space-y-3 text-sm text-slate-400">
                    <li><a href="#" class="hover:text-white">FAQ</a></li>
                    <li><a href="#" class="hover:text-white">Cara Mengukur</a></li>
                    <li><a href="#" class="hover:text-white">Kebijakan Privasi</a></li>
                    <li><a href="#" class="hover:text-white">Syarat & Ketentuan</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-semibold tracking-wide">Hubungi Kami</h4>
                <ul class="mt-4 space-y-3 text-sm text-slate-400">
                    <li>halo@jahitsantai.com</li>
                    <li>+62 812 3456 7890</li>
                    <li>Malang, Indonesia</li>
                </ul>
            </div>
        </div>

        <div class="border-t border-slate-800 py-6 text-center text-sm text-slate-500">
            © {{ date('Y') }} JahitSantai. Solusi Jahit & Permak Modern.
        </div>
    </footer>

</body>

</html>