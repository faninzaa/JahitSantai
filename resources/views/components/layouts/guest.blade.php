<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'JahitSantai') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: '#1F2A44',
                        cream: '#E8DCC8',
                    }
                }
            }
        }
    </script>
</head>

<body class="font-sans antialiased">
    <div class="relative min-h-screen flex items-center justify-center bg-cream overflow-hidden">

        <!-- Logo kiri atas -->
        <div class="absolute top-6 left-8 z-20">
            <a href="/" class="text-xl font-semibold text-navy"
                style="font-family: 'Poppins', sans-serif;">JahitSantai</a>
        </div>

        <!-- Dekorasi benang/jarum, kiri atas -->
        <img src="{{ asset('images/benang.svg') }}" class="absolute -top-10 -left-10 w-64 opacity-70 z-0" alt="">

        <!-- Dekorasi gunting, kanan bawah -->
        <img src="{{ asset('images/gunting.svg') }}" class="absolute -bottom-10 -right-10 w-64 opacity-70 z-0" alt="">

        <!-- Konten form (di atas dekorasi) -->
        <div class="relative z-10 py-10 px-4">
            {{ $slot }}
        </div>

    </div>
</body>

</html>