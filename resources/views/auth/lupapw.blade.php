<x-layouts.guest>
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">

        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Lupa Password</h1>
            <p class="text-sm text-gray-500 mt-1">Masukkan email kamu, kami akan kirim link untuk reset password.</p>
        </div>

        @if (session('status'))
            <div class="mb-4 p-3 bg-green-50 border border-green-200 rounded-lg text-sm text-green-700">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-lg text-sm text-red-600">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-6">
                <label for="email" class="text-sm font-medium text-gray-700">Email</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="fanin@gmail.com"
                    required
                    autofocus
                    class="block mt-2 w-full rounded-lg bg-gray-100 border-gray-200 focus:ring-2 focus:ring-navy focus:border-navy"
                />
            </div>

            <button type="submit" class="w-full bg-navy hover:opacity-90 text-white font-medium py-3 rounded-lg transition mb-4">
                Kirim Link Reset
            </button>

            <p class="text-center text-sm text-gray-600">
                <a href="{{ route('login') }}" class="font-semibold text-gray-900 hover:underline">Kembali ke login</a>
            </p>
        </form>
    </div>
</x-layouts.guest>