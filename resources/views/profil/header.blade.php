<h1 class="page-title">Profil Saya</h1>
<p class="page-subtitle">Kelola informasi akun dan pengaturan Anda</p>

<div class="tabs">
    <a href="{{ url('/profil/profiluser') }}" class="tab {{ $active === 'info' ? 'active' : '' }}">Informasi akun</a>
    <a href="{{ url('/profil/profilukuran') }}" class="tab {{ $active === 'ukuran' ? 'active' : '' }}">Ukuran saya</a>
    <a href="{{ url('/profil/profilpemesanan') }}" class="tab {{ $active === 'pesanan' ? 'active' : '' }}">Riwayat pemesanan</a>
    <a href="{{ url('/profil/profilulasan') }}" class="tab {{ $active === 'ulasan' ? 'active' : '' }}">Riwayat ulasan</a>
</div>