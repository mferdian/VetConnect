<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
       @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    @include('layouts._navbar')

    <!-- Hero Section -->
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

    <!-- Fast Solutions -->
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

</html>
