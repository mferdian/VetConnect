<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Janji Temu - VetConnect</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #497D74;
            --primary-hover: #3a645c;
        }
        .divider {
            border-top: 1px dashed #e5e7eb;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="max-w-md mx-auto my-8 overflow-hidden bg-white shadow-md rounded-xl">
        <!-- Header -->
        <div class="p-6 bg-[#497D74] text-white">
            <h1 class="text-2xl font-bold">Konfirmasi Janji Temu</h1>
            <div class="flex items-center mt-2">
                <i class="mr-2 far fa-calendar-alt"></i>
                <span>Senin, 24 Februari 2025</span>
                <i class="ml-4 mr-2 far fa-clock"></i>
                <span>17:00 WIB</span>
            </div>
        </div>

        <!-- Doctor Info -->
        <div class="p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-16 w-16 rounded-full border-2 border-[#497D74]" src="images/dr-usman.jpg" alt="Dr. Usman Ademola">
                </div>
                <div class="ml-4">
                    <h2 class="text-xl font-bold text-gray-800">Dr. Usman Ademola</h2>
                    <div class="flex mt-1 space-x-4">
                        <span class="flex items-center text-sm text-gray-600">
                            <i class="mr-1 fas fa-award text-[#497D74]"></i>
                            6 tahun pengalaman
                        </span>
                        <span class="flex items-center text-sm text-gray-600">
                            <i class="mr-1 fas fa-star text-[#497D74]"></i>
                            99.0% kepuasan
                        </span>
                    </div>
                </div>
            </div>

            <div class="p-4 mt-6 rounded-lg bg-blue-50">
                <div class="flex justify-between">
                    <span class="font-medium text-gray-700">Durasi Konsultasi</span>
                    <span class="font-semibold">1 Jam</span>
                </div>
            </div>
        </div>

        <!-- Payment Summary -->
        <div class="divider"></div>
        <div class="p-6">
            <h3 class="mb-4 text-lg font-bold text-gray-800">Ringkasan Pembayaran</h3>

            <div class="space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-600">Biaya Konsultasi</span>
                    <span class="font-medium">IDR 100.000</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Biaya Layanan</span>
                    <span class="font-medium">IDR 0</span>
                </div>
            </div>

            <div class="my-4 divider"></div>

            <div class="flex justify-between">
                <span class="text-lg font-bold text-gray-800">Total Pembayaran</span>
                <span class="text-xl font-bold text-[#497D74]">IDR 100.000</span>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="divider"></div>
        <div class="flex justify-between p-6 space-x-4">
            <button class="flex-1 px-4 py-3 border border-[#497D74] text-[#497D74] font-medium rounded-lg hover:bg-gray-50 transition-colors">
                <i class="mr-2 fas fa-calendar-alt"></i>
                Ganti Jadwal
            </button>
            <button class="flex-1 px-4 py-3 font-medium text-red-500 transition-colors border border-red-500 rounded-lg hover:bg-red-50">
                <i class="mr-2 fas fa-times"></i>
                Batalkan
            </button>
        </div>

        <!-- Payment Button -->
        <div class="p-6 pt-0">
            <button class="w-full py-3 bg-[#497D74] text-white font-bold rounded-lg hover:bg-[#3a645c] transition-colors shadow-md">
                Lanjutkan ke Pembayaran
            </button>
        </div>

        <!-- Cancellation Policy -->
        <div class="p-6 bg-gray-50">
            <div class="flex items-start">
                <i class="mt-1 mr-3 fas fa-info-circle text-[#497D74]"></i>
                <div>
                    <h4 class="mb-2 font-bold text-gray-800">Kebijakan Pembatalan</h4>
                    <p class="text-sm text-gray-600">
                        Batalkan kapan saja secara gratis di muka. Jika tidak, Anda akan dikenakan biaya 100% dari harga layanan karena tidak hadir.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
