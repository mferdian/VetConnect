    @extends('layouts.app')

    @section('title', 'VetConnect - My-Order')

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
                                {{ $booking->status === 'confirmed' ? 'bg-green-500' : 'bg-yellow-400' }}">
                                {{ ucfirst($booking->status) }}
                            </span>

                            @if( $booking->status === 'confirmed' && !$booking->review)
                                <a href="{{ route('review.create', $booking->id) }}" class="text-sm text-[#497D74] hover:underline">
                                    Beri Review
                                </a>
                            @elseif($booking->review)
                                <p class="text-xs text-gray-500">Sudah direview</p>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
    @endsection
