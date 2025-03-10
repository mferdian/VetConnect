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

    <!-- Main Content -->
    <section class="container flex flex-col gap-8 px-6 mx-auto mt-12 md:flex-row">

        <!-- Artikel Utama -->
        <div class="p-6 bg-white rounded-lg shadow-md md:w-3/4">
            <h1 class="text-2xl font-bold text-gray-800">Kucing Tidak Mau Makan, Apa yang Perlu Dilakukan?</h1>
            <p class="mt-1 text-sm text-gray-500">Ditinjau oleh Redaksi Halodoc - 16 November 2021</p>

            <blockquote class="italic text-gray-600 mt-4 border-l-4 border-[#497D74] pl-4">
                "Kucing yang mogok makan tentu saja membuat kamu bingung sekaligus khawatir. Ada banyak hal yang bisa membuat kucing mogok makan..."
            </blockquote>

            <img src="{{ asset('images/KucingTakMauMakan.png') }}" alt="Kucing Tidak Mau Makan" class="object-cover w-full mt-4 rounded-lg h-80">

            <p class="mt-6 text-gray-700">
                Halodoc, Jakarta – Saat memelihara kucing, kamu wajib memastikan kesehatan hewan peliharaan kamu. Salah satu caranya adalah memastikannya makan dengan baik. Ketika ia tiba-tiba tidak tertarik untuk makan, tentunya kamu pasti kebingungan dan khawatir akan kondisi kesehatannya.
                Kucing yang tidak cukup makan harus mengandalkan cadangan lemak untuk kebutuhan energinya. Sebelum lemak yang disimpan dapat digunakan untuk bahan bakar, lemak tersebut harus diproses oleh hati.
            </p>

            <p class="mt-4 text-gray-700">
                Nah, langkah tersebut membutuhkan pasokan protein yang cukup. Ketika persediaan protein habis, berat badan kucing dapat turun dengan cepat.
                Hal ini bisa menjadi kondisi berbahaya karena hati menjadi kewalahan untuk memproses semua lemak...
            </p>
        </div>

        <!-- Sidebar Artikel Terkait -->
        <aside class="md:w-1/4">
            <h2 class="mb-4 text-lg font-semibold text-gray-800">Artikel Terkait</h2>
            <ul class="space-y-4">
                <li class="flex items-center gap-4 p-3 bg-white rounded-lg shadow">
                    <img src="{{ asset('images/KutuKucing.png') }}" alt="Kutu Kucing" class="object-cover w-16 h-16 rounded-md">
                    <a href="#" class="text-gray-700 hover:text-[#497D74]">Ini Cara Menghilangkan Kutu Kucing yang Aman dan Efektif</a>
                </li>
                <li class="flex items-center gap-4 p-3 bg-white rounded-lg shadow">
                    <img src="{{ asset('images/Anggora.png') }}" alt="Kucing Anggora" class="object-cover w-16 h-16 rounded-md">
                    <a href="#" class="text-gray-700 hover:text-[#497D74]">Tips Merawat Kucing Anggora dan Kisaran Harganya</a>
                </li>
                <li class="flex items-center gap-4 p-3 bg-white rounded-lg shadow">
                    <img src="{{ asset('images/JamurKucing.png') }}" alt="Jamur Kucing" class="object-cover w-16 h-16 rounded-md">
                    <a href="#" class="text-gray-700 hover:text-[#497D74]">3 Cara Ampuh Menghilangkan Jamur pada Kucing Peliharaan</a>
                </li>
                <li class="flex items-center gap-4 p-3 bg-white rounded-lg shadow">
                    <img src="{{ asset('images/jeniskucing.png') }}" alt="Jenis Kucing" class="object-cover w-16 h-16 rounded-md">
                    <a href="#" class="text-gray-700 hover:text-[#497D74]">13 Jenis Kucing Paling Bersahabat untuk Peliharaan Rumah</a>
                </li>
                <li class="flex items-center gap-4 p-3 bg-white rounded-lg shadow">
                    <img src="{{ asset('images/AbsesKucing.png') }}" alt="Abses Kucing" class="object-cover w-16 h-16 rounded-md">
                    <a href="#" class="text-gray-700 hover:text-[#497D74]">Abses pada Kucing: Ini Penyebab, Jenis, dan Penanganannya</a>
                </li>
            </ul>
        </aside>

    </section>

</body>
</html>
