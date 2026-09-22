<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'JahitSantai')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    @stack('styles')
</head>

<body>
    <div class="layout">

        {{-- ===================== SIDEBAR ===================== --}}
        <aside class="sidebar">
            <a href="{{ url('/beranda') }}" class="sidebar-logo">
                <img src="{{ asset('images/logoweb.svg') }}" alt="JahitSantai">
            </a>

            <nav class="sidebar-nav">
                <a href="{{ url('/profil') }}" class="sidebar-link {{ request()->is('profil*') ? 'active' : '' }}">
                    <img src="{{ asset('images/user.svg') }}" alt="">
                    Profil
                </a>

                <a href="{{ url('/pesan-saya') }}"
                    class="sidebar-link {{ request()->is('pesan-saya*') ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24">
                        <path d="M4 4h16v13H9l-5 4z" />
                        <path d="M8 9h8M8 12.5h6" />
                    </svg>
                    Pesan
                </a>

                <a href="{{ url('/pengaturan') }}"
                    class="sidebar-link {{ request()->is('pengaturan*') ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="3" />
                        <circle cx="12" cy="12" r="6.5" />
                        <path d="M12 2v3.5M12 18.5V22M2 12h3.5M18.5 12H22M4.9 4.9l2.4 2.4M16.7 16.7l2.4 2.4M4.9 19.1l2.4-2.4M16.7 7.3l2.4-2.4" />
                    </svg>
                    Pengaturan
                </a>
            </nav>
        </aside>

        {{-- ===================== MAIN CONTENT ===================== --}}
        <main class="main @yield('main_class')">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/profdet.js') }}" defer></script>
</body>

</html>