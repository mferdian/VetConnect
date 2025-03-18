<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - VetConnect</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
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
                <a id="get-started-btn" href="#" class="px-6 py-3 text-sm font-medium text-white rounded-md cursor-pointer bg-emerald-800 hover:bg-emerald-600">Get Started</a>
                <section id="service" class="py-5 bg-white">
                        <!-- Isi section service -->
</section>

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
<section id="service" class="py-5 bg-gray-100">
    <!-- Isi section service -->
</section>


    <!-- Service Page -->
    <section id="find-doctor" class="container px-6 mx-auto mt-20">
        <div class="flex flex-col items-center lg:flex-row lg:space-x-12">
            <!-- Text Content -->
            <div class="lg:w-1/2">
                <h2 class="text-[#497D74] font-semibold">Find Doctor</h2>
                <h1 class="mt-2 text-4xl font-bold text-gray-800">
                    Find the Right Doctor for Your Pet's Needs
                </h1>
                <p class="mt-4 text-gray-600">
                    VetConnect is a pet healthcare app that goes beyond just matching you with veterinarians. It actively helps you find the right vet based on your pet's medical needs and your personal preferences.
                </p>
                <ul class="mt-6 space-y-2">
                    <li class="flex items-center">
                        <span class="text-[#497D74] mr-2">✔</span> Find the right doctor for you.
                    </li>
                    <li class="flex items-center">
                        <span class="text-[#497D74] mr-2">✔</span> Available 900+ doctor specialists.
                    </li>
                </ul>
                <button class="mt-6 px-6 py-3 text-white bg-[#497D74] rounded-lg hover:bg-[#3b665d]">See the Doctors</button>
            </div>
<!-- JavaScript untuk Scroll -->
<script>
document.getElementById("get-started-btn").addEventListener("click", function(event) {
    event.preventDefault();

    setTimeout(() => {
        const target = document.getElementById("find-doctor");
        const offset = target.getBoundingClientRect().top + window.scrollY - 20; // Sesuaikan offset jika perlu

        window.scrollTo({
            top: offset,
            behavior: "smooth"
        });
    }, 100);
});
</script>


</body>
</html>
            <!-- Image and Card -->
            <div class="relative mt-10 lg:mt-0 lg:w-1/2">
                <img src="{{ asset('images/Dr Beranda.png') }}" alt="Doctor" class="w-full max-w-md mx-auto rounded-lg">
                <div class="absolute w-48 p-4 transform translate-x-0 translate-y-0 bg-white rounded-lg shadow-lg -bottom-100 lg:-bottom-0 lg:left-43">
                    <h4 class="font-semibold text-center text-gray-700">Available Doctors</h4>
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
                    <button class="w-full px-4 py-2 mt-4 text-sm text-white bg-[#497D74] rounded-md hover:bg-[#3b665d]">Find Doctor</button>
                </div>
            </div>
        </div>
    </section>

     <!-- Steps Section -->
    <section class="container px-6 mx-auto mt-20">
        <h3 class="text-[#497D74] text-center">Fast Solutions</h3>
        <h2 class="mt-2 text-3xl font-bold text-center text-gray-800">Step-by-Step to Get Your Solutions</h2>
        <div class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-2 lg:grid-cols-4">
            <!-- Card 1 -->
            <div class="p-6 text-center transition-transform duration-300 bg-white rounded-lg shadow-lg hover:scale-105">
                <span class="text-[#497D74] text-3xl">🩺</span>
                <h4 class="mt-4 font-semibold text-gray-800">Check Health Complaints</h4>
                <p class="mt-2 text-sm text-gray-600">Check the diseases so you can easily choose the right specialist.</p>
            </div>
            <!-- Card 2 -->
            <div class="p-6 text-center transition-transform duration-300 bg-white rounded-lg shadow-lg hover:scale-105">
                <span class="text-[#497D74] text-3xl">👨‍⚕️</span>
                <h4 class="mt-4 font-semibold text-gray-800">Choose Doctor Specialist</h4>
                <p class="mt-2 text-sm text-gray-600">Choose a specialist according to your disease complaints.</p>
            </div>
            <!-- Card 3 -->
            <div class="p-6 text-center transition-transform duration-300 bg-white rounded-lg shadow-lg hover:scale-105">
                <span class="text-[#497D74] text-3xl">📅</span>
                <h4 class="mt-4 font-semibold text-gray-800">Make a Schedule</h4>
                <p class="mt-2 text-sm text-gray-600">Make a schedule with the doctor concerned so you can start the examination.</p>
            </div>
            <!-- Card 4 -->
            <div class="p-6 text-center transition-transform duration-300 bg-white rounded-lg shadow-lg hover:scale-105">
                <span class="text-[#497D74] text-3xl">✅</span>
                <h4 class="mt-4 font-semibold text-gray-800">Get Your Solutions</h4>
                <p class="mt-2 text-sm text-gray-600">After conducting an examination with a specialist, we can help find the right healing method.</p>
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
            <!-- Doctor Card -->
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

            <!-- You can add more doctor cards here -->
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
    </div>
    </section>

    <!-- Footer -->
    <footer class="py-10 mt-20 bg-gray-100" x-data="{ show: false }" x-init="setTimeout(() => show = true, 500)">
    <div class="container flex flex-col px-6 mx-auto space-y-6 md:flex-row md:space-y-0 md:space-x-12" x-show="show" x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0 translate-y-10" x-transition:enter-end="opacity-100 translate-y-0">
        <!-- Left: Info -->
        <div class="md:w-1/2">
            <h3 class="text-xl font-bold text-gray-800">Vet<span class="text-[#497D74]">Connect</span></h3>
            <p class="mt-2 text-gray-600">Want to consult a vet? Just book online at <span class="font-bold">VetConnect</span>!</p>
            <div class="mt-4 space-y-2 text-sm text-gray-600">
                <p>📍 Location: Jl. Kesehatan No.10, Jakarta</p>
                <p>📧 Email: support@vetconnect.com</p>
                <p>📞 WhatsApp: +62 812-3456-7890</p>
            </div>
        </div>
        <!-- Right: Partner Form -->
        <div class="md:w-1/2">
            <h4 class="text-lg font-bold text-gray-800">🔗 Want to be our partner? 🎁🐾</h4>
            <p class="mt-2 text-sm text-gray-600">Join us and be part of the best animal health service! Enter your email, and we will send you a form.</p>
            <div class="flex mt-4">
                <input type="email" placeholder="Enter Your E-mail" class="w-full px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none">
                <button class="px-6 py-2 text-white bg-[#497D74] rounded-r-md hover:bg-[#3b665d]">Join</button>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
