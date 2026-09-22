<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - JahitSantai</title>
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
    <link rel="stylesheet" href="{{ asset('css/tentang.css') }}">
</head>

<body class="bg-white text-slate-800">

    {{-- ===================== NAVBAR (disamakan dengan beranda) ===================== --}}
    <header class="bg-white sticky top-0 z-50 border-b border-slate-100">
        <nav class="max-w-screen-2xl mx-auto px-6 md:px-10 h-20 grid grid-cols-3 items-center">

            <!-- KIRI: logo -->
            <a href="{{ url('/') }}"
                class="flex items-center gap-2 text-2xl font-bold text-slate-900 justify-self-start">
                <img src="{{ asset('images/logoweb.svg') }}" alt="JahitSantai" class="h-13 w-13">
            </a>

            <!-- TENGAH: menu -->
            <ul class="hidden md:flex items-center gap-10 text-slate-700 font-medium justify-self-center">
                <li><a href="{{ url('/beranda') }}" class="hover:text-slate-900">{{ __('nav.home') }}</a></li>
                <li><a href="{{ url('/katalog') }}" class="hover:text-slate-900">{{ __('nav.services') }}</a></li>
                <li><a href="{{ url('/tentang-kami') }}"
                        class="text-slate-900 border-b-2 border-slate-900 pb-1">{{ __('nav.about') }}</a></li>
            </ul>

            <!-- KANAN: bahasa + tombol masuk -->
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

    {{-- ===================== KONTEN TENTANG KAMI ===================== --}}
    <section class="hero">
        <h1>Tentang JahitSantai</h1>
        <p>Melestarikan keahlian penjahit tradisional melalui kemudahan teknologi modern.</p>
    </section>

    <section class="features">
        <div class="card">
            <div class="icon-circle">
                <svg viewBox="0 0 24 24" stroke-width="1.6">
                    <path
                        d="M20.59 13.41 12 22l-9-9 8.59-8.59a2 2 0 0 1 1.41-.41H19a1 1 0 0 1 1 1v6.59a2 2 0 0 1-.41 1.41z" />
                    <circle cx="16.5" cy="7.5" r="1.2" />
                </svg>
            </div>
            <h3>Harga Transparan</h3>
            <p>Tanpa biaya tersembunyi. Kamu bisa langsung tahu estimasi biaya pengerjaan sebelum pesanan diproses.
            </p>
        </div>
        <div class="card">
            <div class="icon-circle">
                <svg viewBox="0 0 24 24" stroke-width="1.6">
                    <path d="M21 8 12 3 3 8l9 5 9-5z" />
                    <path d="M3 8v8l9 5 9-5V8" />
                    <path d="M12 13v8" />
                </svg>
            </div>
            <h3>Antar-Jemput Fleksibel</h3>
            <p>Pilih layanan jemput-antar ke rumah atau opsi ambil sendiri langsung di tempat kami.</p>
        </div>
        <div class="card">
            <div class="icon-circle">
                <svg viewBox="0 0 24 24" stroke-width="1.6">
                    <circle cx="6" cy="6" r="3" />
                    <circle cx="6" cy="18" r="3" />
                    <path d="M8.5 8.5 20 20" />
                    <path d="M20 4 8.5 15.5" />
                </svg>
            </div>
            <h3>Custom Fit</h3>
            <p>Solusi tepat untuk baju beli online yang kekecilan atau kebesaran agar kembali pas dan nyaman
                dipakai.</p>
        </div>
        <div class="card">
            <div class="icon-circle">
                <svg viewBox="0 0 24 24" stroke-width="1.6">
                    <path
                        d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
                </svg>
            </div>
            <h3>Konsultasi Online</h3>
            <p>Bisa konsultasi online pilihan model terbaik dan panduan cara ukur baju sendiri dari rumah.</p>
        </div>
    </section>

    <section class="lokasi-heading">
        <h2>Lokasi & Konsultasi</h2>
        <p>Kunjungi studio kami atau obrolkan kebutuhan pakaian Anda secara langsung dengan penjahit via chat.</p>
    </section>

    <section class="lokasi-box">
        <div class="map-wrap">
            <iframe src="https://www.google.com/maps?q=-8.011266,112.585444&z=17&output=embed" width="100%"
                height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        <div class="lokasi-info">
            <div class="pin-badge">
                <svg viewBox="0 0 24 24" stroke-width="1.6">
                    <path d="M12 21s-7-6.1-7-11a7 7 0 0 1 14 0c0 4.9-7 11-7 11z" />
                    <circle cx="12" cy="10" r="2.5" />
                </svg>
            </div>
            <div class="label">Kunjungi kami di:</div>
            <div class="address">Jl. Raya Gondowangi Gg. Istana RT 3<br>RW 1 No. 14 Kecamatan Wagir</div>
            <div class="lokasi-buttons">
                <a href="https://www.google.com/maps/dir/?api=1&destination=-8.011266,112.585444" target="_blank"
                    rel="noopener" class="btn-outline">
                    <svg viewBox="0 0 24 24" stroke-width="1.6">
                        <polygon points="3 11 22 2 13 21 11 13 3 11" />
                    </svg>
                    Petunjuk Arah
                </a>
                <a href="/pesan" class="btn-solid">
                    <svg viewBox="0 0 24 24" stroke-width="1.6">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                    </svg>
                    Konsultasi via chat
                </a>
            </div>
        </div>
    </section>

    <section class="faq-section">
        <h2>Pertanyaan yang Sering Diajukan</h2>
        <div class="faq-list" id="faqList">
            <div class="faq-item open">
                <button class="faq-q">Bagaimana cara mengukur pakaian yang benar untuk permak?
                    <svg viewBox="0 0 24 24" stroke-width="2">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </button>
                <div class="faq-a">Letakkan pakaian di permukaan datar, ukur bagian yang ingin dipermak dengan
                    meteran kain, lalu catat ukurannya sebelum mengirim ke tim kami.</div>
            </div>
            <div class="faq-item">
                <button class="faq-q">Bagaimana cara mengukur pakaian yang benar untuk permak?
                    <svg viewBox="0 0 24 24" stroke-width="2">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </button>
                <div class="faq-a">Letakkan pakaian di permukaan datar, ukur bagian yang ingin dipermak dengan
                    meteran kain, lalu catat ukurannya sebelum mengirim ke tim kami.</div>
            </div>
            <div class="faq-item">
                <button class="faq-q">Bagaimana cara mengukur pakaian yang benar untuk permak?
                    <svg viewBox="0 0 24 24" stroke-width="2">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </button>
                <div class="faq-a">Letakkan pakaian di permukaan datar, ukur bagian yang ingin dipermak dengan
                    meteran kain, lalu catat ukurannya sebelum mengirim ke tim kami.</div>
            </div>
            <div class="faq-item">
                <button class="faq-q">Bagaimana cara mengukur pakaian yang benar untuk permak?
                    <svg viewBox="0 0 24 24" stroke-width="2">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </button>
                <div class="faq-a">Letakkan pakaian di permukaan datar, ukur bagian yang ingin dipermak dengan
                    meteran kain, lalu catat ukurannya sebelum mengirim ke tim kami.</div>
            </div>
        </div>
    </section>

    {{-- ===================== FOOTER ===================== --}}
    <footer class="bg-slate-900 text-slate-300">
        <div class="max-w-7xl mx-auto px-6 md:px-10 py-16 grid grid-cols-1 md:grid-cols-4 gap-10">
            <div>
                <a href="{{ url('/beranda') }}" class="flex items-center gap-2 text-2xl font-bold text-slate-900">
                    <img src="{{ asset('images/logofooter.svg') }}" alt="JahitSantai" class="h-20 w-20">
                </a>
                <p class="mt-4 text-sm leading-relaxed text-slate-400">{{ __('beranda.footer_desc') }}</p>
            </div>

            <div>
                <h4 class="text-white font-semibold tracking-wide">{{ __('beranda.footer_services_title') }}</h4>
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

    <script>
        document.querySelectorAll('.faq-q').forEach(btn => {
            btn.addEventListener('click', () => {
                btn.parentElement.classList.toggle('open');
            });
        });
    </script>

</body>

</html>