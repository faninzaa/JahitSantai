<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>JahitSantai</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/adminbase.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminuser.css') }}">
</head>

<body data-page="User">
    <div class="app">
        <aside>
            <div class="logo">
                <img src="{{ asset('images/logoweb.svg') }}" alt="JahitSantai" class="h-13 w-13">
            </div>
            <nav id="nav"></nav>
        </aside>
        <main>
            <header>
                <label class="pill top-search"><svg viewBox="0 0 24 24" fill="none" stroke="#1E2A4A" stroke-width="2"
                        stroke-linecap="round">
                        <circle cx="11" cy="11" r="7" />
                        <path d="M20 20l-4-4" />
                    </svg><input placeholder="Cari layanan" aria-label="Cari layanan"></label>
                <div class="spacer"></div>
                <div class="bell-wrap" id="bellBtn">
                    <svg class="bell" viewBox="0 0 24 24" fill="none" stroke="#1E2A4A" stroke-width="1.6"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9M10.3 21a1.9 1.9 0 0 0 3.4 0" />
                    </svg>
                    <div class="menu" id="notifMenu">
                        <div class="stub" style="padding:16px">Belum ada notifikasi.</div>
                    </div>
                </div>
                <div class="me" id="meBtn">
                    <div class="av"></div>
                    <div><b>Admin</b><small>afaninkaza@gmail.com</small></div>
                    <div class="menu" id="meMenu">
                        <a href="/profil"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="8" r="4" />
                                <path d="M4 21c0-4 4-6 8-6s8 2 8 6" />
                            </svg>Profil</a>
                        <a href="/pengaturan"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <circle cx="12" cy="12" r="3" />
                                <path
                                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1Z" />
                            </svg>Pengaturan</a>
                        <a href="#" id="logoutLink" class="red">Keluar</a>
                    </div>
                </div>
            </header>
            <div class="content">
                <section class="view on" id="v-user">
                    <h1>Manajemen Akun Pengguna</h1>
                    <div class="filters">
                        <label class="pill search"><svg viewBox="0 0 24 24" fill="none" stroke="#1E2A4A"
                                stroke-width="2" stroke-linecap="round">
                                <circle cx="11" cy="11" r="7" />
                                <path d="M20 20l-4-4" />
                            </svg><input id="searchAkun" placeholder="Cari akun" aria-label="Cari akun"></label>
                        <select id="roleFilter" class="pill sel">
                            <option value="all">Semua role</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="tablewrap">
                        <table class="u">
                            <thead>
                                <tr>
                                    <th style="width:238px">Nama</th>
                                    <th style="width:270px">Email</th>
                                    <th class="c" style="width:230px">Role</th>
                                    <th style="width:183px">Waktu</th>
                                    <th class="c">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="ub"></tbody>
                        </table>
                    </div>
                    <div class="pg" data-pg></div>
                </section>
            </div>
        </main>
    </div>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>

</html>