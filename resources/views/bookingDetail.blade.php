<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Appointment - VetConnect</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    @include('layouts._navbar')

    <!-- Main Content -->
    <section class="container flex flex-col gap-8 px-6 mx-auto mt-12 md:flex-row">

        <!-- Pilih Tanggal & Waktu -->
        <div class="p-6 bg-white rounded-lg shadow-md md:w-3/4">
            <h2 class="text-2xl font-bold text-center text-gray-800">Select Day</h2>

            <!-- Pilih Hari -->
            <div class="flex mt-6 space-x-3 overflow-x-auto">
                <button class="px-4 py-2 bg-[#497D74] text-white rounded-lg">Sun 16</button>
                <button class="px-4 py-2 text-gray-700 bg-gray-200 rounded-lg">Mon 17</button>
                <button class="px-4 py-2 text-gray-700 bg-gray-200 rounded-lg">Tue 18</button>
                <button class="px-4 py-2 text-gray-700 bg-gray-200 rounded-lg">Wed 19</button>
                <button class="px-4 py-2 text-gray-700 bg-gray-200 rounded-lg">Thu 20</button>
                <button class="px-4 py-2 text-gray-700 bg-gray-200 rounded-lg">Fri 21</button>
            </div>

            <!-- Pilih Waktu -->
            <div class="mt-6 space-y-4">
                <div class="flex justify-between p-4 bg-gray-100 rounded-lg cursor-pointer hover:bg-gray-200">
                    <span class="text-gray-700">9:00pm</span>
                    <span>></span>
                </div>
                <div class="flex justify-between p-4 bg-gray-100 rounded-lg cursor-pointer hover:bg-gray-200">
                    <span class="text-gray-700">4:45pm</span>
                    <span>></span>
                </div>
                <div class="flex justify-between p-4 bg-gray-100 rounded-lg cursor-pointer hover:bg-gray-200">
                    <span class="text-gray-700">5:00pm</span>
                    <span>></span>
                </div>
                <div class="flex justify-between p-4 bg-gray-100 rounded-lg cursor-pointer hover:bg-gray-200">
                    <span class="text-gray-700">5:15pm</span>
                    <span>></span>
                </div>
                <div class="flex justify-between p-4 bg-gray-100 rounded-lg cursor-pointer hover:bg-gray-200">
                    <span class="text-gray-700">5:30pm</span>
                    <span>></span>
                </div>
            </div>
        </div>

   <!-- Detail Dokter & Biaya -->
   <aside class="w-64 p-4 bg-white rounded-lg shadow-md">
    <div class="flex items-center space-x-3">
        <img src="{{ asset ('images/Gunawan.png')}}" alt="Dr. Usman Ademola" class="object-cover w-12 h-12 rounded-full">
        <div>
            <h3 class="text-sm font-bold text-gray-800">Dr. Usman Ademola</h3>
            <p class="text-xs text-gray-500">Vet</p>
        </div>
    </div>

    <!-- Rincian Biaya -->
    <div class="pt-4 mt-4 text-sm border-t">
        <div class="flex justify-between text-gray-600">
            <span>One - Season Meet</span>
            <span>Rp 75.000</span>
        </div>
        <p class="text-xs text-gray-500">1h</p>

        <div class="flex justify-between mt-2 text-gray-600">
            <span>Service Fees</span>
            <span>Rp 5.000</span>
        </div>
        <p class="text-xs text-gray-500">2%</p>
    </div>

    <!-- Total Biaya -->
    <div class="flex justify-between pt-4 mt-4 text-sm font-semibold border-t">
        <span>Total</span>
        <span class="text-lg">Rp 80.000</span>
    </div>

    <!-- Tombol Booking -->
    <button class="w-full mt-4 bg-[#497D74] text-white py-2 rounded-md font-semibold text-sm hover:bg-[#3a5f58]">
        Booking
    </button>
</aside>

</body>
</html>