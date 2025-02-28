<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - VetConnect</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <!-- Navbar -->
    <header class="bg-white shadow-md">
        <div class="flex items-center h-16 max-w-screen-xl px-6 mx-auto">
            <h1 class="text-xl font-bold">Vet<span class="text-emerald-800">Connect</span></h1>
            <nav class="hidden ml-auto md:flex">
                <ul class="flex items-center gap-6 text-sm">
                    <li><a class="text-gray-600 hover:text-gray-800" href="#">Home</a></li>
                    <li><a class="text-gray-600 hover:text-gray-800" href="#">Doctor</a></li>
                    <li><a class="text-gray-600 hover:text-gray-800" href="#">Service</a></li>
                    <li><a class="text-gray-600 hover:text-gray-800" href="#">Article</a></li>
                </ul>
            </nav>
            <div class="flex items-center gap-4 ml-auto">
                <a class="px-4 py-2 text-sm font-medium text-white rounded-md bg-emerald-800 hover:bg-teal-700" href="{{ route('login') }}">Login</a>
                <a class="hidden px-4 py-2 text-sm font-medium bg-gray-100 rounded-md text-emerald-800 hover:text-teal-600 md:block" href="{{ route('signup') }}">Sign Up</a>
                <button class="p-2 bg-gray-100 rounded-md md:hidden">
                    <span class="sr-only">Toggle menu</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </header>
    <!-- Navbar End -->

    <!-- Hero Section -->
    <section class="py-32 bg-gray-100">
        <div class="flex flex-col-reverse items-center max-w-screen-xl px-6 mx-auto lg:flex-row">
            <div class="text-center lg:text-left lg:w-1/2">
                <h1 class="text-3xl font-extrabold sm:text-5xl">
                    Perawatan Hewan Lebih Mudah & Cepat!
                    <span class="block text-emerald-800">VetConnect</span>
                </h1>
                <p class="mt-4 text-lg">Reservasi Dokter Hewan & Akses Informasi Kesehatan dalam Sekejap!</p>
                <div class="flex flex-wrap justify-center gap-4 mt-8 lg:justify-start">
                    <a class="px-6 py-3 text-sm font-medium text-white rounded-md bg-emerald-800 hover:bg-emerald-600" href="#">Get Started</a>
                    <a class="px-6 py-3 text-sm font-medium bg-white border rounded-md text-emerald-800 border-emerald-800 hover:text-emerald-600" href="#">Learn More</a>
                </div>
            </div>
            <div class="flex justify-center lg:w-1/2">
                <img src="{{ asset('images/cat.png') }}" alt="VetConnect" class="max-w-sm rounded-lg shadow-lg w-80 lg:w-full lg:max-w-lg">
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
</body>
</html>
