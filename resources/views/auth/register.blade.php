<x-layouts.guest>
    <div class="w-full max-w-xl bg-white rounded-2xl shadow-md border border-gray-100 p-10">
        <div class="mb-7">
            <h1 class="text-2xl font-bold text-gray-900">Selamat Datang</h1>
            <p class="text-base text-gray-500 mt-1">Mulai pengalaman jahit custom pertamamu.</p>
        </div>

        <!-- Pesan error kalau register gagal -->
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-lg text-sm text-red-600">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nama -->
            <div class="mb-4">
                <label for="name" class="text-sm font-medium text-gray-700">Nama</label>
                <div class="relative mt-1.5">
                    <span class="absolute inset-y-0 left-3 flex items-center text-gray-400 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                    </span>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Nama lengkap"
                        required autofocus autocomplete="name"
                        class="block w-full text-base rounded-lg bg-gray-100 border border-gray-200 pl-10 py-3 focus:ring-2 focus:ring-navy focus:border-navy" />
                </div>
                @error('name')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="text-sm font-medium text-gray-700">Email</label>
                <div class="relative mt-1.5">
                    <span class="absolute inset-y-0 left-3 flex items-center text-gray-400 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 6.75c0-.828.672-1.5 1.5-1.5h16.5c.828 0 1.5.672 1.5 1.5v10.5a1.5 1.5 0 01-1.5 1.5H3.75a1.5 1.5 0 01-1.5-1.5V6.75z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M22 6.75l-10 7-10-7" />
                        </svg>
                    </span>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="fanin@gmail.com"
                        required autocomplete="username"
                        class="block w-full text-base rounded-lg bg-gray-100 border border-gray-200 pl-10 py-3 focus:ring-2 focus:ring-navy focus:border-navy" />
                </div>
                @error('email')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-5">
                <label for="password" class="text-sm font-medium text-gray-700">Kata sandi</label>
                <div class="relative mt-1.5">
                    <span class="absolute inset-y-0 left-3 flex items-center text-gray-400 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 0h10.5A2.25 2.25 0 0119.5 12.75v6a2.25 2.25 0 01-2.25 2.25h-10.5A2.25 2.25 0 014.5 18.75v-6a2.25 2.25 0 012.25-2.25z" />
                        </svg>
                    </span>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        class="block w-full text-base rounded-lg bg-gray-100 border border-gray-200 pl-10 py-3 focus:ring-2 focus:ring-navy focus:border-navy" />
                </div>
                @error('password')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>


            <!-- Tombol Daftar -->
            <button type="submit"
                class="w-full bg-navy hover:opacity-90 text-white text-base font-medium py-3 rounded-lg transition mb-4">
                Daftar
            </button>

            <!-- Link ke login -->
            <p class="text-center text-sm text-gray-600 mb-3">
                Sudah memiliki akun?
                <a href="{{ route('login') }}" class="font-semibold text-gray-900 hover:underline">Masuk</a>
            </p>

            <!-- Divider -->
            <div class="flex items-center gap-3 mb-4">
                <div class="flex-1 h-px bg-gray-200"></div>
                <span class="text-xs text-gray-400 whitespace-nowrap">atau daftar dengan</span>
                <div class="flex-1 h-px bg-gray-200"></div>
            </div>

            <!-- Social login -->
            <div class="flex justify-center gap-3">
                <a href="{{ url('/auth/google/redirect') }}"
                    class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-200 hover:bg-gray-50">
                    <svg class="w-5 h-5" viewBox="0 0 24 24">
                        <path fill="#4285F4"
                            d="M23.49 12.27c0-.79-.07-1.54-.2-2.27H12v4.51h6.47a5.54 5.54 0 01-2.4 3.63v3.02h3.87c2.27-2.09 3.55-5.17 3.55-8.89z" />
                        <path fill="#34A853"
                            d="M12 24c3.24 0 5.95-1.07 7.93-2.91l-3.87-3.02c-1.08.72-2.45 1.15-4.06 1.15-3.13 0-5.78-2.11-6.73-4.96H1.28v3.11A11.99 11.99 0 0012 24z" />
                        <path fill="#FBBC05"
                            d="M5.27 14.26A7.2 7.2 0 014.9 12c0-.78.14-1.54.37-2.26V6.63H1.28A11.99 11.99 0 000 12c0 1.94.46 3.77 1.28 5.37l3.99-3.11z" />
                        <path fill="#EA4335"
                            d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.94 1.19 15.24 0 12 0 7.31 0 3.26 2.69 1.28 6.63l3.99 3.11C6.22 6.86 8.87 4.75 12 4.75z" />
                    </svg>
                </a>
                <a href="{{ url('/auth/facebook/redirect') }}"
                    class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-200 hover:bg-gray-50">
                    <svg class="w-5 h-5" viewBox="0 0 24 24">
                        <path fill="#1877F2"
                            d="M24 12.07C24 5.4 18.63 0 12 0S0 5.4 0 12.07C0 18.1 4.39 23.1 10.13 24v-8.44H7.08v-3.49h3.05V9.41c0-3.02 1.79-4.7 4.53-4.7 1.31 0 2.68.24 2.68.24v2.97h-1.51c-1.49 0-1.96.93-1.96 1.89v2.26h3.33l-.53 3.49h-2.8V24C19.61 23.1 24 18.1 24 12.07z" />
                    </svg>
                </a>
            </div>

        </form>
    </div>
</x-layouts.guest>