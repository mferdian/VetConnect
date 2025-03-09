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

    <!-- Artikel Section -->
    <section class="container mx-auto mt-12 px-6">
        <div class="space-y-8">
            
            <!-- Artikel 1 -->
            <div class="flex flex-col md:flex-row items-center bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6 md:w-3/5">
                    <h2 class="text-lg font-bold text-gray-800">Paus Beluga yang Diduga Mata-mata Rusia Ditemukan Mati di Norwegia</h2>
                    <p class="text-gray-600 mt-2">Seekor paus beluga bernama Hvaldimir, yang diduga jadi mata-mata Rusia, ditemukan tewas. Bangkai paus tersebut ditemukan di perairan Norwegia akhir pekan lalu.....</p>
                    <a href="#" class="mt-4 inline-block bg-[#497D74] text-white px-4 py-2 rounded-md hover:bg-[#3b665d]">Selengkapnya</a>
                </div>
                <img src="PausBeluga.png" alt="Paus Beluga" class="w-full md:w-2/5 h-48 object-cover">
            </div>

            <!-- Artikel 2 -->
            <div class="flex flex-col md:flex-row items-center bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6 md:w-3/5">
                    <h2 class="text-lg font-bold text-gray-800">Haaland Absen di Man City vs Liverpool?</h2>
                    <p class="text-gray-600 mt-2">Haaland tidak dimainkan saat Man City dikalahkan Real Madrid di Liga Champions, Rabu (19/2). Pemain asal Norwegia itu mengalami cedera sejak Man City mengalahkan Newcastle...</p>
                    <a href="#" class="mt-4 inline-block bg-[#497D74] text-white px-4 py-2 rounded-md hover:bg-[#3b665d]">Selengkapnya</a>
                </div>
                <img src="Haaland.png" alt="Haaland" class="w-full md:w-2/5 h-48 object-cover">
            </div>

            <!-- Artikel 3 -->
            <div class="flex flex-col md:flex-row items-center bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6 md:w-3/5">
                    <h2 class="text-lg font-bold text-gray-800">Waspadai 7 Hewan Ini, Sering Muncul saat Musim Hujan</h2>
                    <p class="text-gray-600 mt-2">Musim hujan, selain merupakan musim 'kedatangan' penyakit, juga musim hewan atau serangga banyak bermunculan....</p>
                    <a href="#" class="mt-4 inline-block bg-[#497D74] text-white px-4 py-2 rounded-md hover:bg-[#3b665d]">Selengkapnya</a>
                </div>
                <img src="Hujan.png" alt="Musim Hujan" class="w-full md:w-2/5 h-48 object-cover">
            </div>

        </div>
    </section>

</body>
</html>
