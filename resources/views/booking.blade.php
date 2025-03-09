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
    <section class="container mx-auto mt-12 px-6 flex flex-col md:flex-row">
        <!-- Bagian Kiri: Informasi -->
        <div class="md:w-1/2 pr-8">
            <h3 class="text-black text-4xl font-bold">
                Booking Dokter di <span class="text-black">Vet</span><span class="text-[#497D74]">Connect</span>
            </h3>            
            <p class="text-gray-600 mt-2 text-center">Layanan Telemedisin Hewan: Siap Siaga untuk Membantu Hewan Peliharaanmu Hidup Lebih Sehat.</p>

            <!-- Gambar Ilustrasi -->
            <img src="Booking Dokter.png" alt="Dokter Ilustrasi" class="mt-4 w-40 md:w-52 lg:w-64 mx-auto md:ml-40 lg:mr-20 relative transform">
       
            <p class="text-gray-600 mt-2 text-center">Pilih dokter berpengalaman dan booking sekarang</p>

            <h4 class="font-bold text-xl mt-6">
                Mengapa Booking Dokter di <span class="text-black">Vet</span><span class="text-[#497D74]">Connect</span>?
            </h4>            
            <ul class="mt-4 space-y-3">
                <li class="flex items-center">
                    <img src="icon1.png" class="w-9 h-9 mr-2"> Kemudahan dan Kepraktisan
                </li>
                <li class="flex items-center">
                    <img src="icon2.png" class="w-9 h-9 mr-2"> Pilihan Dokter Hewan Berpengalaman
                </li>
                <li class="flex items-center">
                    <img src="Icon3.png" class="w-9 h-9 mr-2"> Hemat Waktu dan Tenaga
                </li>
            </ul>
        </div>

        <!-- Grid Dokter -->
        <div class="w-3/4 md:w-2/3 lg:w-1/2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mx-auto">
            <!-- Kartu Dokter -->
            <div class="bg-white shadow-md rounded-lg p-4 flex flex-col h-full">
                <img src="Dr Jackson.png" alt="Dr. Ajay Kaul" class="w-full h-40 object-cover rounded-md">
                <h4 class="font-bold text-gray-800 mt-2">Dr. Ajay Kaul</h4>
                <p class="text-gray-600 text-sm">Hewan Domestik & Eksotik</p>
                <button class="border border-[#497D74] text-[#497D74] w-full py-2 rounded-md mt-auto">Consult Now</button>
            </div>

            <div class="bg-white shadow-md rounded-lg p-4 flex flex-col h-full">
                <img src="Dr Adinda.png" alt="Dr. Naresh Terhan" class="w-full h-40 object-cover rounded-md">
                <h4 class="font-bold text-gray-800 mt-2">Dr. Naresh Terhan</h4>
                <p class="text-gray-600 text-sm">Anjing & Kucing, Hewan Domestik</p>
                <button class="border border-[#497D74] text-[#497D74] w-full py-2 rounded-md mt-auto">Consult Now</button>
            </div>

            <div class="bg-white shadow-md rounded-lg p-4 flex flex-col h-full">
                <img src="Dr Jackson.png" alt="Dr. Vinod Raina" class="w-full h-40 object-cover rounded-md">
                <h4 class="font-bold text-gray-800 mt-2">Dr. Vinod Raina</h4>
                <p class="text-gray-600 text-sm">Anjing & Kucing, Hewan Ternak</p>
                <button class="border border-[#497D74] text-[#497D74] w-full py-2 rounded-md mt-auto">Consult Now</button>
            </div>

            <!-- Duplikasi Kartu Dokter -->
            <div class="bg-white shadow-md rounded-lg p-4 flex flex-col h-full">
                <img src="Dr Adinda.png" alt="Dr. Ajay Kaul" class="w-full h-40 object-cover rounded-md">
                <h4 class="font-bold text-gray-800 mt-2">Dr. Ajay Kaul</h4>
                <p class="text-gray-600 text-sm">Hewan Domestik & Eksotik</p>
                <button class="border border-[#497D74] text-[#497D74] w-full py-2 rounded-md mt-auto">Consult Now</button>
            </div>

            <div class="bg-white shadow-md rounded-lg p-4 flex flex-col h-full">
                <img src="Dr Jackson.png" alt="Dr. Naresh Terhan" class="w-full h-40 object-cover rounded-md">
                <h4 class="font-bold text-gray-800 mt-2">Dr. Naresh Terhan</h4>
                <p class="text-gray-600 text-sm">Anjing & Kucing, Hewan Domestik</p>
                <button class="border border-[#497D74] text-[#497D74] w-full py-2 rounded-md mt-auto">Consult Now</button>
            </div>

            <div class="bg-white shadow-md rounded-lg p-4 flex flex-col h-full">
                <img src="Dr Adinda.png" alt="Dr. Vinod Raina" class="w-full h-40 object-cover rounded-md">
                <h4 class="font-bold text-gray-800 mt-2">Dr. Vinod Raina</h4>
                <p class="text-gray-600 text-sm">Anjing & Kucing, Hewan Ternak</p>
                <button class="border border-[#497D74] text-[#497D74] w-full py-2 rounded-md mt-auto">Consult Now</button>
            </div>
        </div>
    </section>

