<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VetConnect - Cari Dokter Hewan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/doctor-page.js'])
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
                <input type="text" id="locationFilter" placeholder="Lokasi Anda" class="w-full p-3 pl-10 border border-gray-300 rounded-lg">
            </div>
            <div class="relative">
                <i class="absolute text-gray-400 transform -translate-y-1/2 fas fa-search top-1/2 left-3"></i>
                <input type="text" id="searchDoctor" placeholder="Nama dokter atau spesialisasi" class="w-full p-3 pl-10 border border-gray-300 rounded-lg">
            </div>
            <div class="relative">
                <i class="absolute text-gray-400 transform -translate-y-1/2 fas fa-paw top-1/2 left-3"></i>
                <select id="animalFilter" class="w-full p-3 pl-10 border border-gray-300 rounded-lg">
                    <option value="">Jenis Hewan</option>
                    <option value="dog">Anjing</option>
                    <option value="cat">Kucing</option>
                    <option value="bird">Burung</option>
                    <option value="reptile">Reptil</option>
                </select>
            </div>
            <button id="filterButton" class="px-6 py-3 text-lg font-semibold text-white bg-[#497D74] rounded-lg hover:bg-[#3a645c]">
                Cari Dokter
            </button>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="flex flex-wrap items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-gray-800">Dokter Hewan Tersedia</h2>
        <div class="flex items-center mt-2 space-x-4 md:mt-0">
            <span class="text-sm font-medium text-gray-600">Urutkan:</span>
            <select id="sortDoctor" class="p-2 text-sm border border-gray-300 rounded-lg">
                <option value="rating">Rating Tertinggi</option>
                <option value="distance">Jarak Terdekat</option>
                <option value="price">Harga Terendah</option>
            </select>
        </div>
    </div>

    <!-- Doctors List -->
    <div id="vetList" class="space-y-6">
        @foreach ($vets as $vet)
        <div class="flex flex-col p-6 bg-white shadow-md doctor-card rounded-xl md:flex-row"
            data-name="{{ strtolower($vet->nama) }}"
            data-location="{{ strtolower($vet->alamat) }}"
            data-animal="{{ strtolower(implode(',', $vet->hewan)) }}"
            data-rating="{{ $vet->vetReview->avg('rating') ?? 0 }}">

        <div class="flex items-center justify-center mb-4 md:mb-0 md:mr-6">
            <div class="w-32 h-32 overflow-hidden rounded-full border-4 border-[#497D74] shadow-md">
                <img src="{{ asset('storage/' . $vet->foto) }}"
                    alt="{{ $vet->nama }}"
                    class="object-cover w-full h-full">
            </div>
        </div>

            <div class="flex-1">
                <h3 class="text-xl font-bold text-[#497D74]">{{ $vet->nama }}</h3>
                <p class="mt-2 text-gray-600">{{ $vet->deskripsi }}</p>

                <div class="flex items-center mt-3">
                    <i class="mr-2 text-gray-500 fas fa-map-marker-alt"></i>
                    <span class="text-gray-700">{{ $vet->alamat }}</span>
                </div>

                @php
                    $rating = $vet->vetReview->avg('rating') ?? 0;
                    $reviewCount = $vet->vetReview->count();
                @endphp

                <div class="flex items-center mt-2">
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

            <div class="mt-4 md:mt-0 md:ml-6">
                <a href="{{ route('booking.show', $vet->id) }}" class="px-6 py-3 text-lg font-semibold text-white bg-[#497D74] rounded-lg hover:bg-[#3a645c]">
                    Buat Janji
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
    @endsection

</body>
</html>
