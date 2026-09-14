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
    <style>
        body {
            font-family: 'Inter', sans-serif, ;
        }

        [x-cloak] {
            display: none !important;
        }

        .hero-bg {
            background-image: linear-gradient(90deg,
                    rgba(31, 42, 68, 0.8) 3%,
                    rgba(31, 42, 68, 0) 59%,
                    rgba(31, 42, 68, 0) 91%),
                url('{{ asset('images/jahit.jpeg') }}');
            background-size: cover;
            background-position: center;
        }

        .cta-bg {
            background-image: linear-gradient(90deg, rgba(15, 23, 42, 0.75) 0%, rgba(15, 23, 42, 0.45) 100%),
                url('{{ asset('images/gambaratas.png') }}');
            background-size: cover;
            background-position: center;
        }

        .card-img {
            background-image: linear-gradient(180deg, rgba(15, 23, 42, 0) 40%, rgba(15, 23, 42, 0.9) 100%),
                url('{{ asset('images/gambarcard.png') }}');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="bg-white text-slate-800">

    {{-- ===================== NAVBAR ===================== --}}
    <header class="bg-white sticky top-0 z-50 border-b border-slate-100">
        <nav class="max-w-7xl mx-auto px-6 md:px-10 h-20 flex items-center justify-between">
            <a href="{{ url('/beranda') }}" class="flex items-center gap-2 text-2xl font-bold text-slate-900">
                <img src="{{ asset('images/logoweb.svg') }}" alt="JahitSantai" class="h-13 w-13">
            </a>

            <ul class="hidden md:flex items-center gap-10 text-slate-700 font-medium">
                <li><a href="{{ url('/beranda') }}"
                        class="text-slate-900 border-b-2 border-slate-900 pb-1">{{ __('nav.home') }}</a></li>
                <li><a href="{{ url('/layanan') }}" class="hover:text-slate-900">{{ __('nav.services') }}</a></li>
                <li><a href="{{ url('/tentang-kami') }}" class="hover:text-slate-900">{{ __('nav.about') }}</a></li>
            </ul>

            <div class="flex items-center gap-3">
                <div class="flex items-center text-sm font-medium text-slate-500">
                    <a href="{{ route('lang.switch', 'id') }}"
                        class="{{ app()->getLocale() === 'id' ? 'text-slate-900 font-semibold' : '' }}">ID</a>
                    <span class="mx-1 text-slate-300">/</span>
                    <a href="{{ route('lang.switch', 'en') }}"
                        class="{{ app()->getLocale() === 'en' ? 'text-slate-900 font-semibold' : '' }}">EN</a>
                </div>

                {{-- Trigger + Dropdown akun --}}
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" type="button"
                        class="flex items-center justify-center h-10 w-10 rounded-full overflow-hidden bg-navy text-white font-semibold text-sm">
                        @if (!empty(auth()->user()->foto_profil))
                            <img src="{{ asset(auth()->user()->foto_profil) }}" alt="{{ auth()->user()->name }}"
                                class="h-full w-full object-cover">
                        @else
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        @endif
                    </button>

                    <div x-show="open" @click.away="open = false" x-cloak
                        x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
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
            </div>
        </nav>
    </header>

    {{-- HERO --}}
    <section class="hero-bg">
        <div class="max-w-7xl mx-auto px-6 md:px-10 py-28 md:py-36">
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
                    <a href="{{ url('/pesan') }}"
                        class="px-6 py-3.5 bg-navy text-white font-semibold hover:bg-navy-dark transition">
                        {{ __('beranda.hero_btn_order') }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- LAYANAN UNGGULAN --}}
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-6 md:px-10">
            <div class="text-center max-w-2xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900">{{ __('beranda.services_title') }}
                </h2>
                <p class="mt-4 text-slate-500">{{ __('beranda.services_subtitle') }}</p>
            </div>

            <div class="mt-14 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $layanan = [
                        ['nama' => __('beranda.service_permak'), 'gambar' => 'images/permak.jpg'],
                        ['nama' => __('beranda.service_jahit_baru'), 'gambar' => 'images/jahit-baru.jpg'],
                        ['nama' => __('beranda.service_custom_desain'), 'gambar' => 'images/custom.jpg'],
                        ['nama' => __('beranda.service_ukur_rumah'), 'gambar' => 'images/ukur.jpg'],
                    ];
                @endphp

                @foreach ($layanan as $item)
                    <div class="rounded-xl h-80 flex flex-col justify-end p-6 overflow-hidden bg-cover bg-center"
                        style="background-color:#1e293b; background-image: linear-gradient(180deg, rgba(15,23,42,0) 40%, rgba(15,23,42,0.9) 100%), url('{{ asset($item['gambar']) }}');">
                        <h3 class="text-white text-xl font-semibold">{{ $item['nama'] }}</h3>
                        <p class="text-slate-200 text-sm mt-2 leading-relaxed">{{ __('beranda.service_desc') }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- TESTIMONI --}}
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-6 md:px-10">
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
    <section class="cta-bg">
        <div class="max-w-4xl mx-auto px-6 md:px-10 py-24 text-center">
            <h2 class="text-3xl md:text-5xl font-bold text-white">{{ __('beranda.cta_title') }}</h2>
            <p class="mt-4 text-slate-200 text-lg">{{ __('beranda.cta_desc') }}</p>
            <a href="{{ url('/chat') }}"
                class="inline-block mt-8 px-7 py-3.5 rounded-md border border-white text-white font-semibold hover:bg-white hover:text-slate-900 transition">
                {{ __('beranda.cta_btn') }}
            </a>
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="bg-slate-900 text-slate-300">
        <div class="max-w-7xl mx-auto px-6 md:px-10 py-16 grid grid-cols-1 md:grid-cols-4 gap-10">
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