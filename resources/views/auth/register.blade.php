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

        <!-- Success Alert (jika ada flash message) -->
        @if(session('success'))
        <div id="success-alert" class="p-4 mb-6 text-green-700 bg-green-100 border border-green-400 rounded-lg">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block mb-1 text-sm font-medium text-gray-700">Nama</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="w-full px-4 py-2 transition-all border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                    placeholder="Nama"
                    value="{{ old('name') }}"
                />
                @error('name')
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

<!-- Success Modal -->
<div id="success-modal" class="fixed inset-0 z-50 items-center justify-center hidden">
    <div class="fixed inset-0 bg-black opacity-50"></div>
    <div class="relative z-10 p-6 mx-4 bg-white rounded-lg shadow-lg w-80">
        <div class="flex flex-col items-center justify-center">
            <div class="flex items-center justify-center w-16 h-16 mb-4 rounded-full bg-emerald-100">
                <svg class="w-10 h-10 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h3 class="mb-4 text-lg font-medium text-center">Akun berhasil dibuat!</h3>
            <p class="mb-6 text-sm text-center text-gray-600">Silahkan kembali ke login</p>
            <a href="{{ route('login') }}" class="w-full py-2 text-center text-white rounded-lg bg-emerald-600 hover:bg-emerald-700">Login</a>
        </div>
    </div>
</div>

<script>
    // Check if there's a success parameter in the URL
    document.addEventListener('DOMContentLoaded', function() {
        // Show success modal if registration was successful (via URL param)
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('registered')) {
            document.getElementById('success-modal').classList.remove('hidden');
        }

        // Auto show modal jika register form dikirim dengan success
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            // Ini akan ditampilkan hanya jika form valid
            if (form.checkValidity()) {
                localStorage.setItem('registration_success', 'true');
            }
        });
    });
</script>
</body>
</html>
