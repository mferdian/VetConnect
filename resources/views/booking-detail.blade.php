<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Dokter - VetConnect</title>

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/booking-detail.js'])

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #497D74;
            --primary-hover: #3a645c;
            --light-primary: rgba(73, 125, 116, 0.1);
        }
        .date-cell.selected, .time-slot.selected {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }
        .date-cell {
            transition: all 0.2s ease;
            border: 1px solid #e5e7eb;
        }
        .date-cell:hover:not(.selected) {
            border-color: var(--primary-color);
            background-color: var(--light-primary);
        }
        .time-slot {
            padding: 0.75rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            text-align: center;
            transition: all 0.2s ease;
        }
        .time-slot:hover:not(.selected) {
            border-color: var(--primary-color);
            color: var(--primary-color);
            background-color: var(--light-primary);
        }
        .booking-card {
            transition: transform 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        .booking-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
        .disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
    </style>
</head>
<body class="font-sans bg-gray-100">
    @extends('layouts.app')

    @section('content')
    <div class="max-w-3xl px-6 py-10 mx-auto bg-white shadow-md rounded-xl">
        <h1 class="mb-6 text-2xl font-bold text-gray-800">Booking Dr. {{ $vet->nama }}</h1>

        <form method="POST" action="{{ route('booking.store') }}">
            @csrf

            <input type="hidden" name="vet_id" value="{{ $vet->id }}">

            {{-- Pilih Tanggal --}}
            <div class="mb-4">
                <label for="vet_date_id" class="block mb-2 font-semibold">Pilih Tanggal</label>
                <select name="vet_date_id" id="vet_date_id" class="w-full p-2 border border-gray-300 rounded-lg">
                    @foreach ($vet->vetDates as $date)
                        <option value="{{ $date->id }}">
                            {{ $date->tanggal->format('l, d F Y') }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Pilih Waktu --}}
            <div class="mb-4">
                <label for="vet_time_id" class="block mb-2 font-semibold">Pilih Waktu</label>
                <select name="vet_time_id" id="vet_time_id" class="w-full p-2 border border-gray-300 rounded-lg">
                    @foreach ($vet->vetDates->first()->vetTimes as $time)
                        <option value="{{ $time->id }}">{{ $time->jam }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Keluhan --}}
            <div class="mb-4">
                <label for="keluhan" class="block mb-2 font-semibold">Keluhan</label>
                <textarea name="keluhan" id="keluhan" rows="4"
                        class="w-full p-2 border border-gray-300 rounded-lg"
                        placeholder="Tuliskan keluhan Anda di sini..."></textarea>
            </div>

            {{-- Harga --}}
            <input type="hidden" name="harga" value="{{ $vet->harga + 5000 }}">

            {{-- Tombol Submit --}}
            <button type="submit" class="w-full bg-[#497D74] hover:bg-[#3a645c] text-white font-semibold py-3 rounded-lg">
                Lanjut ke Pembayaran
            </button>


        </form>
    </div>
    @endsection

</body>
</html>
