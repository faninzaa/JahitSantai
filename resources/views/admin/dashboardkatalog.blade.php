<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>JahitSantai – Manajemen Katalog Layanan</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="admin-base.css">
    <link rel="stylesheet" href="admin-katalog.css">
</head>

<body data-page="Katalog">
    <div class="app">
        <aside>
            <div class="logo">
                <img src="{{ asset('images/logoweb.svg') }}" alt="JahitSantai" class="h-13 w-13">
            </div>
            <nav id="nav"></nav>
            <div class="out"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                    <path d="M16 17l5-5-5-5M21 12H9" />
                </svg><span>Keluar</span></div>
        </aside>
        <main>
            <header>
                <label class="pill top-search"><svg viewBox="0 0 24 24" fill="none" stroke="#1E2A4A" stroke-width="2"
                        stroke-linecap="round">
                        <circle cx="11" cy="11" r="7" />
                        <path d="M20 20l-4-4" />
                    </svg><input placeholder="Cari layanan" aria-label="Cari layanan"></label>
                <div class="spacer"></div>
                <svg class="bell" viewBox="0 0 24 24" fill="none" stroke="#1E2A4A" stroke-width="1.6"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9M10.3 21a1.9 1.9 0 0 0 3.4 0" />
                </svg>
                <div class="me">
                    <div class="av"></div>
                    <div><b>Admin</b><small>afaninkaza@gmail.com</small></div>
                </div>
            </header>
            <div class="content">
                <section class="view on" id="v-katalog">
                    <h1>Manajemen Katalog Layanan</h1>
                    <div class="filters">
                        <label class="pill search"><svg viewBox="0 0 24 24" fill="none" stroke="#1E2A4A"
                                stroke-width="2" stroke-linecap="round">
                                <circle cx="11" cy="11" r="7" />
                                <path d="M20 20l-4-4" />
                            </svg><input placeholder="Cari pesanan" aria-label="Cari pesanan"></label>
                        <div class="pill sel">Semua layanan <svg viewBox="0 0 24 24" fill="none" stroke="#1E2A4A"
                                stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M6 9l6 6 6-6" />
                            </svg></div>
                        <div class="pill sel">Semua kategori <svg viewBox="0 0 24 24" fill="none" stroke="#1E2A4A"
                                stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M6 9l6 6 6-6" />
                            </svg></div>
                    </div>
                    <div class="tablewrap">
                        <table class="k">
                            <thead>
                                <tr>
                                    <th style="width:165px">Layanan</th>
                                    <th style="width:192px">Gambar</th>
                                    <th style="width:131px">Kategori</th>
                                    <th>Deskripsi</th>
                                    <th style="width:130px">Dibuat oleh</th>
                                    <th style="width:90px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="kb"></tbody>
                        </table>
                    </div>
                    <div class="pg" data-pg></div>
                </section>
            </div>
        </main>
    </div>
    <script src="app.js"></script>
</body>

</html>