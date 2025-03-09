<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Appointment - VetConnect</title>
    <script src="https://cdn.tailwindcss.com"></script>
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

    <!-- Main Content -->
    <section class="container mx-auto mt-12 px-6 flex flex-col md:flex-row gap-8">

        <!-- Pilih Tanggal & Waktu -->
        <div class="md:w-3/4 bg-white shadow-md p-6 rounded-lg">
            <h2 class="text-center text-2xl font-bold text-gray-800">Select Day</h2>

            <!-- Pilih Hari -->
            <div class="flex space-x-3 mt-6 overflow-x-auto">
                <button class="px-4 py-2 bg-[#497D74] text-white rounded-lg">Sun 16</button>
                <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg">Mon 17</button>
                <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg">Tue 18</button>
                <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg">Wed 19</button>
                <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg">Thu 20</button>
                <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg">Fri 21</button>
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
   <aside class="w-64 bg-white shadow-md p-4 rounded-lg">
    <div class="flex items-center space-x-3">
        <img src="Gunawan.png" alt="Dr. Usman Ademola" class="w-12 h-12 object-cover rounded-full">
        <div>
            <h3 class="text-sm font-bold text-gray-800">Dr. Usman Ademola</h3>
            <p class="text-xs text-gray-500">Vet</p>
        </div>
    </div>

    <!-- Rincian Biaya -->
    <div class="mt-4 border-t pt-4 text-sm">
        <div class="flex justify-between text-gray-600">
            <span>One - Season Meet</span>
            <span>Rp 75.000</span>
        </div>
        <p class="text-xs text-gray-500">1h</p>

        <div class="flex justify-between text-gray-600 mt-2">
            <span>Service Fees</span>
            <span>Rp 5.000</span>
        </div>
        <p class="text-xs text-gray-500">2%</p>
    </div>

    <!-- Total Biaya -->
    <div class="mt-4 border-t pt-4 flex justify-between font-semibold text-sm">
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