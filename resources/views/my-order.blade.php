<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VetConnect - My-Order</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    @extends('layouts.app')

    @section('content')
    <div class="max-w-4xl px-4 py-10 mx-auto">
        <h1 class="mb-6 text-3xl font-bold text-gray-800">Pesanan Saya</h1>

        @if($bookings->isEmpty())
            <div class="p-6 text-center bg-white rounded-lg shadow">
                <p class="text-gray-600">Kamu belum memiliki janji temu dengan dokter hewan.</p>
            </div>
        @else
            <div class="space-y-4">
                @foreach($bookings as $booking)
                <div class="p-6 transition bg-white border border-gray-200 rounded-lg shadow hover:shadow-md">
                    <div class="flex items-start justify-between">
                        <div>
                            <h2 class="text-xl font-semibold text-[#497D74]">Dr. {{ $booking->vet->nama }}</h2>
                            <p class="text-gray-600">{{ $booking->vet->spesialisasi ?? 'Dokter Hewan' }}</p>
                            <p class="mt-2 text-sm text-gray-700">
                                <i class="mr-1 fas fa-calendar-alt text-[#497D74]"></i>
                                {{ $booking->vetDate->tanggal->translatedFormat('l, d F Y') }} |
                                <i class="ml-3 mr-1 fas fa-clock text-[#497D74]"></i>
                                {{ $booking->vetTime->jam }}
                            </p>
                            <p class="mt-2 text-sm text-gray-500">Keluhan: {{ $booking->keluhan ?? '-' }}</p>
                        </div>

                        <div class="text-right">
                            <span class="inline-block px-3 py-1 mb-2 text-sm font-medium text-white rounded-full
                                {{ $booking->status === 'berhasil' ? 'bg-green-500' : 'bg-yellow-400' }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                            {{-- Optional: Lihat detail
                            <a href="{{ route('booking.show', $booking->id) }}" class="text-sm text-[#497D74] hover:underline">
                                Lihat Detail
                            </a> --}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
    @endsection

</body>
</html>
