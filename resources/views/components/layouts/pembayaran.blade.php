@php
    // konfigurasi tampilan berdasarkan status asli dari database
    $config = match($status ?? 'pending') {
        'lunas' => [
            'bg'      => '#1F2A44',
            'icon'    => 'M5 13l4 4L19 7', // checkmark
            'judul'   => 'Pembayaran Berhasil!',
            'badge'   => ($metode ?? 'Midtrans') . ' - Lunas',
            'deskripsi' => "Pesanan #{$noPesanan} telah dibayar dan langsung diteruskan ke penjahit kami.",
        ],
        'gagal' => [
            'bg'      => '#DC2626',
            'icon'    => 'M6 18L18 6M6 6l12 12', // silang
            'judul'   => 'Pembayaran Gagal',
            'badge'   => ($metode ?? 'Midtrans') . ' - Gagal',
            'deskripsi' => "Pembayaran untuk pesanan #{$noPesanan} tidak berhasil. Silakan coba lagi.",
        ],
        default => [ // pending
            'bg'      => '#D97706',
            'icon'    => 'M12 8v4l3 3', // jam
            'judul'   => 'Menunggu Pembayaran',
            'badge'   => ($metode ?? 'Midtrans') . ' - Diproses',
            'deskripsi' => "Pesanan #{$noPesanan} sedang menunggu konfirmasi pembayaran.",
        ],
    };
@endphp

<div x-data="{ open: true }" x-show="open" x-cloak
    class="fixed inset-0 z-[100] flex items-center justify-center p-4">

    <div class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm" @click="open = false"></div>

    <div x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        class="relative bg-white rounded-2xl shadow-xl w-full max-w-md p-8 text-center">

        <button @click="open = false" type="button"
            class="absolute top-5 right-5 text-slate-400 hover:text-slate-600">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div class="w-14 h-14 mx-auto rounded-xl flex items-center justify-center"
            style="background-color: {{ $config['bg'] }};">
            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $config['icon'] }}" />
            </svg>
        </div>

        <h2 class="mt-5 text-xl font-bold text-slate-900">{{ $config['judul'] }}</h2>

        <p class="mt-5 text-xs font-medium tracking-wide text-slate-400">TOTAL PEMBAYARAN</p>
        <p class="mt-1 text-3xl font-bold text-slate-900">
            Rp {{ number_format($total ?? 0, 0, ',', '.') }}
        </p>

        <div class="mt-3 inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-100 text-xs font-medium text-slate-600">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                <rect x="3" y="5" width="18" height="14" rx="2" />
                <path d="M3 10h18" />
            </svg>
            {{ $config['badge'] }}
        </div>

        <p class="mt-5 text-sm text-slate-500 leading-relaxed">
            {{ $config['deskripsi'] }}
        </p>

        @if(($status ?? 'pending') === 'gagal')
            <a href="{{ url('/pesanan/create') }}"
                class="mt-6 block w-full py-3 rounded-xl text-white font-semibold transition hover:opacity-90"
                style="background-color: #1F2A44;">
                Coba Bayar Lagi
            </a>
        @else
            <a href="{{ url('/pesanan/' . ($noPesanan ?? '')) }}"
                class="mt-6 block w-full py-3 rounded-xl text-white font-semibold transition hover:opacity-90"
                style="background-color: #1F2A44;">
                Lihat Pesanan
            </a>
        @endif

        <a href="{{ url('/beranda') }}" class="mt-3 block text-sm text-slate-500 hover:text-slate-700 font-medium">
            Kembali ke Beranda
        </a>

    </div>
</div>