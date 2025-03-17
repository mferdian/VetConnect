<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="flex items-center justify-center min-h-screen p-4 bg-gray-100">
    <div class="w-full max-w-md p-8 bg-white shadow-lg rounded-xl">
        <h2 class="mb-6 text-2xl font-bold text-center">Register</h2>

        @if (session('success'))
            <div class="px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="nama" class="block mb-1 text-sm font-medium text-gray-700">Nama</label>
                <input
                    type="text"
                    name="nama"
                    id="nama"
                    class="w-full px-4 py-2 transition-all border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                    placeholder="Nama"
                    value="{{ old('nama') }}"
                />
                @error('nama')
                    <small class="block mt-1 text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <div>
                <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="w-full px-4 py-2 transition-all border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                    placeholder="your@email.com"
                    value="{{ old('email') }}"
                />
                @error('email')
                    <small class="block mt-1 text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <div>
                <label for="password" class="block mb-1 text-sm font-medium text-gray-700">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="w-full px-4 py-2 transition-all border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                    placeholder="••••••••"
                />
                @error('password')
                    <small class="block mt-1 text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block mb-1 text-sm font-medium text-gray-700">Confirm Password</label>
                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    class="w-full px-4 py-2 transition-all border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                    placeholder="••••••••"
                />
                @error('password_confirmation')
                    <small class="block mt-1 text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="w-full py-2.5 my-3 font-medium text-white transition-colors bg-emerald-600 rounded-lg hover:bg-emerald-700">
                    Register
                </button>
            </div>
        </form>

        <p class="mt-6 text-sm text-center text-gray-600">
            Already have an account? <a href="{{ route('login') }}" class="font-medium text-emerald-600 hover:text-emerald-500">Login here</a>.
        </p>
    </div>
</div>
</body>
</html>
