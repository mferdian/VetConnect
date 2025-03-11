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
    <!--  Home Page End -->

    <!-- Service Page-->
    <section class="container flex items-center px-6 mx-auto mt-12">
        <div class="w-1/2">
            <h2 class="text-[#497D74] font-semibold">Find Doctor</h2>
            <h1 class="text-4xl font-bold leading-snug text-gray-800">
                Find the right doctor according to your complaint
            </h1>
            <p class="mt-4 text-gray-600">
                VetConnect is a pet healthcare app that goes beyond just matching you with veterinarians. It actively helps you find the right vet based on your pet's medical needs and your personal preferences, connecting you with the VetConnect community for ongoing support throughout your journey to better pet care.
            </p>
            <ul class="mt-4">
                <li class="flex items-center"><span class="text-[#497D74] mr-2">✔</span> Find the right doctor for you.</li>
                <li class="flex items-center"><span class="text-[#497D74] mr-2">✔</span> Available 900 doctor specialists.</li>
            </ul>
            <button class="bg-[#497D74] text-white px-6 py-3 rounded-lg mt-6">See the Doctors</button>
        </div>
        <div class="relative w-1/2">
            <img src="{{ asset('images/Dr Beranda.png') }}" class="w-3/4 mx-auto transform translate-y-5 rounded-lg translate-x-43">
            <div class="absolute w-48 p-4 transform -translate-x-1/2 bg-white rounded-lg shadow-lg top-20 left-3/8">
                <h4 class="font-semibold text-center text-gray-700">Available Doctors</h4>
                <div class="flex items-center mt-2">
                    <img src="{{ asset('images/Dr Adinda.png') }}" class="object-cover w-10 h-10 rounded-full">
                    <div class="ml-2">
                        <h5 class="text-sm font-semibold text-gray-800">Dr. Adinda</h5>
                        <p class="text-xs text-gray-600">Eye Specialist</p>
                    </div>
                </div>
                <div class="flex items-center mt-2">
                    <img src="{{ asset('images/Dr Jackson.png') }}" class="object-cover w-10 h-10 rounded-full">
                    <div class="ml-2">
                        <h5 class="text-sm font-semibold text-gray-800">Dr. Jackson</h5>
                        <p class="text-xs text-gray-600">Ear Specialist</p>
                    </div>
                </div>
                <button class="bg-[#497D74] text-white text-sm px-4 py-2 mt-4 rounded-md w-full">Find Doctor</button>
            </div>
        </div>
    </section>


    <section class="container px-6 mx-auto mt-12">
        <h3 class="text-[#497D74] text-center">Fast Solutions</h3>
        <h2 class="text-3xl font-bold text-center text-gray-800">Step by step to get your solutions</h2>
        <div class="grid grid-cols-4 gap-6 mt-8">
            <!-- Card 1 -->
            <div class="relative p-6 text-center bg-white rounded-lg shadow-lg">
                <div class="absolute top-0 left-0 w-full h-1 bg-[#497D74] rounded-t-lg"></div>
                <span class="text-[#497D74] text-3xl">🩺</span>
                <h4 class="mt-4 font-semibold text-gray-800">Check health complaints</h4>
                <p class="mt-2 text-sm text-gray-600">Check the diseases so you can easily choose the right specialist.</p>
            </div>

            <!-- Card 2 -->
            <div class="relative p-6 text-center bg-white rounded-lg shadow-lg">
                <div class="absolute top-0 left-0 w-full h-1 bg-[#497D74] rounded-t-lg"></div>
                <span class="text-[#497D74] text-3xl">👨‍⚕️</span>
                <h4 class="mt-4 font-semibold text-gray-800">Choose doctor specialist</h4>
                <p class="mt-2 text-sm text-gray-600">Choose a specialist according to your disease complaints.</p>
            </div>

            <!-- Card 3 -->
            <div class="relative p-6 text-center bg-white rounded-lg shadow-lg">
                <div class="absolute top-0 left-0 w-full h-1 bg-[#497D74] rounded-t-lg"></div>
                <span class="text-[#497D74] text-3xl">📅</span>
                <h4 class="mt-4 font-semibold text-gray-800">Make a Schedule</h4>
                <p class="mt-2 text-sm text-gray-600">Make a schedule with the doctor concerned so you can start the examination.</p>
            </div>

            <!-- Card 4 -->
            <div class="relative p-6 text-center bg-white rounded-lg shadow-lg">
                <div class="absolute top-0 left-0 w-full h-1 bg-[#497D74] rounded-t-lg"></div>
                <span class="text-[#497D74] text-3xl">✅</span>
                <h4 class="mt-4 font-semibold text-gray-800">Get your solutions</h4>
                <p class="mt-2 text-sm text-gray-600">After conducting an examination with a specialist we can help find the right healing method.</p>
            </div>
        </div>
    </section>
    {{-- Service Page END --}}


    {{-- Booking Page --}}
        <section class="container flex flex-col px-6 mx-auto mt-12 md:flex-row">
        <!-- Bagian Kiri: Informasi -->
        <div class="pr-8 md:w-1/2">
            <h3 class="text-4xl font-bold text-black">
                Booking Dokter di <span class="text-black">Vet</span><span class="text-[#497D74]">Connect</span>
            </h3>
            <p class="mt-2 text-center text-gray-600">Layanan Telemedisin Hewan: Siap Siaga untuk Membantu Hewan Peliharaanmu Hidup Lebih Sehat.</p>

            <!-- Gambar Ilustrasi -->
            <img src="{{ asset('images/Booking Dokter.png') }}" alt="Dokter Ilustrasi" class="relative w-40 mx-auto mt-4 transform md:w-52 lg:w-64 md:ml-40 lg:mr-20">

            <p class="mt-2 text-center text-gray-600">Pilih dokter berpengalaman dan booking sekarang</p>

            <h4 class="mt-6 text-xl font-bold">
                Mengapa Booking Dokter di <span class="text-black">Vet</span><span class="text-[#497D74]">Connect</span>?
            </h4>
            <ul class="mt-4 space-y-3">
                <li class="flex items-center">
                    <img src="{{ asset('images/icon1.png') }}" class="mr-2 w-9 h-9"> Kemudahan dan Kepraktisan
                </li>
                <li class="flex items-center">
                    <img src="{{ asset('images/icon2.png') }}" class="mr-2 w-9 h-9"> Pilihan Dokter Hewan Berpengalaman
                </li>
                <li class="flex items-center">
                    <img src="{{ asset('images/Icon3.png') }}" class="mr-2 w-9 h-9"> Hemat Waktu dan Tenaga
                </li>
            </ul>
        </div>

        <!-- Grid Dokter -->
        <div class="grid w-1/2 grid-cols-1 gap-6 mx-auto md:w-2/3 lg:w-1/2 md:grid-cols-2 lg:grid-cols-3">
            <!-- Kartu Dokter -->
            <div class="flex flex-col h-full p-4 bg-white rounded-lg shadow-md">
                <img src="{{ asset('images/Dr Jackson.png') }}" alt="Dr. Ajay Kaul" class="object-cover w-full h-40 rounded-md">
                <h4 class="mt-2 font-bold text-gray-800">Dr. Ajay Kaul</h4>
                <p class="text-sm text-gray-600">Hewan Domestik & Eksotik</p>
                <button class="border border-[#497D74] text-[#497D74] w-full py-2 rounded-md mt-auto">Consult Now</button>
            </div>

            <div class="flex flex-col h-full p-4 bg-white rounded-lg shadow-md">
                <img src="{{ asset('images/Dr Adinda.png') }}" alt="Dr. Naresh Terhan" class="object-cover w-full h-40 rounded-md">
                <h4 class="mt-2 font-bold text-gray-800">Dr. Naresh Terhan</h4>
                <p class="text-sm text-gray-600">Anjing & Kucing, Hewan Domestik</p>
                <button class="border border-[#497D74] text-[#497D74] w-full py-2 rounded-md mt-auto">Consult Now</button>
            </div>

            <div class="flex flex-col h-full p-4 bg-white rounded-lg shadow-md">
                <img src="{{ asset('images/Dr Jackson.png') }}" alt="Dr. Vinod Raina" class="object-cover w-full h-40 rounded-md">
                <h4 class="mt-2 font-bold text-gray-800">Dr. Vinod Raina</h4>
                <p class="text-sm text-gray-600">Anjing & Kucing, Hewan Ternak</p>
                <button class="border border-[#497D74] text-[#497D74] w-full py-2 rounded-md mt-auto">Consult Now</button>
            </div>

            <!-- Duplikasi Kartu Dokter -->
            <div class="flex flex-col h-full p-4 bg-white rounded-lg shadow-md">
                <img src="{{ asset('images/Dr Adinda.png') }}" alt="Dr. Ajay Kaul" class="object-cover w-full h-40 rounded-md">
                <h4 class="mt-2 font-bold text-gray-800">Dr. Ajay Kaul</h4>
                <p class="text-sm text-gray-600">Hewan Domestik & Eksotik</p>
                <button class="border border-[#497D74] text-[#497D74] w-full py-2 rounded-md mt-auto">Consult Now</button>
            </div>

            <div class="flex flex-col h-full p-4 bg-white rounded-lg shadow-md">
                <img src="{{ asset('images/Dr Jackson.png') }}" alt="Dr. Naresh Terhan" class="object-cover w-full h-40 rounded-md">
                <h4 class="mt-2 font-bold text-gray-800">Dr. Naresh Terhan</h4>
                <p class="text-sm text-gray-600">Anjing & Kucing, Hewan Domestik</p>
                <button class="border border-[#497D74] text-[#497D74] w-full py-2 rounded-md mt-auto">Consult Now</button>
            </div>

            <div class="flex flex-col h-full p-4 bg-white rounded-lg shadow-md">
                <img src="{{ asset('images/Dr Adinda.png') }}" alt="Dr. Vinod Raina" class="object-cover w-full h-40 rounded-md">
                <h4 class="mt-2 font-bold text-gray-800">Dr. Vinod Raina</h4>
                <p class="text-sm text-gray-600">Anjing & Kucing, Hewan Ternak</p>
                <button class="border border-[#497D74] text-[#497D74] w-full py-2 rounded-md mt-auto">Consult Now</button>
            </div>
        </div>
    </section>
    {{-- Booking Page END --}}
