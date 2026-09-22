<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil - JahitSantai</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: { navy: { DEFAULT: '#1F2A44', dark: '#141B2E' } }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-[#F5F8FF] text-slate-800">

    {{-- ===================== NAVBAR ===================== --}}
    <header class="bg-white sticky top-0 z-40 border-b border-slate-100">
        <nav class="max-w-7xl mx-auto px-6 md:px-10 h-20 flex items-center justify-between">
            <a href="{{ url('/beranda') }}" class="flex items-center gap-2 text-2xl font-bold text-slate-900">
                <img src="{{ asset('images/logoweb.svg') }}" alt="JahitSantai" class="h-13 w-13">
                JahitSantai
            </a>
            <ul class="hidden md:flex items-center gap-10 text-slate-700 font-medium">
                <li><a href="{{ url('/beranda') }}" class="hover:text-slate-900">Beranda</a></li>
                <li><a href="{{ url('/layanan') }}" class="hover:text-slate-900">Layanan</a></li>
                <li><a href="{{ url('/tentang-kami') }}" class="hover:text-slate-900">Tentang Kami</a></li>
            </ul>
            <div
                class="flex items-center justify-center h-10 w-10 rounded-full bg-navy text-white font-semibold text-sm">
                {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
            </div>
        </nav>
    </header>

    <main class="max-w-3xl mx-auto px-6 py-16">
        <h1 class="text-2xl font-bold text-slate-900">Ringkasan Pesanan #{{ $noPesanan }}</h1>
        <p class="mt-2 text-slate-500">Detail pesanan kamu akan tampil di sini setelah modal ditutup.</p>
    </main>

    {{-- ===================== MODAL SUKSES ===================== --}}
    @include('components.layouts.pembayaran', [
        'noPesanan' => $noPesanan,
        'total' => $total,
        'metode' => $metode,
        'status' => $status,
    ])

</body>

</html>