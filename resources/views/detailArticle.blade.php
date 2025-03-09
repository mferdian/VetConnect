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

    <!-- Main Content -->
    <section class="container mx-auto mt-12 px-6 flex flex-col md:flex-row gap-8">
        
        <!-- Artikel Utama -->
        <div class="md:w-3/4 bg-white shadow-md p-6 rounded-lg">
            <h1 class="text-2xl font-bold text-gray-800">Kucing Tidak Mau Makan, Apa yang Perlu Dilakukan?</h1>
            <p class="text-gray-500 text-sm mt-1">Ditinjau oleh Redaksi Halodoc - 16 November 2021</p>
            
            <blockquote class="italic text-gray-600 mt-4 border-l-4 border-[#497D74] pl-4">
                "Kucing yang mogok makan tentu saja membuat kamu bingung sekaligus khawatir. Ada banyak hal yang bisa membuat kucing mogok makan..."
            </blockquote>
            
            <img src="KucingTakMauMakan.png" alt="Kucing Tidak Mau Makan" class="mt-4 w-full h-80 object-cover rounded-lg">
            
            <p class="text-gray-700 mt-6">
                Halodoc, Jakarta – Saat memelihara kucing, kamu wajib memastikan kesehatan hewan peliharaan kamu. Salah satu caranya adalah memastikannya makan dengan baik. Ketika ia tiba-tiba tidak tertarik untuk makan, tentunya kamu pasti kebingungan dan khawatir akan kondisi kesehatannya.
                Kucing yang tidak cukup makan harus mengandalkan cadangan lemak untuk kebutuhan energinya. Sebelum lemak yang disimpan dapat digunakan untuk bahan bakar, lemak tersebut harus diproses oleh hati.
            </p>

            <p class="text-gray-700 mt-4">
                Nah, langkah tersebut membutuhkan pasokan protein yang cukup. Ketika persediaan protein habis, berat badan kucing dapat turun dengan cepat.
                Hal ini bisa menjadi kondisi berbahaya karena hati menjadi kewalahan untuk memproses semua lemak...
            </p>
        </div>

        <!-- Sidebar Artikel Terkait -->
        <aside class="md:w-1/4">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Artikel Terkait</h2>
            <ul class="space-y-4">
                <li class="flex items-center gap-4 bg-white shadow p-3 rounded-lg">
                    <img src="KutuKucing.png" alt="Kutu Kucing" class="w-16 h-16 object-cover rounded-md">
                    <a href="#" class="text-gray-700 hover:text-[#497D74]">Ini Cara Menghilangkan Kutu Kucing yang Aman dan Efektif</a>
                </li>
                <li class="flex items-center gap-4 bg-white shadow p-3 rounded-lg">
                    <img src="Anggora.png" alt="Kucing Anggora" class="w-16 h-16 object-cover rounded-md">
                    <a href="#" class="text-gray-700 hover:text-[#497D74]">Tips Merawat Kucing Anggora dan Kisaran Harganya</a>
                </li>
                <li class="flex items-center gap-4 bg-white shadow p-3 rounded-lg">
                    <img src="JamurKucing.png" alt="Jamur Kucing" class="w-16 h-16 object-cover rounded-md">
                    <a href="#" class="text-gray-700 hover:text-[#497D74]">3 Cara Ampuh Menghilangkan Jamur pada Kucing Peliharaan</a>
                </li>
                <li class="flex items-center gap-4 bg-white shadow p-3 rounded-lg">
                    <img src="jeniskucing.png" alt="Jenis Kucing" class="w-16 h-16 object-cover rounded-md">
                    <a href="#" class="text-gray-700 hover:text-[#497D74]">13 Jenis Kucing Paling Bersahabat untuk Peliharaan Rumah</a>
                </li>
                <li class="flex items-center gap-4 bg-white shadow p-3 rounded-lg">
                    <img src="AbsesKucing.png" alt="Abses Kucing" class="w-16 h-16 object-cover rounded-md">
                    <a href="#" class="text-gray-700 hover:text-[#497D74]">Abses pada Kucing: Ini Penyebab, Jenis, dan Penanganannya</a>
                </li>
            </ul>
        </aside>

    </section>

</body>
</html>