</body>

{{-- Footer  --}}
<footer class="py-6 mt-10 bg-gray-100">
    <div class="flex flex-col items-center justify-between max-w-6xl px-6 mx-auto md:flex-row">
        <!-- Kiri: Info -->
        <div class="text-left">
            <h3 class="text-xl font-bold text-gray-800">Vet<span class="text-[#497D74]">Connect</span></h3>
            <p class="mt-2 font-medium text-gray-700">
                Want to consult a vet? Just book online at <span class="font-bold">VetConnect</span>!
            </p>
            <div class="mt-3 space-y-2 text-sm text-gray-600">
                <p>📍 Location: Jl. Kesehatan No.10, Jakarta</p>
                <p>📧 Email: support@vetconnect.com</p>
                <p>📞 WhatsApp: +62 812-3456-7890</p>
            </div>
        </div>

        <!-- Kanan: Partner Form -->
        <div class="mt-6 text-center md:mt-0 md:text-left">
            <h4 class="text-lg font-bold text-gray-800">
                🔗 Want to be our partner? 🎁🐾
            </h4>
            <p class="text-sm text-gray-600">
                Join us and be part of the best animal health service! ✨
                Enter your email and we will send you a form.
            </p>
            <div class="flex mt-3">
                <input type="email" placeholder="Enter Your E-mail"
                    class="px-4 py-2 border border-gray-300 w-60 rounded-l-md focus:outline-none">
                <button class="bg-[#497D74] text-white px-4 py-2 rounded-r-md hover:bg-[#3b665d]">
                    Join
                </button>
            </div>
        </div>
    </div>

    <!-- Copyright & Social Media -->
    <div class="relative mt-6">
        <div class="flex items-center justify-between px-40 pt-6 border-t border-gray-300">
            <!-- Kiri: Copyright -->
            <p class="text-sm text-gray-600 movable">© 2025 VetConnect - Your Pet’s Loyal Friend!</p>

            <!-- Kanan: Social Media -->
            <div class="flex space-x-4 movable">
                <a href="#"><img src="{{ asset('images/Instagram.png') }}" alt="Instagram" class="w-6 h-6"></a>
                <a href="#"><img src="{{ asset('images/Facebook.png') }}" alt="Facebook" class="w-6 h-6"></a>
                <a href="#"><img src="{{ asset('images/Whatsapp.png') }}" alt="WhatsApp" class="w-6 h-6"></a>
                <a href="#"><img src="{{ asset('images/Twitter.png') }}" alt="Twitter" class="w-6 h-6"></a>
            </div>
        </div>
    </div>
</footer>
</html>
