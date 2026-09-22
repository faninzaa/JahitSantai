@php
    $selesai = ($o['status'] ?? '') === 'Selesai';
    $item = \Illuminate\Support\Str::afterLast($o['nama'], ' ');
    $steps = $o['steps'] ?? [
        ['Pesanan Diterima', '2 Agustus, 12.30'],
        ['Pengantaran ' . $item, '2 Agustus, 16.00'],
        ['Pengerjaan', $selesai ? 'selesai' : 'sedang berjalan'],
        ['Pengiriman', $selesai ? 'terkirim' : 'tahap akhir'],
    ];
    $doneCount = $selesai ? 4 : 3;
    $catatan = $o['catatan'] ?? ['Kecilkan pinggang', 'Potong panjang rok'];
    $biaya = $o['biaya'] ?? [['Jasa kecilkan', 10000], ['Jasa potong dan kelim', 20000], ['Jasa kurir', 10000]];
    $estimasi = $o['estimasi'] ?? '5 Agustus 12.00 WIB';
    $noInv = $o['invoice'] ?? 'INV' . substr($o['id'], 2);
    $metode = $o['metode'] ?? 'QRIS(Gopay)';
    $bayar = $o['pembayaran'] ?? 'Lunas';
    $tahun = $o['tahun'] ?? 2026;
@endphp

<div class="modal" id="modal-{{ $o['id'] }}" role="dialog" aria-modal="true"
    aria-labelledby="modal-title-{{ $o['id'] }}" hidden>
    <div class="modal-box">

        {{-- Header --}}
        <div class="modal-head">
            <img src="{{ asset('images/bag.svg') }}" alt="" class="modal-bag">
            <div class="modal-head-text">
                <h2 id="modal-title-{{ $o['id'] }}">Detail &amp; Progres Pesanan #{{ $o['id'] }}
                    <span class="badge badge-lg">{{ $o['status'] }}</span>
                </h2>
                <p>{{ $o['nama'] }} . Dipesan {{ $o['tgl'] }} {{ $tahun }}</p>
            </div>
            <button type="button" class="modal-close" data-close aria-label="Tutup">
                <svg viewBox="0 0 24 24"><path d="M6 6l12 12M18 6L6 18" /></svg>
            </button>
        </div>

        {{-- Status pelacakan --}}
        <div class="mbox track">
            <div class="mbox-title">
                <span>Status Pelacakan Jahitan</span>
                <span class="track-eta">
                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9" /><path d="M12 7v5l3 2" /></svg>
                    Estimasi selesai {{ $estimasi }}
                </span>
            </div>

            <div class="steps">
                @foreach ($steps as $i => $st)
                    <div class="step {{ $i >= $doneCount ? 'pending' : '' }}">
                        <span class="step-check">
                            <svg viewBox="0 0 24 24"><path d="M5 12.5l4.5 4.5L19 7.5" /></svg>
                        </span>
                        <b>{{ $st[0] }}</b>
                        <small>{{ $st[1] }}</small>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Catatan + Ringkasan biaya --}}
        <div class="modal-cols">
            <div class="mbox">
                <div class="mbox-title"><span>Catatan</span></div>
                <p class="note-item">{{ $o['nama'] }}</p>
                <ul class="note-list">
                    @foreach ($catatan as $c)
                        <li>
                            <svg viewBox="0 0 24 24"><path d="M5 12.5l4.5 4.5L19 7.5" /></svg>
                            {{ $c }}
                        </li>
                    @endforeach
                </ul>
                <a href="{{ url('/pesan-saya') }}" class="modal-btn">
                    <svg viewBox="0 0 24 24"><path d="M4 4h16v13H9l-5 4z" /><path d="M8 9h8M8 12.5h6" /></svg>
                    Chat Penjahit
                </a>
            </div>

            <div class="mbox">
                <div class="mbox-title">
                    <span>Ringkasan Biaya</span>
                    <span class="badge">{{ $bayar }}</span>
                </div>
                <div class="cost-rows">
                    <div><span>No. Tagihan</span><span>#{{ $noInv }}</span></div>
                    <div><span>Metode bayar</span><span>{{ $metode }}</span></div>
                    @foreach ($biaya as $b)
                        <div><span>{{ $b[0] }}</span><span>Rp. {{ number_format($b[1], 0, ',', '.') }}</span></div>
                    @endforeach
                </div>
                <a href="#" class="modal-btn">
                    <svg viewBox="0 0 24 24"><path d="M12 4v11M7 11l5 5 5-5M5 20h14" /></svg>
                    Unduh Invoice
                </a>
            </div>
        </div>
    </div>
</div>