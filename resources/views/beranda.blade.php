<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JahitSantai</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
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
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}">
</head>

<body class="bg-white text-slate-800">

    {{-- ===================== NAVBAR ===================== --}}
<header class="bg-white sticky top-0 z-50 border-b border-slate-100">
    <nav class="max-w-screen-2xl mx-auto px-6 md:px-10 h-20 flex items-center justify-between">
        <a href="{{ url('/beranda') }}" class="flex items-center gap-2 text-2xl font-bold text-slate-900">
            <img src="{{ asset('images/logoweb.svg') }}" alt="JahitSantai" class="h-13 w-13">
        </a>

        <ul class="hidden md:flex items-center gap-10 text-slate-700 font-medium">
            <li><a href="{{ url('/beranda') }}"
                    class="text-slate-900 border-b-2 border-slate-900 pb-1">{{ __('nav.home') }}</a></li>
            <li><a href="{{ url('/layanan') }}" class="hover:text-slate-900">{{ __('nav.services') }}</a></li>
            <li><a href="{{ url('/tentangkami') }}" class="hover:text-slate-900">{{ __('nav.about') }}</a></li>
        </ul>

        <div class="flex items-center gap-2">

            {{-- ============ DROPDOWN BAHASA (ID / EN) ============ --}}
            <div x-data="{ open: false }" @keydown.escape.window="open = false" class="relative">
                <button @click="open = !open" type="button" aria-label="Pilih bahasa" :aria-expanded="open"
                    class="flex items-center justify-center h-10 w-10 rounded-full text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="9" />
                        <path d="M3 12h18M12 3c2.5 2.6 3.8 5.6 3.8 9s-1.3 6.4-3.8 9c-2.5-2.6-3.8-5.6-3.8-9S9.5 5.6 12 3z" />
                    </svg>
                </button>

                <div x-show="open" @click.away="open = false" x-cloak
                    x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    class="absolute right-0 mt-2 w-44 bg-white rounded-lg shadow-lg border border-slate-100 py-1 z-50">
                    @foreach (['id' => 'Indonesia', 'en' => 'English'] as $kode => $nama)
                        <a href="{{ route('lang.switch', $kode) }}"
                            class="flex items-center justify-between px-4 py-2 text-sm hover:bg-slate-50 {{ app()->getLocale() === $kode ? 'text-slate-900 font-semibold' : 'text-slate-600' }}">
                            <span>{{ $nama }}</span>
                            @if (app()->getLocale() === $kode)
                                <svg class="h-4 w-4 text-navy" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12l5 5 9-10" />
                                </svg>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>

            @auth
                {{-- ============ MENU NOTIFIKASI ============ --}}
                @php
                    $notifikasi = [
                        ['judul' => 'Pesanan diterima', 'isi' => 'Pesanan Kustom Kebaya kamu sudah kami terima.', 'waktu' => '5 menit lalu', 'dibaca' => false],
                        ['judul' => 'Penjahit ditugaskan', 'isi' => 'Pesananmu mulai dikerjakan oleh penjahit.', 'waktu' => '2 jam lalu', 'dibaca' => false],
                        ['judul' => 'Pesan baru', 'isi' => 'Admin membalas pesanmu.', 'waktu' => 'Kemarin', 'dibaca' => true],
                    ];
                    $belumDibaca = collect($notifikasi)->where('dibaca', false)->count();
                @endphp

                <div x-data="{ open: false }" @keydown.escape.window="open = false" class="relative">
                    <button @click="open = !open" type="button" aria-label="Notifikasi" :aria-expanded="open"
                        class="relative flex items-center justify-center h-10 w-10 rounded-full text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9M10.3 21a1.9 1.9 0 0 0 3.4 0" />
                        </svg>
                        @if ($belumDibaca > 0)
                            <span
                                class="absolute top-1.5 right-1.5 min-w-4 h-4 px-1 rounded-full bg-red-500 text-white text-[10px] font-semibold flex items-center justify-center">
                                {{ $belumDibaca }}
                            </span>
                        @endif
                    </button>

                    <div x-show="open" @click.away="open = false" x-cloak
                        x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        class="absolute right-0 mt-2 w-80 max-w-[calc(100vw-2rem)] bg-white rounded-lg shadow-lg border border-slate-100 z-50 overflow-hidden">
                        <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                            <p class="text-sm font-semibold text-slate-900">Notifikasi</p>
                            @if ($belumDibaca > 0)
                                <span class="text-xs text-indigo-600">{{ $belumDibaca }} belum dibaca</span>
                            @endif
                        </div>

                        <div class="max-h-80 overflow-y-auto divide-y divide-slate-100">
                            @forelse ($notifikasi as $n)
                                <a href="#" class="flex gap-3 px-4 py-3 hover:bg-slate-50 {{ $n['dibaca'] ? '' : 'bg-indigo-50/50' }}">
                                    <span
                                        class="mt-1.5 h-2 w-2 rounded-full shrink-0 {{ $n['dibaca'] ? 'bg-transparent' : 'bg-indigo-500' }}"></span>
                                    <div class="min-w-0">
                                        <p class="text-sm font-medium text-slate-900">{{ $n['judul'] }}</p>
                                        <p class="text-xs text-slate-500 mt-0.5 leading-relaxed">{{ $n['isi'] }}</p>
                                        <p class="text-[11px] text-slate-400 mt-1">{{ $n['waktu'] }}</p>
                                    </div>
                                </a>
                            @empty
                                <p class="px-4 py-8 text-center text-sm text-slate-500">Belum ada notifikasi.</p>
                            @endforelse
                        </div>

                        <a href="#"
                            class="block text-center px-4 py-2.5 text-sm font-medium text-navy border-t border-slate-100 hover:bg-slate-50">
                            Lihat semua notifikasi
                        </a>
                    </div>
                </div>

                {{-- ============ DROPDOWN AKUN (tidak diubah) ============ --}}
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" type="button"
                        class="flex items-center justify-center h-10 w-10 rounded-full overflow-hidden bg-navy text-white font-semibold text-sm">
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
                        <a href="{{ route('profil.show') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">
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
                <a href="{{ url('/login') }}" class="ml-1 px-5 py-2.5 rounded-md text-white font-semibold transition"
                    style="background-color: #1F2A44;">
                    {{ __('nav.login') }}
                </a>
            @endauth
        </div>
    </nav>
