<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VetConnect - Cari Dokter</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    @include('layouts._navbar')

    <!-- Container -->
    <div class="max-w-5xl mx-auto py-10">
        <!-- Search Section -->
        <div class="bg-white p-5 rounded-lg shadow-md">
            <div class="grid grid-cols-3 gap-4">
                <input type="text" placeholder="Set your location" class="border p-2 rounded w-full">
                <input type="text" placeholder="Ex. Doctor, Hospital" class="border p-2 rounded w-full">
                <button class="bg-green-700 text-white px-4 py-2 rounded">Search</button>
            </div>
            <div class="flex mt-4 space-x-4">
                <select class="border p-2 rounded w-full">
                    <option>Availability</option>
                </select>
                <select class="border p-2 rounded w-full">
                    <option>Filter</option>
                </select>
                <select class="border p-2 rounded w-full">
                    <option>Sort By: Relevance</option>
                </select>
            </div>
        </div>

        <!-- Doctors List -->
        <h2 class="text-xl font-bold mt-6">Available Doctor</h2>
        <p class="text-gray-600">Book appointments with minimum wait-time & verified doctor details</p>

        <!-- Doctor Card -->
        <div class="mt-6 space-y-6">
            <!-- Doctor -->
            <div class="bg-white p-6 rounded-lg shadow-md flex items-start">
                <img src="images/Dr Beranda.png" alt="Doctor" class="w-30 h-40 rounded-full">
                <div class="ml-4 flex-1">
                    <h3 class="text-lg font-bold text-green-700">Dr. Usman Ademola</h3>
                    <p class="text-gray-600">Vet</p>
                    <p class="text-gray-500 text-sm">16 years experience overall</p>
                    <p class="text-gray-600 font-semibold">Surabaya, Jawa Timur</p>
                    <p class="text-green-700 font-bold mt-2" >Rp80.000</span></p>
                    <div class="flex items-center space-x-2 mt-2">
                        <span class="bg-green-600 text-white px-2 py-1 text-sm rounded">99%</span>
                        <span class="text-gray-600 text-sm">93 Patient Stories</span>
                    </div>
                    <p class="text-green-600 font-bold mt-2">Available Today</p>
                </div>
                <a href="{{ route('booking.detail') }}" class="bg-green-700 text-white px-4 py-2 rounded">Book</a>
            </div>

            <!-- Doctor (Duplicate for multiple entries) -->
            <div class="bg-white p-6 rounded-lg shadow-md flex items-start">
                <img src="images/Dr Beranda.png" alt="Doctor" class="w-30 h-40 rounded-full">
                <div class="ml-4 flex-1">
                    <h3 class="text-lg font-bold text-green-700">Dr. Shantanu Jambhekar</h3>
                    <p class="text-gray-600">Dr Kucing</p>
                    <p class="text-gray-500 text-sm">16 years experience overall</p>
                    <p class="text-gray-600 font-semibold">Surabaya, Jawa Timur</p>
                    <p class="text-green-700 font-bold mt-2" >Rp50.000</span></p>
                    <div class="flex items-center space-x-2 mt-2">
                        <span class="bg-green-600 text-white px-2 py-1 text-sm rounded">99%</span>
                        <span class="text-gray-600 text-sm">93 Patient Stories</span>
                    </div>
                    <p class="text-green-600 font-bold mt-2">Available Today</p>
                </div>
                <button class="bg-green-700 text-white px-4 py-2 rounded">Book</button>
            </div>
            <!-- Doctor (Duplicate for multiple entries) -->
            <div class="bg-white p-6 rounded-lg shadow-md flex items-start">
                <img src="images/Dr Beranda.png" alt="Doctor" class="w-30 h-40 rounded-full">
                <div class="ml-4 flex-1">
                    <h3 class="text-lg font-bold text-green-700">Dr. Shantanu Jambhekar</h3>
                    <p class="text-gray-600">Dr Kucing</p>
                    <p class="text-gray-500 text-sm">16 years experience overall</p>
                    <p class="text-gray-600 font-semibold">Surabaya, Jawa Timur</p>
                    <p class="text-green-700 font-bold mt-2" >Rp50.000</span></p>
                    <div class="flex items-center space-x-2 mt-2">
                        <span class="bg-green-600 text-white px-2 py-1 text-sm rounded">99%</span>
                        <span class="text-gray-600 text-sm">93 Patient Stories</span>
                    </div>
                    <p class="text-green-600 font-bold mt-2">Available Today</p>
                </div>
                <button class="bg-green-700 text-white px-4 py-2 rounded">Book</button>
            </div>            
            <!-- Doctor (Duplicate for multiple entries) -->
            <div class="bg-white p-6 rounded-lg shadow-md flex items-start">
                <img src="images/Dr Beranda.png" alt="Doctor" class="w-30 h-40 rounded-full">
                <div class="ml-4 flex-1">
                    <h3 class="text-lg font-bold text-green-700">Dr. Shantanu Jambhekar</h3>
                    <p class="text-gray-600">Dr Kucing</p>
                    <p class="text-gray-500 text-sm">16 years experience overall</p>
                    <p class="text-gray-600 font-semibold">Surabaya, Jawa Timur</p>
                    <p class="text-green-700 font-bold mt-2" >Rp50.000</span></p>
                    <div class="flex items-center space-x-2 mt-2">
                        <span class="bg-green-600 text-white px-2 py-1 text-sm rounded">99%</span>
                        <span class="text-gray-600 text-sm">93 Patient Stories</span>
                    </div>
                    <p class="text-green-600 font-bold mt-2">Available Today</p>
                </div>
                <button class="bg-green-700 text-white px-4 py-2 rounded">Book</button>
            </div>
            <!-- Doctor (Duplicate for multiple entries) -->
            <div class="bg-white p-6 rounded-lg shadow-md flex items-start">
                <img src="images/Dr Beranda.png" alt="Doctor" class="w-30 h-40 rounded-full">
                <div class="ml-4 flex-1">
                    <h3 class="text-lg font-bold text-green-700">Dr. Shantanu Jambhekar</h3>
                    <p class="text-gray-600">Dr Kucing</p>
                    <p class="text-gray-500 text-sm">16 years experience overall</p>
                    <p class="text-gray-600 font-semibold">Surabaya, Jawa Timur</p>
                    <p class="text-green-700 font-bold mt-2" >Rp50.000</span></p>
                    <div class="flex items-center space-x-2 mt-2">
                        <span class="bg-green-600 text-white px-2 py-1 text-sm rounded">99%</span>
                        <span class="text-gray-600 text-sm">93 Patient Stories</span>
                    </div>
                    <p class="text-green-600 font-bold mt-2">Available Today</p>
                </div>
                <button class="bg-green-700 text-white px-4 py-2 rounded">Book</button>
            </div>

</body>
</html>
