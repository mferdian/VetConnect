<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - VetConnect</title>
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
    @extends('layouts.app')

    @section('content')
    <div class="max-w-xl px-6 py-12 mx-auto bg-white rounded-lg shadow-lg">
        <h2 class="mb-6 text-2xl font-bold text-gray-800">Pembayaran</h2>

        <p class="mb-4">Dokter: <strong>{{ $vet->nama }}</strong></p>
        <p class="mb-4">Biaya Konsultasi: <strong>Rp {{ number_format($vet->harga, 0, ',', '.') }}</strong></p>
        <p class="mb-6">Biaya Admin: <strong>Rp 5.000</strong></p>

        <p class="mb-6 text-xl font-semibold text-[#497D74]">Total: Rp {{ number_format($vet->harga + 5000, 0, ',', '.') }}</p>

        <form action="{{ route('payment.confirm') }}" method="POST">
            @csrf
            <input type="hidden" name="status" value="berhasil">
            <input type="hidden" name="vet_id" value="{{ $vet->id }}">
            <button type="submit" class="w-full bg-[#497D74] hover:bg-[#3a645c] text-white font-semibold py-3 rounded-lg">
                Bayar Sekarang
            </button>
        </form>
    </div>
    @endsection

</body>
</html>
