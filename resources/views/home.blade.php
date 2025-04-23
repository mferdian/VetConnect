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
    @include('layouts._navbar')

    <!-- Home Page -->
    <section class="py-20 bg-gray-100" x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)">
        <div class="container flex flex-col items-center px-6 mx-auto lg:flex-row lg:space-x-12">
            <!-- Text Content -->
            <div class="text-center lg:text-left lg:w-1/2" x-show="show" x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0 translate-x-10" x-transition:enter-end="opacity-100 translate-x-0">
                <h1 class="text-4xl font-extrabold sm:text-5xl">
                    Perawatan Hewan Lebih Mudah & Cepat!
                    Booking Dokter di <br> <span class="text-black">Vet</span><span class="text-emerald-900">Connect</span>
                </h1>
                <p class="mt-4 text-lg text-gray-600">Reservasi Dokter Hewan & Akses Informasi Kesehatan dalam Sekejap!</p>
                <div class="flex flex-wrap justify-center gap-4 mt-8 lg:justify-start">
                    <a id="get-started-btn" href="#" class="px-6 py-3 text-sm font-medium text-white rounded-md cursor-pointer bg-emerald-800 hover:bg-emerald-600">Mulai Sekarang</a>
                </div>
            </div>

            <!-- Image -->
            <div class="mt-10 lg:mt-0 lg:w-1/2" x-show="show" x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0 translate-x-10" x-transition:enter-end="opacity-100 translate-x-0">
                <img src="{{ asset('images/cat.png') }}" alt="VetConnect" class="w-full max-w-md mx-auto rounded-lg shadow-lg lg:max-w-lg">
            </div>
        </div>
    </section>

    <script src="/script.js"></script>
    <div class="h-20"></div>

    <!-- Service Page -->
    <section id="find-doctor" class="container px-6 mx-auto mt-20">
        <div class="flex flex-col items-center lg:flex-row lg:space-x-12">
            <!-- Text Content -->
            <div class="lg:w-1/2">
                <h2 class="text-[#497D74] font-semibold">Temukan Dokter</h2>
                <h1 class="mt-2 text-4xl font-bold text-gray-800">
                   Temuka Dokter yang hewan anda butuhkan
                </h1>
                <p class="mt-4 text-gray-600">
                    VetConnect adalah aplikasi reservasi dokter hewan yang membantu reservasi dokter hewan dengan mudah, aman, dan cepat.
                </p>
                <ul class="mt-6 space-y-2">
                    <li class="flex items-center">
                        <span class="text-[#497D74] mr-2">✔</span> Temukan dokter yang sesuai denganmu
                    </li>
                    <li class="flex items-center">
                        <span class="text-[#497D74] mr-2">✔</span> Tersedia lebih dari 100 dokter terbaik
                    </li>
                </ul>
                <a href="{{ route('doctor') }}">
                    <button class="mt-6 px-6 py-3 text-white bg-[#497D74] rounded-lg hover:bg-[#3b665d]">
                        cari lebih banyak
                    </button>
                </a>
            </div>

            <!-- Image and Card -->
            <div class="relative mt-10 lg:mt-0 lg:w-1/2">
                <img src="{{ asset('images/Dr Beranda.png') }}" alt="Doctor" class="w-full max-w-md mx-auto rounded-lg">
                <div class="absolute w-48 p-4 transform translate-x-0 translate-y-0 bg-white rounded-lg shadow-lg -bottom-100 lg:-bottom-0 lg:left-43">
                    <h4 class="font-semibold text-center text-gray-700">Dokter yang tersedia</h4>
                    <div class="mt-2 space-y-2">
                        <div class="flex items-center">
                            <img src="{{ asset('images/Dr Adinda.png') }}" class="w-10 h-10 rounded-full">
                            <div class="ml-2">
                                <h5 class="text-sm font-semibold text-gray-800">Dr. Adinda</h5>
                                <p class="text-xs text-gray-600">Eye Specialist</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <img src="{{ asset('images/Dr Jackson.png') }}" class="w-10 h-10 rounded-full">
                            <div class="ml-2">
                                <h5 class="text-sm font-semibold text-gray-800">Dr. Jackson</h5>
                                <p class="text-xs text-gray-600">Ear Specialist</p>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('doctor') }}" class="w-full">
                        <button class="w-full px-4 py-2 mt-4 text-sm text-white bg-[#497D74] rounded-md hover:bg-[#3b665d]">
                            Temukan lebih banyak dokter
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Steps Section -->
    <section class="container px-6 mx-auto mt-20">
        <h3 class="text-[#497D74] text-center">Solusi Cepat</h3>
        <h2 class="mt-2 text-3xl font-bold text-center text-gray-800">Langkah Mudah Mendapatkan Solusi</h2>
        <div class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-2 lg:grid-cols-4">
            <div class="p-6 text-center transition-transform duration-300 bg-white rounded-lg shadow-lg hover:scale-105">
                <span class="text-[#497D74] text-3xl">🩺</span>
                <h4 class="mt-4 font-semibold text-gray-800">Periksa Keluhan Kesehatan</h4>
                <p class="mt-2 text-sm text-gray-600">Periksa gejala agar kamu bisa memilih spesialis yang tepat.</p>
            </div>
            <div class="p-6 text-center transition-transform duration-300 bg-white rounded-lg shadow-lg hover:scale-105">
                <span class="text-[#497D74] text-3xl">👨‍⚕️</span>
                <h4 class="mt-4 font-semibold text-gray-800">Pilih Dokter Spesialis</h4>
                <p class="mt-2 text-sm text-gray-600">Pilih spesialis sesuai keluhan hewanmu.</p>
            </div>
            <div class="p-6 text-center transition-transform duration-300 bg-white rounded-lg shadow-lg hover:scale-105">
                <span class="text-[#497D74] text-3xl">📅</span>
                <h4 class="mt-4 font-semibold text-gray-800">Buat Jadwal</h4>
                <p class="mt-2 text-sm text-gray-600">Atur jadwal dengan dokter pilihan untuk pemeriksaan.</p>
            </div>
            <div class="p-6 text-center transition-transform duration-300 bg-white rounded-lg shadow-lg hover:scale-105">
                <span class="text-[#497D74] text-3xl">✅</span>
                <h4 class="mt-4 font-semibold text-gray-800">Dapatkan Solusi</h4>
                <p class="mt-2 text-sm text-gray-600">Konsultasikan dan dapatkan metode penyembuhan terbaik.</p>
            </div>
        </div>
    </section>

    <!-- Booking Page -->
    <section class="container px-6 mx-auto mt-20">
        <div class="flex flex-col lg:flex-row lg:space-x-12">
            <!-- Left: Information -->
            <div class="lg:w-1/2">
                <h3 class="text-4xl font-bold text-gray-800">
                    Booking Dokter di <span class="text-black">Vet</span><span class="text-[#497D74]">Connect</span>
                </h3>
                <p class="mt-4 text-gray-600">Layanan Telemedisin Hewan: Siap Siaga untuk Membantu Hewan Peliharaanmu Hidup Lebih Sehat.</p>
                <img src="{{ asset('images/Booking Dokter.png') }}" alt="Doctor Illustration" class="w-full max-w-xs mx-auto mt-6">
                <h4 class="mt-6 text-xl font-bold text-gray-800">Mengapa Booking Dokter di VetConnect?</h4>
                <ul class="mt-4 space-y-3">
                    <li class="flex items-center">
                        <img src="{{ asset('images/icon1.png') }}" class="w-8 h-8 mr-2"> Kemudahan dan Kepraktisan
                    </li>
                    <li class="flex items-center">
                        <img src="{{ asset('images/icon2.png') }}" class="w-8 h-8 mr-2"> Pilihan Dokter Hewan Berpengalaman
                    </li>
                    <li class="flex items-center">
                        <img src="{{ asset('images/Icon3.png') }}" class="w-8 h-8 mr-2"> Hemat Waktu dan Tenaga
                    </li>
                </ul>
            </div>

            <!-- Right: Doctor Grid -->
            <div class="grid grid-cols-1 gap-6 mt-10 lg:mt-0 lg:w-1/2 md:grid-cols-2">
                <!-- Doctor Card 1 -->
                <div class="flex flex-col p-4 transition-transform duration-300 bg-white rounded-lg shadow-lg hover:scale-105 aspect-square">
                    <img src="{{ asset('images/Dr Jackson.png') }}" alt="Dr. Ajay Kaul" class="object-cover w-full h-48 rounded-md">
                    <div class="flex flex-col justify-between flex-grow">
                        <div>
                            <h4 class="mt-2 font-bold text-gray-800">Dr. Ajay Kaul</h4>
                            <p class="text-sm text-gray-600">Hewan Domestik & Eksotik</p>
                        </div>
                        <button class="w-full px-4 py-2 mt-4 text-sm text-[#497D74] border border-[#497D74] rounded-md hover:bg-[#497D74] hover:text-white">Consult Now</button>
                    </div>
                </div>

                <!-- Doctor Card 2 -->
                <div class="flex flex-col p-4 transition-transform duration-300 bg-white rounded-lg shadow-lg hover:scale-105 aspect-square">
                    <img src="{{ asset('images/Dr Jackson.png') }}" alt="Dr. Sarah Chen" class="object-cover w-full h-48 rounded-md">
                    <div class="flex flex-col justify-between flex-grow">
                        <div>
                            <h4 class="mt-2 font-bold text-gray-800">Dr. Sarah Chen</h4>
                            <p class="text-sm text-gray-600">Spesialis Kucing & Anjing</p>
                        </div>
                        <button class="w-full px-4 py-2 mt-4 text-sm text-[#497D74] border border-[#497D74] rounded-md hover:bg-[#497D74] hover:text-white">Consult Now</button>
                    </div>
                </div>

                <!-- Doctor Card 3 -->
                <div class="flex flex-col p-4 transition-transform duration-300 bg-white rounded-lg shadow-lg hover:scale-105 aspect-square">
                    <img src="{{ asset('images/Dr Jackson.png') }}" alt="Dr. Sarah Chen" class="object-cover w-full h-48 rounded-md">
                    <div class="flex flex-col justify-between flex-grow">
                        <div>
                            <h4 class="mt-2 font-bold text-gray-800">Dr. Sarah Chen</h4>
                            <p class="text-sm text-gray-600">Spesialis Kucing & Anjing</p>
                        </div>
                        <button class="w-full px-4 py-2 mt-4 text-sm text-[#497D74] border border-[#497D74] rounded-md hover:bg-[#497D74] hover:text-white">Consult Now</button>
                    </div>
                </div>

                <!-- Doctor Card 4 -->
                <div class="flex flex-col p-4 transition-transform duration-300 bg-white rounded-lg shadow-lg hover:scale-105 aspect-square">
                    <img src="{{ asset('images/Dr Jackson.png') }}" alt="Dr. Sarah Chen" class="object-cover w-full h-48 rounded-md">
                    <div class="flex flex-col justify-between flex-grow">
                        <div>
                            <h4 class="mt-2 font-bold text-gray-800">Dr. Sarah Chen</h4>
                            <p class="text-sm text-gray-600">Spesialis Kucing & Anjing</p>
                        </div>
                        <button class="w-full px-4 py-2 mt-4 text-sm text-[#497D74] border border-[#497D74] rounded-md hover:bg-[#497D74] hover:text-white">Consult Now</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Review Section -->
    <div class="max-w-6xl px-6 py-12 mx-auto text-center">
        <h2 class="text-2xl font-bold text-[#497D74] md:text-3xl">Apa Kata Pelanggan Kami</h2>
        <p class="mt-2 text-gray-500">Pengalaman pelanggan dengan layanan dokter hewan kami</p>

        <div class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-3">
            @forelse($reviews as $review)
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <div class="flex justify-center mb-4">
                        <span class="text-xl text-yellow-500">{{ $review->getStarRatingHtml() }}</span>
                    </div>
                    <p class="text-gray-600">{{ $review->review }}</p>
                    <div class="flex flex-col items-center mt-4">
                        @if($review->user && $review->user->profile_photo)
                            <img src="{{ asset('storage/' . $review->user->profile_photo) }}" alt="Profile Photo" class="object-cover w-8 h-8 rounded-full">
                        @elseif($review->user)
                            <div class="flex items-center justify-center w-8 h-8 text-white rounded-full bg-emerald-800">
                                {{ strtoupper(substr($review->user->name, 0, 1)) }}
                            </div>
                        @else
                            <img src="{{ asset('images/default-user.png') }}" alt="Default User" class="object-cover w-8 h-8 rounded-full">
                        @endif
                        <p class="mt-2 font-semibold text-gray-800">{{ $review->user->name }}</p>
                        <p class="text-sm text-gray-500">Untuk: Dr. {{ $review->vet->nama }}</p>
                    </div>
                </div>
            @empty
                @for($i = 0; $i < 3; $i++)
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <div class="flex justify-center mb-4">
                            <span class="text-xl text-yellow-500">★★★★{{ $i < 1 ? '★' : '☆' }}</span>
                        </div>
                        <p class="text-gray-600">VetConnect membantu saya menemukan dokter hewan terbaik untuk hewan peliharaan saya.</p>
                        <div class="flex flex-col items-center mt-4">
                            <img src="{{ asset('images/PausBeluga.png')}}" alt="User" class="w-10 h-10 rounded-full">
                            <p class="mt-2 font-semibold text-gray-800">{{ ['Sarah Johnson', 'Michael Smith', 'John Doe'][$i] }}</p>
                            <p class="text-sm text-gray-500">{{ ['Pet Owner', 'Dog Lover', 'Cat Enthusiast'][$i] }}</p>
                        </div>
                    </div>
                @endfor
            @endforelse
        </div>
    </div>


    <!-- Footer -->
    <footer class="py-10 mt-20 bg-emerald-800" x-data="{ show: false }" x-init="setTimeout(() => show = true, 500)">
        <div class="container flex flex-col px-6 mx-auto space-y-6 md:flex-row md:space-y-0 md:space-x-12" x-show="show" x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0 translate-y-10" x-transition:enter-end="opacity-100 translate-y-0">
            <div class="md:w-1/2">
                <h3 class="text-xl font-bold text-white">Vet<span class="text-white">Connect</span></h3>
                <p class="mt-2 text-white">Ingin konsultasi dengan dokter hewan? Booking online saja di <span class="font-bold">VetConnect</span>!</p>
                <div class="mt-4 space-y-2 text-sm text-white">
                    <p>📍 Lokasi: Jl. Kesehatan No.10, Jakarta</p>
                    <p>📧 Email: support@vetconnect.com</p>
                    <p>📞 WhatsApp: +62 812-3456-7890</p>
                </div>
            </div>
            <div class="md:w-1/2">
                <h4 class="text-lg font-bold text-white">🔗 Ingin Jadi Mitra Kami? 🎁🐾</h4>
                <p class="mt-2 text-sm text-white">Gabung dan jadi bagian dari layanan kesehatan hewan terbaik! Masukkan emailmu, kami akan kirim form-nya.</p>
                <div class="flex mt-4">
                    <input type="email" placeholder="Masukkan Email Kamu" class="w-full px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none">
                    <button class="px-6 py-2 text-white bg-[#497D74] rounded-r-md hover:bg-[#3b665d]">Gabung</button>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll Script -->
</body>
</html>