</header>

    {{-- HERO --}}
    <section class="hero-bg" style="--hero-img: url('{{ asset('images/jahit.jpeg') }}');">
        <div class="max-w-screen-2xl mx-auto px-6 md:px-10 py-28 md:py-36">
            <div class="max-w-2xl">
                <h1 class="text-5xl md:[font-size: 50px] font-bold text-white leading-tight">
                    {{ __('beranda.hero_title') }}
                </h1>
                <p class="mt-6 text-lg text-slate-200 max-w-xl">
                    {{ __('beranda.hero_desc') }}
                </p>
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="{{ url('/layanan') }}"
                        class="px-6 py-3.5 border border-white/70 text-white font-semibold hover:bg-white/10 transition">
                        {{ __('beranda.hero_btn_explore') }}
                    </a>
                    <a href="{{ url('/pesanan') }}"
                        class="px-6 py-3.5 bg-navy text-white font-semibold hover:bg-navy-dark transition">
                        {{ __('beranda.hero_btn_order') }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- LAYANAN UNGGULAN --}}
    <section class="py-20">
        <div class="max-w-screen-2xl mx-auto px-6 md:px-10">
            <div class="text-center max-w-2xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900">{{ __('beranda.services_title') }}
                </h2>
                <p class="mt-4 text-slate-500">{{ __('beranda.services_subtitle') }}</p>
            </div>

            <div class="mt-14 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $layanan = [
                        ['nama' => __('beranda.service_permak'), 'gambar' => 'images/gambaratas.png'],
                        ['nama' => __('beranda.service_jahit_baru'), 'gambar' => 'images/gambaratas.png'],
                        ['nama' => __('beranda.service_custom_desain'), 'gambar' => 'images/gambaratas.png'],
                        ['nama' => __('beranda.service_custom_desain'), 'gambar' => 'images/gambaratas.png'],
                    ];
                @endphp

                @foreach ($layanan as $item)
                    <div class="card-img rounded-xl h-80 flex flex-col justify-end p-6 overflow-hidden"
                        style="--card-img: url('{{ asset($item['gambar']) }}');">
                        <h3 class="text-white text-xl font-semibold">{{ $item['nama'] }}</h3>
                        <p class="text-slate-200 text-sm mt-2 leading-relaxed">{{ __('beranda.service_desc') }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- TESTIMONI --}}
    <section class="py-20">
        <div class="max-w-screen-2xl mx-auto px-6 md:px-10">
            <div class="text-center max-w-2xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900">{{ __('beranda.testimoni_title') }}
                </h2>
                <p class="mt-4 text-slate-500">{{ __('beranda.testimoni_subtitle') }}</p>
            </div>

            <div class="mt-14 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    // 'foto' bisa null/kosong kalau user belum upload foto profil,
                    // maka avatar otomatis fallback jadi lingkaran berisi inisial nama.
                    $testimoni = [
                        ['nama' => 'Ghea A.', 'foto' => 'images/profilghea.jpg'],
                        ['nama' => 'Rizky P.', 'foto' => null],
                        ['nama' => 'Dinda S.', 'foto' => null],
                        ['nama' => 'Bagas W.', 'foto' => null],
                    ];
                @endphp

                @foreach ($testimoni as $t)
                    <div class="bg-white rounded-xl p-6 border border-slate-100">
                        <div class="flex items-center gap-3">
                            @if (!empty($t['foto']))
                                <img src="{{ asset($t['foto']) }}" alt="{{ $t['nama'] }}"
                                    class="w-10 h-10 rounded-full object-cover">
                            @else
                                <div
                                    class="w-10 h-10 rounded-full bg-navy text-white flex items-center justify-center font-semibold text-sm shrink-0">
                                    {{ strtoupper(substr($t['nama'], 0, 1)) }}
                                </div>
                            @endif
                            <div>
                                <p class="font-semibold text-slate-900">{{ $t['nama'] }}</p>
                            </div>
                            <span
                                class="ml-auto text-xs bg-indigo-100 text-indigo-600 px-2.5 py-1 rounded-full">{{ __('beranda.testimoni_tag') }}</span>
                        </div>
                        <div class="text-amber-400 mt-3 text-sm">★★★★★</div>
                        <p class="mt-3 text-sm text-slate-600 leading-relaxed">
                            {{ __('beranda.testimoni_text') }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="px-6 md:px-10 py-20">
        <div class="max-w-screen-2xl mx-auto rounded-2xl overflow-hidden cta-bg"
            style="--cta-img: url('{{ asset('images/gambaratas.png') }}');">
            <div class="px-6 md:px-10 py-24 text-center">
                <h2 class="text-3xl md:text-5xl font-bold text-white">{{ __('beranda.cta_title') }}</h2>
                <p class="mt-4 text-slate-200 text-lg">{{ __('beranda.cta_desc') }}</p>
                <a href="{{ url('/chat') }}"
                    class="inline-block mt-8 px-7 py-3.5 rounded-md border border-white text-white font-semibold hover:bg-white hover:text-slate-900 transition">
                    {{ __('beranda.cta_btn') }}
                </a>
            </div>
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="bg-slate-900 text-slate-300">
        <div class="max-w-screen-2xl mx-auto px-6 md:px-10 py-16 grid grid-cols-1 md:grid-cols-4 gap-10">
            <div>
                <img src="{{ asset('images/logofooter.svg') }}" alt="JahitSantai" class="h-12 w-auto">
                <p class="mt-4 text-sm leading-relaxed text-slate-400">{{ __('beranda.footer_desc') }}</p>
            </div>

            <div>
                <h4 class="text-white font-semibold tracking-wide">{{ __('beranda.footer_services_title') }}
                </h4>
                <ul class="mt-4 space-y-3 text-sm text-slate-400">
                    <li><a href="#" class="hover:text-white">{{ __('beranda.footer_service_permak') }}</a></li>
                    <li><a href="#" class="hover:text-white">{{ __('beranda.footer_service_jahit') }}</a></li>
                    <li><a href="#" class="hover:text-white">{{ __('beranda.footer_service_custom') }}</a></li>
                    <li><a href="#" class="hover:text-white">{{ __('beranda.footer_service_ukur') }}</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-semibold tracking-wide">{{ __('beranda.footer_help_title') }}</h4>
                <ul class="mt-4 space-y-3 text-sm text-slate-400">
                    <li><a href="#" class="hover:text-white">{{ __('beranda.footer_help_faq') }}</a></li>
                    <li><a href="#" class="hover:text-white">{{ __('beranda.footer_help_ukur') }}</a></li>
                    <li><a href="#" class="hover:text-white">{{ __('beranda.footer_help_privasi') }}</a></li>
                    <li><a href="#" class="hover:text-white">{{ __('beranda.footer_help_syarat') }}</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-semibold tracking-wide">{{ __('beranda.footer_contact_title') }}</h4>
                <ul class="mt-4 space-y-3 text-sm text-slate-400">
                    <li>halo@jahitsantai.com</li>
                    <li>+62 812 3456 7890</li>
                    <li>Malang, Indonesia</li>
                </ul>
            </div>
        </div>

        <div class="border-t border-slate-800 py-6 text-center text-sm text-slate-500">
            © {{ date('Y') }} {{ __('beranda.footer_copyright') }}
        </div>
    </footer>

</body>

</html>