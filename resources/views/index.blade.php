<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    {{-- navbar --}}
<header class="bg-white">
  <div class="flex items-center h-16 max-w-screen-xl gap-8 px-4 m-5 sm:px-6 lg:px-8">
    <div class="flex items-center justify-end flex-1 md:justify-between">
      <nav aria-label="Global" class="hidden md:block">
        <ul class="flex items-center gap-6 text-sm">
         <h1 class="text-xl font-bold">Vet<span class="text-emerald-800">Connect</span></h1>
          <li>
            <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Home </a>
          </li>

          <li>
            <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Doctor </a>
          </li>

          <li>
            <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Service </a>
          </li>

          <li>
            <a class="text-gray-500 transition hover:text-gray-500/75" href="#"> Article </a>
          </li>
        </ul>
      </nav>

      <div class="flex items-center gap-4">
        <div class="sm:flex sm:gap-4">
          <a
            class="block rounded-md bg-emerald-800 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-teal-700"
            href="{{ route('login')}}"
          >
            Login
          </a>

          <a
            class="hidden rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-teal-600 transition hover:text-teal-600/75 sm:block"
            href="{{ route('signup')}}"
          >
            Sign Up
          </a>
        </div>

        {{-- After Login --}}

        {{-- After Login End --}}
        <button
          class="block rounded-sm bg-gray-100 p-2.5 text-gray-600 transition hover:text-gray-600/75 md:hidden"
        >
          <span class="sr-only">Toggle menu</span>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="size-5"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
          >
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
    </div>
  </div>
  <hr class="bg-blend-color">
</header>
{{-- navbar END --}}


{{-- Content --}}
<div class="grid grid-cols-1 gap-4 m-5 lg:grid-cols-3 lg:gap-8">
  <div class=" lg:col-span-2">
        <section class="">
        <div class="max-w-screen-xl px-4 py-32 mx-auto lg:flex lg:h-screen lg:items-center">
            <div class="max-w-xl mx-auto text-center">
            <h1 class="text-3xl font-extrabold sm:text-5xl">
                Perawatan Hewan Lebih Mudah & Cepat!
                <strong class="font-extrabold text-emerald-800 sm:block">VetConnect</strong>
            </h1>

            <p class="mt-4 sm:text-xl/relaxed">
                Reservasi Dokter Hewan & Akses Informasi Kesehatan dalam Sekejap!"
            </p>

            <div class="flex flex-wrap justify-center gap-4 mt-8">
                <a
                class="block w-full px-12 py-3 text-sm font-medium text-white rounded-md shadow-sm bg-emerald-800 hover:bg-emerald-600 focus:ring-3 focus:outline-hidden sm:w-auto"
                href="#"
                >
                Get Started
                </a>

                <a
                class="block w-full px-12 py-3 text-sm font-medium rounded-sm shadow-sm text-emerald-800 hover:text-emerald-500 focus:ring-3 focus:outline-hidden sm:w-auto"
                href="#"
                >
                Learn More
                </a>
            </div>
            </div>
        </div>
        </section>

  </div>
  <div class="">
    <section class="relative flex items-end h-12 mt-10 overflow-hidden bg-gray-900 rounded-full lg:col-span-5 lg:h-full xl:col-span-6">
    <img
        alt=""
        src="{{ asset('images/cat.png') }}"
        class="absolute inset-0 object-cover w-full h-full opacity-80"
    />

    <div class="hidden lg:relative lg:block lg:p-12"></div>
    </section>


  </div>
</div>

{{-- Content End --}}
</html>
