<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VetConnect App Download</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    @include('layouts._navbar')

    <!-- Main Content -->
    <div class="flex flex-col md:flex-row items-center justify-between max-w-7xl mx-auto px-6 py-12">
        
        <!-- Bagian Gambar Handphone -->
        <div class="w-full md:w-1/2 flex justify-center">
            <img src="images/gambarvetconnectmobile3.png" alt="VetConnect App Preview" class="w-4/5 md:w-full">
        </div>

        <!-- Bagian Teks dan Form -->
        <div class="w-full md:w-1/2 mt-10 md:mt-0 text-center md:text-left">
            <h1 class="text-4xl font-bold text-gray-900 leading-tight">
                Download the <span class="text-[#497D74]">VetConnect</span> App
            </h1>
            <p class="mt-4 text-gray-600">Get the link to download the app</p>

            <!-- Form Input Nomor Telepon -->
            <div class="mt-6 flex items-center border border-gray-300 rounded-lg overflow-hidden w-full md:w-96">
                <span class="px-4 py-2 bg-gray-100 text-gray-700">+62</span>
                <input type="text" placeholder="Enter phone number" class="w-full px-4 py-2 focus:outline-none">
                <button class="bg-[#497D74] text-white px-8 py-2 hover:bg-[#3b665d]">Send</button>
            </div>

            <!-- Tombol Download -->
            <div class="mt-6 flex justify-center md:justify-start space-x-4">
                    <img src="images/google_play.png" alt="Google Play" class="h-11">
                </a>
                    <img src="images/apple_store.png" alt="App Store" class="h-11">
                </a>
            </div>
        </div>
    </div>
    
</body>
</html>
