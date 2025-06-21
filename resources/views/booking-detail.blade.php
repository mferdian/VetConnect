@extends('layouts.app')

@section('title', 'Booking - VetConnect')
@section('content')

    <body class="font-sans bg-gray-100">

        <div class="container px-4 py-8 mx-auto">
            <div
                class="max-w-2xl p-8 mx-auto transition duration-300 bg-white rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1">
                {{-- Info Dokter --}}
                <div class="flex items-center mb-6 space-x-4">
                    <img src="{{ $vet->foto ? asset('storage/' . $vet->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($vet->nama) . '&background=497D74&color=fff' }}"
                        alt="Dr. {{ $vet->nama }}" class="w-16 h-16 rounded-full">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Dr. {{ $vet->nama }}</h1>
                        <p class="text-gray-600">{{ $vet->spesialisasi ?? 'Dokter Hewan' }}</p>
                    </div>

                </div>

                {{-- Form Booking --}}
                <form method="POST" action="{{ route('booking.store') }}">
                    @csrf
                    <input type="hidden" name="vet_id" value="{{ $vet->id }}">

                    {{-- Tanggal & Waktu --}}
                    <div class="mb-6">
                        <h3 class="mb-4 text-lg font-semibold text-gray-800">Detail Janji Temu</h3>

                        <div class="mb-6">
                            <label for="vet_date_id" class="block mb-2 font-medium text-gray-700">Pilih Tanggal
                                Konsultasi</label>
                            <select name="vet_date_id" id="vet_date_id"
                                class="w-full px-4 py-2 text-black border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-600 focus:border-teal-600">
                                @foreach ($vet->vetDates as $date)
                                    <option value="{{ $date->id }}">{{ $date->tanggal->translatedFormat('l, d F Y') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="vet_time_id" class="block mb-2 font-medium text-gray-700">Pilih Jam
                                Konsultasi</label>
                            <select name="vet_time_id" id="vet_time_id"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-600 focus:border-teal-600">
                                <option value="">Pilih waktu terlebih dahulu</option>
                            </select>
                        </div>
                    </div>

                    {{-- Keluhan --}}
                    <div class="mb-6">
                        <h3 class="mb-4 text-lg font-semibold text-gray-800">Informasi Pasien</h3>
                        <div class="mb-6">
                            <label for="keluhan" class="block mb-2 font-medium text-gray-700">Keluhan</label>
                            <textarea name="keluhan" id="keluhan" rows="4"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-600 focus:border-teal-600"
                                placeholder="Jelaskan kondisi hewan peliharaan Anda..."></textarea>
                        </div>
                    </div>

                    {{-- Harga --}}
                    <input type="hidden" name="harga" value="{{ $vet->harga + 5000 }}">
                    <div class="text-center">
                        <button type="submit"
                            class="w-full px-4 py-3 font-medium text-white transition duration-200 bg-teal-700 rounded-md hover:bg-teal-800">
                            <i class="mr-2 fas fa-calendar-check"></i> Konfirmasi Janji Temu
                        </button>

                        <p class="mt-4 text-sm text-gray-500">
                            <i class="mr-1 fas fa-info-circle"></i> Pembayaran dilakukan di halaman pembayaran
                        </p>
                    </div>
                </form>
            </div>
        </div>
    @endsection

</body>

</html>
