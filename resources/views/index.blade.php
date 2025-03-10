<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - VetConnect</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
        <nav class="py-4 bg-white shadow-md">
            <div class="container flex flex-wrap items-center justify-between px-6 mx-auto">
                <!-- Logo -->
                <h1 class="text-2xl font-bold text-gray-700">Vet<span class="text-[#497D74]">Connect</span></h1>
                <button type="button" class="p-2 ml-auto text-gray-500 rounded-md md:hidden hover:bg-gray-100 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
                <ul class="flex-col hidden w-full text-gray-600 md:flex md:flex-row md:w-auto md:space-x-6 md:items-center">
                    <li><a class="block py-2 text-gray-600 hover:text-gray-800" href="{{ route('index') }}">Home</a></li>
                    <li><a class="block py-2 text-gray-600 hover:text-gray-800" href="{{ route('booking') }}">Doctors</a></li>
                    <li><a class="block py-2 text-gray-600 hover:text-gray-800" href="#">Services</a></li>
                    <li><a class="block py-2 text-gray-600 hover:text-gray-800" href="{{ route('articlePage') }}">Articles</a></li>
                </ul>
                <div class="items-center hidden gap-4 md:flex">
                    <a class="px-4 py-2 text-sm font-medium text-white transition-colors rounded-md bg-emerald-800 hover:bg-teal-700" href="{{ route('login') }}">Login</a>
                    <a class="px-4 py-2 text-sm font-medium transition-colors bg-gray-100 rounded-md text-emerald-800 hover:text-teal-600 hover:bg-gray-200" href="{{ route('signup') }}">Sign Up</a>
                </div>
            </div>
        </nav>
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
                <img src="{{ asset('images/cat.png')}}" alt="VetConnect" class="max-w-sm rounded-lg shadow-lg w-80 lg:w-full lg:max-w-lg">
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
</body>
</html>
