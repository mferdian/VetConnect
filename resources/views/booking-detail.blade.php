<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Dokter - VetConnect</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #497D74;
            --primary-hover: #3a645c;
        }
        .date-cell.selected {
            background-color: #497D74;
            color: white;
        }
        .time-slot.selected {
            background-color: #497D74;
            color: white;
            border-color: #497D74;
        }
    </style>
</head>
<body class="font-sans bg-gray-50">
    @extends('layouts.app')

    @section('content')
    <div class="max-w-4xl px-4 py-8 mx-auto">
        <!-- Doctor Header -->
        <div class="flex items-start mb-8">
            <img src="{{ asset('storage/' . $vet->foto) }}" alt="{{ $vet->nama }}" class="w-24 h-24 rounded-full object-cover border-4 border-[#497D74]">
            <div class="ml-6">
                <h1 class="text-3xl font-bold text-gray-800">Dr. {{ $vet->nama }}</h1>
                <div class="flex items-center mt-2">
                    <span class="bg-[#497D74] text-white text-xs px-2 py-1 rounded-full mr-2">Verified</span>
                    <div class="flex items-center text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span class="ml-1 text-gray-600">({{ $vet->vetReview->count() }} reviews)</span>
                    </div>
                </div>
                <p class="mt-2 text-gray-600">{{ $vet->deskripsi }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
            <!-- Left Column - Date/Time Selection -->
            <div class="p-6 bg-white shadow-md lg:col-span-2 rounded-xl">
                <h2 class="mb-6 text-xl font-bold text-gray-800">Pilih Tanggal & Waktu</h2>

                <!-- Month Navigation -->
                <div class="flex items-center justify-between mb-4">
                    <button class="p-2 rounded-full hover:bg-gray-100">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <h3 class="text-lg font-semibold">July 2023</h3>
                    <button class="p-2 rounded-full hover:bg-gray-100">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>

                <!-- Date Grid -->
                <div class="grid grid-cols-7 gap-2 mb-6">
                    <div class="text-sm text-center text-gray-500">Sun</div>
                    <div class="text-sm text-center text-gray-500">Mon</div>
                    <div class="text-sm text-center text-gray-500">Tue</div>
                    <div class="text-sm text-center text-gray-500">Wed</div>
                    <div class="text-sm text-center text-gray-500">Thu</div>
                    <div class="text-sm text-center text-gray-500">Fri</div>
                    <div class="text-sm text-center text-gray-500">Sat</div>

                    @php
                        $daysInMonth = 31; // Example for July
                        $startDay = 6; // July 2023 starts on Saturday
                    @endphp

                    @for ($i = 0; $i < $startDay; $i++)
                        <div class="h-12"></div>
                    @endfor

                    @foreach ($vet->vetDates as $date)
                        @php
                            $dayOfMonth = $date->tanggal->format('j');
                            $isToday = $date->tanggal->isToday();
                        @endphp
                        <button class="date-cell h-12 rounded-lg flex flex-col items-center justify-center
                                {{ $isToday ? 'border-2 border-[#497D74]' : '' }}
                                hover:bg-gray-100 transition-colors">
                            <span class="text-sm">{{ $date->tanggal->format('D') }}</span>
                            <span class="font-medium">{{ $dayOfMonth }}</span>
                        </button>
                    @endforeach
                </div>

                <!-- Time Slots -->
                <h4 class="mb-3 font-semibold text-gray-800">Pilih Waktu</h4>
                <div class="grid grid-cols-3 gap-3">
                    @foreach ($vet->vetDates->first()->vetTimes as $time)
                        <button class="time-slot py-2 px-4 border border-gray-300 rounded-lg text-center
                                hover:border-[#497D74] hover:text-[#497D74] transition-colors">
                            {{ $time->jam }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Right Column - Booking Summary -->
            <div class="p-6 bg-white shadow-md rounded-xl">
                <h2 class="mb-6 text-xl font-bold text-gray-800">Ringkasan Booking</h2>

                <div class="mb-6">
                    <h3 class="mb-2 font-semibold text-gray-800">Konsultasi</h3>
                    <div class="flex items-center justify-between">
                        <span>1 Sesi Pertemuan</span>
                        <span class="font-medium">Rp 75.000</span>
                    </div>
                    <div class="mt-1 text-sm text-gray-500">1 jam</div>
                </div>

                <div class="mb-6">
                    <h3 class="mb-2 font-semibold text-gray-800">Biaya Layanan</h3>
                    <div class="flex items-center justify-between">
                        <span>Biaya Platform</span>
                        <span class="font-medium">Rp 5.000</span>
                    </div>
                    <div class="mt-1 text-sm text-gray-500">2%</div>
                </div>

                <div class="pt-4 mb-6 border-t border-gray-200">
                    <div class="flex items-center justify-between">
                        <span class="font-semibold">Total</span>
                        <span class="text-lg font-bold text-[#497D74]">Rp 80.000</span>
                    </div>
                </div>

                <a href="{{ route('payment.page', $vet->id) }}" class="px-6 py-3 mb-2 text-lg font-semibold text-white transition-all duration-300 bg-[#497D74] rounded-lg hover:bg-[#3a645c] hover:shadow-md whitespace-nowrap">
                   Booking Sekarang
                </a>

                <div class="mt-4 text-xs text-center text-gray-500">
                    Dengan melanjutkan, Anda menyetujui <a href="#" class="text-[#497D74] hover:underline">Syarat & Ketentuan</a> kami
                </div>
            </div>
        </div>
    </div>
    @endsection
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
