@extends('layouts.app')
@section('title', 'JahitSantai')

@section('content')
    @include('profil._header', ['active' => 'ulasan'])

    @php
        // Data contoh. Ganti dengan data dari database.
        $tab = request('tab', 'selesai'); // selesai | menunggu
        $foto = auth()->user()->foto ? asset('storage/' . auth()->user()->foto) : asset('images/default-avatar.png');
        $nama = auth()->user()->name ?? 'Ghea A.';

        $ulasan = [
            ['layanan' => 'Custom Kebaya', 'isi' => 'Hasil customnya bener bener sesuai ekspektasiku, bahkan lebih bagus lagi. Bener bener sesuai sama yang aku mau, sesuai desain juga dan pas banget di badanku.'],
            ['layanan' => 'Permak Kemeja', 'isi' => 'Permak kemejanya rapi banget, pas banget sama badanku, prosesnya juga cepet. Bakal langganan sih di sini.'],
        ];
        $menunggu = [
            ['id' => 'JS26-0125', 'status' => 'Proses', 'nama' => 'Permak Rok', 'tgl' => '2 Agustus', 'total' => 40000],
        ];
    @endphp

    {{-- Filter --}}
    <div class="chips">
        <a href="{{ url('/profil/riwayat-ulasan?tab=selesai') }}"
            class="chip {{ $tab === 'selesai' ? 'active' : '' }}">Telah Diulas ({{ count($ulasan) }})</a>
        <a href="{{ url('/profil/riwayat-ulasan?tab=menunggu') }}"
            class="chip {{ $tab === 'menunggu' ? 'active' : '' }}">Menunggu Diulas ({{ count($menunggu) }})</a>
    </div>

    <div class="card-list">
        @if ($tab === 'selesai')
            @foreach ($ulasan as $u)
                <div class="card review">
                    <div class="review-head">
                        <img src="{{ $foto }}" alt="{{ $nama }}" class="review-avatar">
                        <div>
                            <p class="review-name">{{ $nama }}</p>
                            <div class="stars">★★★★★</div>
                        </div>
                    </div>
                    <p class="review-service">Layanan: {{ $u['layanan'] }}</p>
                    <p class="review-text">{{ $u['isi'] }}</p>
                </div>
            @endforeach
        @else
            @foreach ($menunggu as $o)
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
                        <div class="btn-row">
                            <a href="#" class="btn">Pesan lagi</a>
                            <a href="#" class="btn btn-fill">Beri nilai</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection