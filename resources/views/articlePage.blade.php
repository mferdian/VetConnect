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

    <!-- Artikel Section -->
    <section class="container px-6 mx-auto mt-12">
        <div class="space-y-8">

            <!-- Artikel 1 -->
            <div class="flex flex-col items-center overflow-hidden bg-white rounded-lg shadow-md md:flex-row">
                <div class="p-6 md:w-3/5">
                    <h2 class="text-lg font-bold text-gray-800">Paus Beluga yang Diduga Mata-mata Rusia Ditemukan Mati di Norwegia</h2>
                    <p class="mt-2 text-gray-600">Seekor paus belua bernama Hvaldimir, yang diduga jadi mata-mata Rusia, ditemukan tewas. Bangkai paus tersebut ditemukan di perairan Norwegia akhir pekan lalu.....</p>
                    <a href="{{ route('detailArticle')}}" class="mt-4 inline-block bg-[#497D74] text-white px-4 py-2 rounded-md hover:bg-[#3b665d]">Selengkapnya</a>
                </div>
                <img src="{{ asset('images/PausBeluga.png')}}" alt="Paus Beluga" class="object-cover w-full h-48 md:w-2/5">
            </div>

            <!-- Artikel 2 -->
            <div class="flex flex-col items-center overflow-hidden bg-white rounded-lg shadow-md md:flex-row">
                <div class="p-6 md:w-3/5">
                    <h2 class="text-lg font-bold text-gray-800">Haaland Absen di Man City vs Liverpool?</h2>
                    <p class="mt-2 text-gray-600">Haaland tidak dimainkan saat Man City dikalahkan Real Madrid di Liga Champions, Rabu (19/2). Pemain asal Norwegia itu mengalami cedera sejak Man City mengalahkan Newcastle...</p>
                    <a href="#" class="mt-4 inline-block bg-[#497D74] text-white px-4 py-2 rounded-md hover:bg-[#3b665d]">Selengkapnya</a>
                </div>
                <img src="{{ asset('images/Anggora.png')}}" alt="Haaland" class="object-cover w-full h-48 md:w-2/5">
            </div>

            <!-- Artikel 3 -->
            <div class="flex flex-col items-center overflow-hidden bg-white rounded-lg shadow-md md:flex-row">
                <div class="p-6 md:w-3/5">
                    <h2 class="text-lg font-bold text-gray-800">Waspadai 7 Hewan Ini, Sering Muncul saat Musim Hujan</h2>
                    <p class="mt-2 text-gray-600">Musim hujan, selain merupakan musim 'kedatangan' penyakit, juga musim hewan atau serangga banyak bermunculan....</p>
                    <a href="#" class="mt-4 inline-block bg-[#497D74] text-white px-4 py-2 rounded-md hover:bg-[#3b665d]">Selengkapnya</a>
                </div>
                <img src="{{ asset('images/Hujan.png')}}" alt="Musim Hujan" class="object-cover w-full h-48 md:w-2/5">
            </div>

        </div>
    </section>

</body>
</html>
