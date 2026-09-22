<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JahitSantai</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Montserrat:wght@600;700;800&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
</head>

<body class="bg-[#F5F8FF] text-slate-800">

    {{-- ================= NAVBAR ================= --}}
    <header class="bg-white sticky top-0 z-50 border-b border-slate-100">
        <nav class="max-w-screen-2xl mx-auto px-6 md:px-10 h-20 flex items-center justify-between">
            <a href="{{ url('/beranda') }}"
                class="flex items-center gap-2 text-2xl font-bold text-slate-900 font-brand">
                <img src="{{ asset('images/logoweb.svg') }}" alt="JahitSantai" class="h-13 w-13">
            </a>

            <ul class="hidden md:flex items-center gap-10 text-slate-700 font-medium">
                <li><a href="{{ url('/berandablmlogin') }}" class="hover:text-slate-900">{{ __('nav.home') }}</a></li>
                <li><a href="{{ url('/layananblmlogin') }}"
                        class="text-slate-900 border-b-2 border-slate-900 pb-1">{{ __('nav.services') }}</a></li>
                <li><a href="{{ url('/tentangblmlogin') }}" class="hover:text-slate-900">{{ __('nav.about') }}</a></li>
            </ul>

            <div class="flex items-center gap-3">
                <div class="flex items-center text-sm font-medium text-slate-500">
                    <a href="{{ route('lang.switch', 'id') }}"
                        class="{{ app()->getLocale() === 'id' ? 'text-slate-900 font-semibold' : '' }}">ID</a>
                    <span class="mx-1 text-slate-300">/</span>
                    <a href="{{ route('lang.switch', 'en') }}"
                        class="{{ app()->getLocale() === 'en' ? 'text-slate-900 font-semibold' : '' }}">EN</a>
                </div>

                @auth
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" type="button"
                            class="flex items-center justify-center h-10 w-10 rounded-full overflow-hidden bg-[#1F2A44] text-white font-semibold text-sm">
                            @if (!empty(auth()->user()->foto))
                                <img src="{{ asset(auth()->user()->foto) }}" alt="{{ auth()->user()->name }}"
                                    class="h-full w-full object-cover">
                            @else
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            @endif
                        </button>

                        <div x-show="open" @click.away="open = false" x-cloak
                            x-transition:enter="transition ease-out duration-150"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-slate-100 py-2 z-50">
                            <div class="px-4 py-2 border-b border-slate-100">
                                <p class="text-sm font-semibold text-slate-900">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-slate-500">{{ auth()->user()->email }}</p>
                            </div>
                            <a href="{{ url('/profil') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">
                                Profil Saya
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-slate-50">
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    {{-- Kalau belum login, tampilkan tombol Masuk --}}
                    <a href="{{ url('/login') }}" class="px-5 py-2.5 rounded-md text-white font-semibold transition"
                        style="background-color: #1F2A44;">
                        {{ __('nav.login') }}
                    </a>
                @endauth
            </div>
        </nav>
    </header>

    {{-- ================= KONTEN ================= --}}
    <main class="max-w-screen-2xl mx-auto px-6 md:px-10 py-10">

        {{-- Breadcrumb + Hero + Ringkasan Pesanan --}}
        <div class="grid grid-cols-1 lg:grid-cols-[1fr_420px] gap-8 items-start">

            {{-- Gambar Layanan --}}
            <div class="relative rounded-2xl overflow-hidden shadow-sm">
                <img src="{{ asset('images/permak-rok.jpg') }}" alt="{{ $layanan->nama ?? 'Permak rok' }}"
                    class="w-full h-[520px] object-cover">

                <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent p-6">
                    <span
                        class="inline-block bg-white/90 text-slate-900 text-xs font-semibold px-3 py-1 rounded-full mb-3">
                        {{ $layanan->kategori ?? 'Permak' }}
                    </span>
                    <h1 class="text-white text-3xl font-bold font-brand">{{ $layanan->nama ?? 'Permak rok' }}</h1>
                    <div class="flex items-center gap-2 mt-1 text-white/90 text-sm">
                        <div class="flex text-yellow-400">
                            {{-- Ganti dengan komponen/icon rating aset kamu --}}
                            ★★★★★
                        </div>
                        <span>{{ $layanan->rating ?? '4.5' }} ({{ $layanan->jumlah_ulasan ?? '120' }} ulasan)</span>
                    </div>
                </div>
            </div>

            {{-- Card Ringkasan Pesanan --}}
            <aside>
                <p class="text-sm text-slate-500 mb-3">
                    <a href="{{ url('/layanan') }}" class="hover:underline">Layanan</a> /
                    <span class="text-slate-900 font-medium">{{ $layanan->nama ?? 'Permak rok' }}</span>
                </p>

                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-7">
                    <h2 class="text-xl font-bold text-slate-900 font-brand mb-5">Ringkasan Pesanan</h2>

                    <ul class="space-y-4 mb-6">
                        <li class="flex items-center gap-3 text-slate-700 text-sm">
                            {{-- icon: ganti dengan aset kamu --}}
                            <svg class="w-5 h-5 text-slate-500 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="9" stroke-width="1.5" />
                                <path stroke-width="1.5" stroke-linecap="round" d="M12 7v5l3 2" />
                            </svg>
                            Estimasi: {{ $layanan->estimasi ?? '2-3 hari kerja' }}
                        </li>
                        <li class="flex items-center gap-3 text-slate-700 text-sm">
                            <svg class="w-5 h-5 text-slate-500 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-width="1.5" stroke-linejoin="round"
                                    d="M12 3l7 3v5c0 4.5-3 8-7 10-4-2-7-5.5-7-10V6l7-3z" />
                            </svg>
                            Garansi: {{ $layanan->garansi ?? '3 hari' }}
                        </li>
                        <li class="flex items-center gap-3 text-slate-700 text-sm">
                            <svg class="w-5 h-5 text-slate-500 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-width="1.5" stroke-linejoin="round" d="M3 7h11v8H3zM14 10h4l3 3v2h-7z" />
                                <circle cx="7" cy="17" r="1.5" stroke-width="1.5" />
                                <circle cx="17" cy="17" r="1.5" stroke-width="1.5" />
                            </svg>
                            Layanan antar jemput tersedia
                        </li>
                    </ul>

                    <div class="flex items-center justify-between mb-5">
                        <span class="font-semibold text-slate-900">Harga Mulai</span>
                        <span class="text-xl font-bold text-slate-900 font-brand">
                            Rp {{ number_format($layanan->harga ?? 25000, 0, ',', '.') }}
                        </span>
                    </div>

                    <a href="{{ route('pesanan.create', ['layanan' => $layanan->id ?? null]) }}"
                        class="block text-center w-full py-3 rounded text-white font-semibold transition hover:opacity-90"
                        style="background-color: #1F2A44;">
                        Pesan Layanan
                    </a>
                </div>
            </aside>
        </div>

        {{-- Tentang Layanan --}}
        <section class="bg-white rounded-2xl border border-slate-100 shadow-sm p-8 mt-10">
            <h2 class="text-xl font-bold text-slate-900 font-brand mb-4">Tentang Layanan</h2>
            <p class="text-slate-600 leading-relaxed">
                {{ $layanan->deskripsi ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.' }}
            </p>
        </section>

        {{-- Cara Kerja --}}
        <section class="mt-14">
            <h2 class="text-2xl font-bold text-slate-900 font-brand text-center mb-8">Cara Kerja</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5">
                @php
                    $langkah = [
                        ['no' => 1, 'judul' => 'Konsultasi', 'teks' => 'Diskusikan kebutuhan dan detail layanan Anda via chat.'],
                        ['no' => 2, 'judul' => 'Pemesanan', 'teks' => 'Konfirmasi pesanan dan atur jadwal sesuai keinginan Anda.'],
                        ['no' => 3, 'judul' => 'Penjemputan', 'teks' => 'Kurir mengambil barang Anda, atau Anda bisa membawanya langsung.'],
                        ['no' => 4, 'judul' => 'Pengerjaan', 'teks' => 'Proses ditangani langsung oleh penjahit (2-3 hari kerja).'],
                        ['no' => 5, 'judul' => 'Pengiriman', 'teks' => 'Barang dikirim kembali ke lokasi Anda atau siap diambil di tempat.'],
                    ];
                @endphp

                @foreach ($langkah as $item)
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 text-center">
                        <div class="w-9 h-9 mx-auto mb-4 rounded-full flex items-center justify-center text-white font-semibold"
                            style="background-color: #1F2A44;">
                            {{ $item['no'] }}
                        </div>
                        <h3 class="font-semibold text-slate-900 mb-2">{{ $item['judul'] }}</h3>
                        <p class="text-sm text-slate-500 leading-relaxed">{{ $item['teks'] }}</p>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- Ulasan Pelanggan --}}
        <section class="mt-14 max-w-3xl mx-auto">
            <h2 class="text-2xl font-bold text-slate-900 font-brand text-center mb-8">Ulasan Pelanggan</h2>

            <div class="space-y-5">
                @foreach ($ulasan ?? array_fill(0, 3, [
                        'nama' => 'Ghea A.',
                        'foto' => null,
                        'tag' => 'Permak Rok',
                        'rating' => 5,
                        'komentar' => 'Permak roknya rapi banget, pas banget sama badanku, prosesnya juga cepet.',
                    ]) as $item)
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
                        <div class="flex items-start justify-between mb-2">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-slate-200 overflow-hidden flex-shrink-0">
                                    {{-- Ganti dengan foto profil pengguna --}}
                                    @if(!empty($item['foto']))
                                        <img src="{{ asset($item['foto']) }}" class="w-full h-full object-cover">
                                    @endif
                                </div>
                                <span class="font-semibold text-slate-900">{{ $item['nama'] }}</span>
                            </div>
                            <span class="text-xs font-medium text-[#1F2A44] bg-[#EEF2FB] px-3 py-1 rounded-full">
                                {{ $item['tag'] }}
                            </span>
                        </div>
                        <div class="text-yellow-400 mb-2">
                            {{ str_repeat('★', $item['rating']) }}
                        </div>
                        <p class="text-sm text-slate-600">{{ $item['komentar'] }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    </main>

    {{-- ================= FOOTER ================= --}}
    <footer class="text-slate-300" style="background-color: #1F2A44;">
        <div class="max-w-7xl mx-auto px-6 md:px-10 py-14 grid grid-cols-1 md:grid-cols-4 gap-10">
            <div>
                <a href="{{ url('/beranda') }}"
                    class="flex items-center gap-2 text-xl font-bold text-white font-brand mb-4">
                    <img src="{{ asset('images/logofooter.svg') }}" alt="JahitSantai" class="h-10 w-10">
                    JahitSantai
                </a>
                <p class="text-sm leading-relaxed text-slate-400">
                    Solusi jahit dan permak modern yang menghargai waktu dan kualitas Anda. Kami hadir membawa
                    kemudahan tailoring ke depan pintu rumah Anda.
                </p>
            </div>

            <div>
                <h4 class="text-white font-semibold text-sm tracking-wide mb-4">LAYANAN KAMI</h4>
                <ul class="space-y-2 text-sm text-slate-400">
                    <li><a href="#" class="hover:text-white">Permak Pakaian</a></li>
                    <li><a href="#" class="hover:text-white">Jahit Baru</a></li>
                    <li><a href="#" class="hover:text-white">Custom Desain</a></li>
                    <li><a href="#" class="hover:text-white">Ukur di Rumah</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-semibold text-sm tracking-wide mb-4">BANTUAN</h4>
                <ul class="space-y-2 text-sm text-slate-400">
                    <li><a href="#" class="hover:text-white">FAQ</a></li>
                    <li><a href="#" class="hover:text-white">Cara Mengukur</a></li>
                    <li><a href="#" class="hover:text-white">Kebijakan Privasi</a></li>
                    <li><a href="#" class="hover:text-white">Syarat & Ketentuan</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-semibold text-sm tracking-wide mb-4">HUBUNGI KAMI</h4>
                <ul class="space-y-3 text-sm text-slate-400">
                    <li class="flex items-center gap-2">
                        {{-- icon: ganti dengan aset kamu --}}
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="1.5" d="M3 6h18v12H3z" />
                            <path stroke-width="1.5" d="M3 7l9 6 9-6" />
                        </svg>
                        halo@jahitsantai.com
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="1.5" d="M4 5c0 8 7 15 15 15l3-4-6-3-2 2c-2-1-4-3-5-5l2-2-3-6z" />
                        </svg>
                        +62 812 3456 7890
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="1.5" d="M12 21s7-6.5 7-11a7 7 0 10-14 0c0 4.5 7 11 7 11z" />
                            <circle cx="12" cy="10" r="2.3" stroke-width="1.5" />
                        </svg>
                        Malang, Indonesia
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-white/10 py-5 text-center text-xs text-slate-400">
            &copy; {{ date('Y') }} JahitSantai. Solusi Jahit & Permak Modern.
        </div>
    </footer>

</body>

</html>