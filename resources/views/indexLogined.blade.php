<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow-md py-4">
        <div class="container mx-auto flex justify-between items-center px-6">
            <h1 class="text-2xl font-bold text-gray-700">Vet<span class="text-[#497D74]">Connect</span></h1>
            <ul class="flex space-x-6 text-gray-600">
                <li><a href="DetailArticle.html" class="hover:text-[#497D74]">Home</a></li>
                <li><a href="BookingPage.html" class="hover:text-[#497D74]">Services</a></li>
                <li><a href="Booking.html" class="hover:text-[#497D74]">Doctor</a></li>
                <li><a href="ArticlePage.html" class="text-[#497D74] font-semibold">Article</a></li>
            </ul>
            <button class="flex items-center bg-white border px-4 py-2 rounded-full shadow-md">
                <span>Gunawan Wibisono | 19</span>
                <img src="Gunawan.png" class="ml-2 w-8 h-8 rounded-full">
            </button>
            
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="container mx-auto mt-12 px-6 flex items-center">
        <div class="w-1/2">
            <h2 class="text-[#497D74] font-semibold">Find Doctor</h2>
            <h1 class="text-4xl font-bold text-gray-800 leading-snug">
                Find the right doctor according to your complaint
            </h1>
            <p class="text-gray-600 mt-4">
                VetConnect is a pet healthcare app that goes beyond just matching you with veterinarians. It actively helps you find the right vet based on your pet's medical needs and your personal preferences, connecting you with the VetConnect community for ongoing support throughout your journey to better pet care.
            </p>
            <ul class="mt-4">
                <li class="flex items-center"><span class="text-[#497D74] mr-2">✔</span> Find the right doctor for you.</li>
                <li class="flex items-center"><span class="text-[#497D74] mr-2">✔</span> Available 900 doctor specialists.</li>
            </ul>
            <button class="bg-[#497D74] text-white px-6 py-3 rounded-lg mt-6">See the Doctors</button>
        </div>
        <div class="w-1/2 relative">
            <img src="Dr Beranda.png" class="w-3/4 mx-auto rounded-lg transform translate-x-43 translate-y-5">
            <div class="absolute top-20 left-3/8 transform -translate-x-1/2 bg-white shadow-lg rounded-lg p-4 w-48">
                <h4 class="font-semibold text-gray-700 text-center">Available Doctors</h4>
                <div class="flex items-center mt-2">
                    <img src="Dr Adinda.png" class="w-10 h-10 rounded-full object-cover">
                    <div class="ml-2">
                        <h5 class="text-sm font-semibold text-gray-800">Dr. Adinda</h5>
                        <p class="text-xs text-gray-600">Eye Specialist</p>
                    </div>
                </div>
                <div class="flex items-center mt-2">
                    <img src="Dr Jackson.png" class="w-10 h-10 rounded-full object-cover">
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
    <section class="container mx-auto mt-12 px-6">
        <h3 class="text-[#497D74] text-center">Fast Solutions</h3>
        <h2 class="text-3xl font-bold text-gray-800 text-center">Step by step to get your solutions</h2>
        <div class="grid grid-cols-4 gap-6 mt-8">
            <!-- Card 1 -->
            <div class="bg-white shadow-lg rounded-lg p-6 text-center relative">
                <div class="absolute top-0 left-0 w-full h-1 bg-[#497D74] rounded-t-lg"></div>
                <span class="text-[#497D74] text-3xl">🩺</span>
                <h4 class="font-semibold text-gray-800 mt-4">Check health complaints</h4>
                <p class="text-gray-600 text-sm mt-2">Check the diseases so you can easily choose the right specialist.</p>
            </div>
    
            <!-- Card 2 -->
            <div class="bg-white shadow-lg rounded-lg p-6 text-center relative">
                <div class="absolute top-0 left-0 w-full h-1 bg-[#497D74] rounded-t-lg"></div>
                <span class="text-[#497D74] text-3xl">👨‍⚕️</span>
                <h4 class="font-semibold text-gray-800 mt-4">Choose doctor specialist</h4>
                <p class="text-gray-600 text-sm mt-2">Choose a specialist according to your disease complaints.</p>
            </div>
    
            <!-- Card 3 -->
            <div class="bg-white shadow-lg rounded-lg p-6 text-center relative">
                <div class="absolute top-0 left-0 w-full h-1 bg-[#497D74] rounded-t-lg"></div>
                <span class="text-[#497D74] text-3xl">📅</span>
                <h4 class="font-semibold text-gray-800 mt-4">Make a Schedule</h4>
                <p class="text-gray-600 text-sm mt-2">Make a schedule with the doctor concerned so you can start the examination.</p>
            </div>
    
            <!-- Card 4 -->
            <div class="bg-white shadow-lg rounded-lg p-6 text-center relative">
                <div class="absolute top-0 left-0 w-full h-1 bg-[#497D74] rounded-t-lg"></div>
                <span class="text-[#497D74] text-3xl">✅</span>
                <h4 class="font-semibold text-gray-800 mt-4">Get your solutions</h4>
                <p class="text-gray-600 text-sm mt-2">After conducting an examination with a specialist we can help find the right healing method.</p>
            </div>
        </div>
    </section>
    
</html>