</body>
</html>
<footer class="bg-gray-100 py-6 mt-10">
    <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center">
        <!-- Kiri: Info -->
        <div class="text-left">
            <h3 class="text-xl font-bold text-gray-800">Vet<span class="text-[#497D74]">Connect</span></h3>
            <p class="text-gray-700 mt-2 font-medium">
                Want to consult a vet? Just book online at <span class="font-bold">VetConnect</span>!
            </p>
            <div class="mt-3 space-y-2 text-gray-600 text-sm">
                <p>📍 Location: Jl. Kesehatan No.10, Jakarta</p>
                <p>📧 Email: support@vetconnect.com</p>
                <p>📞 WhatsApp: +62 812-3456-7890</p>
            </div>
        </div>
        
        <!-- Kanan: Partner Form -->
        <div class="mt-6 md:mt-0 text-center md:text-left">
            <h4 class="font-bold text-lg text-gray-800">
                🔗 Want to be our partner? 🎁🐾
            </h4>
            <p class="text-gray-600 text-sm">
                Join us and be part of the best animal health service! ✨  
                Enter your email and we will send you a form.
            </p>
            <div class="mt-3 flex">
                <input type="email" placeholder="Enter Your E-mail"
                    class="w-60 px-4 py-2 rounded-l-md border border-gray-300 focus:outline-none">
                <button class="bg-[#497D74] text-white px-4 py-2 rounded-r-md hover:bg-[#3b665d]">
                    Join
                </button>
            </div>
        </div>
    </div>

    <!-- Copyright & Social Media -->
    <div class="relative mt-6">
        <div class="flex justify-between items-center border-t border-gray-300 pt-6 px-40">
            <!-- Kiri: Copyright -->
            <p class="text-gray-600 text-sm movable">© 2025 VetConnect - Your Pet’s Loyal Friend!</p>

            <!-- Kanan: Social Media -->
            <div class="flex space-x-4 movable">
                <a href="#"><img src="Instagram.png" alt="Instagram" class="w-6 h-6"></a>
                <a href="#"><img src="Facebook.png" alt="Facebook" class="w-6 h-6"></a>
                <a href="#"><img src="Whatsapp.png" alt="WhatsApp" class="w-6 h-6"></a>
                <a href="#"><img src="Twitter.png" alt="Twitter" class="w-6 h-6"></a>
            </div>
        </div>
    </div>
</footer>

<!-- Tambahkan CSS untuk memindahkan elemen -->
<style>
    /* Geser teks copyright */
    .movable:first-child {
        position: relative;
        top: -5px;  /* Geser ke bawah */
        left: 20px; /* Geser ke kanan */
    }

    /* Geser ikon sosial media */
    .movable:last-child {
        position: relative;
        top: -5px;  /* Geser ke atas */
        left: -15px; /* Geser ke kiri */
    }
</style>
