<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
     <div class="flex items-center justify-center min-h-screen p-4 bg-gray-100">
        <div class="w-full max-w-md p-8 bg-white shadow-lg rounded-xl">
            <h2 class="mb-6 text-2xl font-bold text-center text-gray-900">Login</h2>

            @if (session('failed'))
                <div class="px-4 py-3 mb-4 text-red-700 bg-red-100 border border-red-400 rounded">
                    {{session('failed')}}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
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

                {{-- <div class="flex items-center justify-between p-3">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="border-gray-300 rounded text-emerald-600 focus:ring-emerald-500"/>
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>
                    <a href="{{ route('password.request') }}" class="text-sm text-emerald-600 hover:text-emerald-500">Forgot password?</a>
                </div> --}}

                <button type="submit" class="w-full py-2.5 my-3 font-medium text-white transition-colors bg-emerald-600 rounded-lg hover:bg-emerald-700">
                    Login
                </button>
            </form>
            <a class="inline-block pt-5 text-sm font-bold text-blue-500 align-baseline hover:text-blue-800" href="#">
                    Forgot Password?
            </a>

            <div class="mt-6 text-sm text-center text-gray-600 ">
                Don't have an account?
                <a href="{{ route('register') }}" class="font-medium text-emerald-600 hover:text-emerald-500">Register</a>
            </div>
        </div>
    </div>

</body>
</html>
