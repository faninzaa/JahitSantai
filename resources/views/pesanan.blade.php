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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg-[#F5F8FF] text-slate-800">

    {{-- ===================== NAVBAR ===================== --}}
    <header class="bg-white sticky top-0 z-50 border-b border-slate-100">
        <nav class="max-w-7xl mx-auto px-6 md:px-10 h-20 flex items-center justify-between">
            <a href="{{ url('/beranda') }}" class="flex items-center gap-2 text-2xl font-bold text-slate-900">
                <img src="{{ asset('images/logoweb.svg') }}" alt="JahitSantai" class="h-13 w-13">
                JahitSantai
            </a>

            <ul class="hidden md:flex items-center gap-10 text-slate-700 font-medium">
                <li><a href="{{ url('/beranda') }}" class="hover:text-slate-900">{{ __('nav.home') }}</a></li>
                <li><a href="{{ url('/layanan') }}"
                        class="text-slate-900 border-b-2 border-slate-900 pb-1">{{ __('nav.services') }}</a></li>
                <li><a href="{{ url('/tentang-kami') }}" class="hover:text-slate-900">{{ __('nav.about') }}</a></li>
            </ul>

            <div class="flex items-center gap-4">
                <button type="button" class="text-slate-500 hover:text-slate-900">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="9" stroke-width="1.6" />
                        <path stroke-width="1.6"
                            d="M3 12h18M12 3c2.5 2.5 3.5 6 3.5 9s-1 6.5-3.5 9c-2.5-2.5-3.5-6-3.5-9s1-6.5 3.5-9z" />
                    </svg>
                </button>
                <button type="button" class="relative text-slate-500 hover:text-slate-900">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"
                            d="M15 17h5l-1.4-1.4A2 2 0 0 1 18 14.2V11a6 6 0 1 0-12 0v3.2a2 2 0 0 1-.6 1.4L4 17h5m6 0a3 3 0 1 1-6 0m6 0H9" />
                    </svg>
                </button>

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

    {{-- ===================== KONTEN ===================== --}}
    <main class="max-w-7xl mx-auto px-6 md:px-10 py-12">

        <h1 class="text-3xl md:text-4xl font-bold text-slate-900">Selesaikan Pesanan Anda</h1>
        <p class="mt-2 text-slate-500">Periksa detail dan masukkan ukuran akhir untuk hasil yang pas.</p>

        <form method="POST" action="{{ route('pesanan.store') }}" class="mt-10">
            @csrf
            <input type="hidden" name="layanan_id" value="{{ $layanan->id ?? '' }}">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- ===== KIRI ATAS: UKURAN TUBUH ===== --}}
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-7">
                    <div class="flex items-center gap-3 mb-6">
                        <span
                            class="w-7 h-7 rounded-full bg-navy text-white text-sm font-semibold flex items-center justify-center">1</span>
                        <h2 class="text-lg font-bold text-slate-900">Ukuran Tubuh</h2>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm text-slate-600 mb-1.5">Pinggang (cm)</label>
                            <input type="number" step="0.1" name="pinggang" placeholder="Masukkan ukuran"
                                class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-navy/20 focus:border-navy transition">
                        </div>
                        <div>
                            <label class="block text-sm text-slate-600 mb-1.5">Pinggul (cm)</label>
                            <input type="number" step="0.1" name="pinggul" placeholder="Masukkan ukuran"
                                class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-navy/20 focus:border-navy transition">
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm text-slate-600 mb-1.5">Panjang rok (cm)</label>
                        <input type="number" step="0.1" name="panjang_rok" placeholder="Masukkan ukuran"
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-navy/20 focus:border-navy transition">
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm text-slate-600 mb-1.5">Catatan permak</label>
                        <textarea name="catatan" rows="3" placeholder="Tulis catatan untuk penjahit"
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-navy/20 focus:border-navy transition resize-none"></textarea>
                    </div>

                    <label class="mt-5 flex items-center gap-2 text-sm text-slate-600 cursor-pointer">
                        <input type="checkbox" name="simpan_ukuran" value="1"
                            class="w-4 h-4 rounded border-slate-300 text-navy focus:ring-navy/30">
                        Simpan ukuran
                    </label>
                </div>

                {{-- ===== KANAN ATAS: ISI DATA ===== --}}
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-7">
                    <div class="flex items-center gap-3 mb-6">
                        <span
                            class="w-7 h-7 rounded-full bg-navy text-white text-sm font-semibold flex items-center justify-center">2</span>
                        <h2 class="text-lg font-bold text-slate-900">Isi Data</h2>
                    </div>

                    <div>
                        <label class="block text-sm text-slate-600 mb-1.5">Nama penerima</label>
                        <input type="text" name="nama_penerima" value="{{ auth()->user()->name ?? '' }}"
                            placeholder="Masukkan nama"
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-navy/20 focus:border-navy transition">
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm text-slate-600 mb-1.5">No. Telp</label>
                        <input type="text" name="no_hp" placeholder="08xxx"
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-navy/20 focus:border-navy transition">
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm text-slate-600 mb-1.5">Alamat</label>
                        <textarea name="alamat" rows="3" placeholder="Masukkan alamat lengkap"
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-navy/20 focus:border-navy transition resize-none"></textarea>
                    </div>

                    <label class="mt-5 flex items-center gap-2 text-sm text-slate-600 cursor-pointer">
                        <input type="checkbox" name="simpan_alamat" value="1"
                            class="w-4 h-4 rounded border-slate-300 text-navy focus:ring-navy/30">
                        Simpan alamat
                    </label>
                </div>

                {{-- ===== KIRI BAWAH: RINGKASAN PESANAN ===== --}}
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-7">
                    <h2 class="text-lg font-bold text-slate-900 mb-5">Ringkasan Pesanan</h2>

                    <div class="flex items-center gap-4 pb-5 border-b border-slate-100">
                        <img src="{{ asset($layanan->gambar ?? 'images/gambaratas.png') }}"
                            alt="{{ $layanan->nama_layanan ?? 'Permak Rok' }}"
                            class="w-16 h-16 rounded-lg object-cover flex-shrink-0">
                        <div class="flex-1">
                            <p class="font-semibold text-slate-900">{{ $layanan->nama_layanan ?? 'Permak Rok' }}</p>
                            <p class="text-sm text-slate-400">1 item</p>
                        </div>
                        <p class="font-semibold text-slate-900">
                            Rp {{ number_format($layanan->harga ?? 30000, 0, ',', '.') }}
                        </p>
                    </div>

                    <div class="py-5 space-y-2 text-sm border-b border-slate-100">
                        <div class="flex items-center justify-between text-slate-500">
                            <span>Subtotal</span>
                            <span>Rp {{ number_format($subtotal ?? 30000, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex items-center justify-between text-slate-500">
                            <span>Kurir</span>
                            <span>Rp {{ number_format($ongkir ?? 10000, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-5">
                        <span class="font-bold text-slate-900">Total</span>
                        <span class="text-xl font-bold text-slate-900">
                            Rp {{ number_format($total ?? 40000, 0, ',', '.') }}
                        </span>
                    </div>

                    <button type="submit"
                        class="mt-6 w-full flex items-center justify-center gap-2 py-3.5 rounded-xl text-white font-semibold transition hover:opacity-90"
                        style="background-color: #1F2A44;">
                        Lanjut ke pembayaran
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </button>
                </div>

                {{-- ===== KANAN BAWAH: OPSI PENGIRIMAN ===== --}}
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-7"
                    x-data="{ pengiriman: 'kurir' }">
                    <h2 class="text-lg font-bold text-slate-900 mb-5">Opsi Pengiriman</h2>

                    <div class="space-y-3">
                        <label
                            class="flex items-center justify-between gap-3 p-4 rounded-xl border cursor-pointer transition"
                            :class="pengiriman === 'kurir' ? 'border-navy' : 'border-slate-200'">
                            <span class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-width="1.5" stroke-linejoin="round"
                                        d="M3 7h11v8H3zM14 10h4l3 3v2h-7z" />
                                    <circle cx="7" cy="17" r="1.5" stroke-width="1.5" />
                                    <circle cx="17" cy="17" r="1.5" stroke-width="1.5" />
                                </svg>
                                <span class="font-medium text-slate-800">Kurir JahitSantai</span>
                            </span>
                            <input type="radio" name="metode_pengiriman" value="kurir" x-model="pengiriman"
                                class="w-4 h-4 text-navy focus:ring-navy/30">
                        </label>

                        <label
                            class="flex items-center justify-between gap-3 p-4 rounded-xl border cursor-pointer transition"
                            :class="pengiriman === 'ambil_sendiri' ? 'border-navy' : 'border-slate-200'">
                            <span class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-width="1.5" stroke-linejoin="round" d="M4 8l8-4 8 4v9l-8 4-8-4z" />
                                    <path stroke-width="1.5" d="M4 8l8 4 8-4M12 12v9" />
                                </svg>
                                <span class="font-medium text-slate-800">Ambil Sendiri</span>
                            </span>
                            <input type="radio" name="metode_pengiriman" value="ambil_sendiri" x-model="pengiriman"
                                class="w-4 h-4 text-navy focus:ring-navy/30">
                        </label>
                    </div>
                </div>

            </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>