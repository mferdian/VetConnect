<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VetConnect - Cari Dokter Hewan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #497D74;
            --primary-hover: #3a645c;
        }
        .doctor-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
        .rating-star {
            color: #fbbf24;
        }
    </style>
</head>
<body class="bg-gray-50">
    @extends('layouts.app')

    @section('content')
<div class="max-w-6xl px-4 py-8 mx-auto">
    <!-- Hero Section -->
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-bold text-gray-800 md:text-4xl">Temukan Dokter Hewan Terbaik</h1>
        <p class="mt-2 text-lg text-gray-600">Konsultasikan kesehatan hewan peliharaan Anda dengan dokter hewan profesional</p>
    </div>

    <!-- Search Section -->
    <div class="p-6 mb-8 bg-white shadow-md rounded-xl">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
            <div class="relative">
                <i class="absolute text-gray-400 transform -translate-y-1/2 fas fa-map-marker-alt top-1/2 left-3"></i>
                <input type="text" placeholder="Lokasi Anda" class="w-full p-3 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#497D74] focus:border-transparent">
            </div>
            <div class="relative">
                <i class="absolute text-gray-400 transform -translate-y-1/2 fas fa-search top-1/2 left-3"></i>
                <input type="text" placeholder="Nama dokter atau spesialisasi" class="w-full p-3 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#497D74] focus:border-transparent">
            </div>
            <div class="relative">
                <i class="absolute text-gray-400 transform -translate-y-1/2 fas fa-paw top-1/2 left-3"></i>
                <select class="w-full p-3 pl-10 text-gray-600 border border-gray-300 rounded-lg appearance-none focus:ring-2 focus:ring-[#497D74] focus:border-transparent">
                    <option value="">Jenis Hewan</option>
                    <option value="dog">Anjing</option>
                    <option value="cat">Kucing</option>
                    <option value="bird">Burung</option>
                    <option value="reptile">Reptil</option>
                </select>
            </div>
            <button class="px-6 py-3 text-lg font-semibold text-white transition-all duration-300 bg-[#497D74] rounded-lg hover:bg-[#3a645c] hover:shadow-md">
                Cari Dokter
            </button>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="flex flex-wrap items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-gray-800">Dokter Hewan Tersedia</h2>
        <div class="flex items-center mt-2 space-x-4 md:mt-0">
            <span class="text-sm font-medium text-gray-600">Urutkan:</span>
            <select class="p-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#497D74]">
                <option>Rating Tertinggi</option>
                <option>Jarak Terdekat</option>
                <option>Harga Terendah</option>
            </select>
        </div>
    </div>

    <!-- Doctors List -->
    <div class="space-y-6">
        @foreach ($vets as $vet)
        <div class="flex flex-col p-6 transition-all duration-300 bg-white shadow-md doctor-card rounded-xl md:flex-row">
            <div class="flex items-center justify-center mb-4 md:mb-0 md:mr-6">
                <img src="{{ asset('storage/' . $vet->foto) }}" alt="{{ $vet->nama }}" class="object-cover w-32 h-32 rounded-full border-4 border-[#497D74]">
            </div>

            <div class="flex-1">
                <div class="flex flex-col justify-between md:flex-row">
                    <div>
                        <h3 class="text-xl font-bold text-[#497D74]">{{ $vet->nama }}</h3>
                        <div class="flex flex-wrap items-center mt-1">
                            @foreach ($vet->hewan as $animal)
                            <span class="px-2 py-1 mb-2 mr-2 text-xs font-medium text-gray-700 bg-gray-100 rounded-full">{{ $animal }}</span>
                            @endforeach
                        </div>
                    </div>

                    @php
                        $rating = $vet->vetReview->avg('rating') ?? 0;
                        $reviewCount = $vet->vetReview->count();
                    @endphp

                    <div class="flex items-center mt-2 md:mt-0">
                        <div class="flex mr-2">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= floor($rating))
                                    <i class="fas fa-star rating-star"></i>
                                @elseif ($i - 0.5 <= $rating)
                                    <i class="fas fa-star-half-alt rating-star"></i>
                                @else
                                    <i class="far fa-star rating-star"></i>
                                @endif
                            @endfor
                        </div>
                        <span class="text-sm font-medium text-gray-700">{{ number_format($rating, 1) }} ({{ $reviewCount }} ulasan)</span>
                    </div>
                </div>

                <p class="mt-3 text-gray-600">{{ $vet->deskripsi }}</p>

                <div class="flex items-center mt-4">
                    <i class="mr-2 text-gray-500 fas fa-map-marker-alt"></i>
                    <span class="text-gray-700">{{ $vet->alamat }}</span>
                </div>

                <div class="flex items-center mt-2">
                    <i class="mr-2 text-gray-500 fas fa-clock"></i>
                    <span class="text-gray-700">Buka: 08:00 - 20:00</span>
                </div>
            </div>

            <div class="flex flex-col items-center justify-center mt-4 md:mt-0 md:ml-6">
                <a href="{{ route('booking.detail', $vet->id) }}" class="px-6 py-3 mb-2 text-lg font-semibold text-white transition-all duration-300 bg-[#497D74] rounded-lg hover:bg-[#3a645c] hover:shadow-md whitespace-nowrap">
                    Buat Janji
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="flex justify-center mt-8">
        <nav class="flex items-center space-x-2">
            <a href="#" class="px-3 py-1 text-gray-500 rounded-lg hover:bg-gray-100">
                <i class="fas fa-chevron-left"></i>
            </a>
            <a href="#" class="px-3 py-1 text-white bg-[#497D74] rounded-lg">1</a>
            <a href="#" class="px-3 py-1 text-gray-700 rounded-lg hover:bg-gray-100">2</a>
            <a href="#" class="px-3 py-1 text-gray-700 rounded-lg hover:bg-gray-100">3</a>
            <a href="#" class="px-3 py-1 text-gray-500 rounded-lg hover:bg-gray-100">
                <i class="fas fa-chevron-right"></i>
            </a>
        </nav>
    </div>
</div>
    @endsection
</body>
</html>
