@extends('layouts.app')
@section('title', 'JahitSantai')

@section('content')
    @include('profil._header', ['active' => 'pesanan'])

    @php
        $filter = request('status', 'semua');
        $orders = collect([
            ['id' => 'JS26-0125', 'status' => 'Proses',  'nama' => 'Permak Rok',      'tgl' => '2 Agustus', 'total' => 40000],
            ['id' => 'JS26-0050', 'status' => 'Selesai', 'nama' => 'Custom Kebaya',   'tgl' => '22 Juli',   'total' => 120000],
            ['id' => 'JS26-0016', 'status' => 'Selesai', 'nama' => 'Permak Kemeja',   'tgl' => '21 Juni',   'total' => 120000],
        ]);
        $map = ['diproses' => 'Proses', 'selesai' => 'Selesai'];
        if ($filter !== 'semua') {
            $orders = $orders->where('status', $map[$filter] ?? '__none__');
        }
        $chips = ['semua' => 'Semua', 'belum-lunas' => 'Belum Lunas', 'diproses' => 'Diproses', 'selesai' => 'Selesai'];
    @endphp

    {{-- Filter --}}
    <div class="chips">
        @foreach ($chips as $key => $label)
            <a href="{{ url('/profil/riwayat-pemesanan?status=' . $key) }}"
                class="chip {{ $filter === $key ? 'active' : '' }}">{{ $label }}</a>
        @endforeach
    </div>

    {{-- Daftar pesanan --}}
    <div class="card-list">
        @forelse ($orders as $o)
            <div class="card order">
                <img src="{{ asset('images/bag.svg') }}" alt="" class="order-icon">

                <div class="order-info">
                    <div class="order-id">#{{ $o['id'] }} <span class="badge">{{ $o['status'] }}</span></div>
                    <h3 class="order-name">{{ $o['nama'] }}</h3>
                    <p class="order-date">Dipesan {{ $o['tgl'] }}</p>
                </div>

                <div class="order-side">
                    <div class="order-total">
                        <p>Total<br>Rp {{ number_format($o['total'], 0, ',', '.') }}</p>
                        <button type="button" class="btn-detail" data-order="{{ $o['id'] }}">Detail</button>
                    </div>

                    @if ($o['status'] === 'Proses')
                        <span class="btn btn-disabled">Pesanan Selesai</span>
                    @else
                        <a href="#" class="btn btn-fill">Pesan Lagi</a>
                    @endif
                </div>
            </div>
        @empty
            <p class="empty">Belum ada pesanan pada kategori ini.</p>
        @endforelse
    </div>
@endsection