<x-layouts.guest>
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">

        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Buat Password Baru</h1>
            <p class="text-sm text-gray-500 mt-1">Masukkan password baru kamu.</p>
        </div>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-lg text-sm text-red-600">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-5">
                <label for="email" class="text-sm font-medium text-gray-700">Email</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email', $email) }}"
                    required
                    autofocus
                    class="block mt-2 w-full rounded-lg bg-gray-100 border-gray-200 focus:ring-2 focus:ring-navy focus:border-navy"
                />
            </div>

            <div class="mb-5">
                <label for="password" class="text-sm font-medium text-gray-700">Password Baru</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    class="block mt-2 w-full rounded-lg bg-gray-100 border-gray-200 focus:ring-2 focus:ring-navy focus:border-navy"
                />
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    class="block mt-2 w-full rounded-lg bg-gray-100 border-gray-200 focus:ring-2 focus:ring-navy focus:border-navy"
                />
            </div>

            <button type="submit" class="w-full bg-navy hover:opacity-90 text-white font-medium py-3 rounded-lg transition">
                Ubah Password
            </button>
        </form>
    </div>
</x-layouts.guest>