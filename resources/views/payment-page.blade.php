<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - VetConnect</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/payment.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root {
            --primary-color: #497D74;
            --primary-hover: #3a645c;
        }
    </style>
</head>
<body class="bg-gray-100">

    @extends('layouts.app')

    @section('content')
    <div class="max-w-lg p-8 mx-auto mt-12 bg-white shadow-lg rounded-2xl">
        <div class="mb-6 text-center">
            <h2 class="text-3xl font-bold text-gray-800">Konfirmasi Pembayaran</h2>
            <p class="text-sm text-gray-500">Silakan periksa detail pembayaran di bawah ini</p>
        </div>

        <div class="space-y-4 text-gray-700">
            <div class="flex justify-between">
                <span>Dokter</span>
                <strong>{{ $vet->nama }}</strong>
            </div>
            <div class="flex justify-between">
                <span>Biaya Konsultasi</span>
                <strong>Rp {{ number_format($vet->harga, 0, ',', '.') }}</strong>
            </div>
            <div class="flex justify-between">
                <span>Biaya Admin</span>
                <strong>Rp 5.000</strong>
            </div>
            <hr class="my-4 border-gray-300 border-dashed">
            <div class="flex justify-between text-lg font-semibold text-[#497D74]">
                <span>Total</span>
                <span>Rp {{ number_format($vet->harga + 5000, 0, ',', '.') }}</span>
            </div>
        </div>

        <form id="payment-form" action="{{ route('payment.confirm') }}" method="POST" class="mt-8">
            @csrf
            <input type="hidden" name="status" value="berhasil">
            <input type="hidden" name="vet_id" value="{{ $vet->id }}">
            <button type="submit" class="w-full bg-[#497D74] hover:bg-[#3a645c] text-white font-semibold py-3 rounded-lg transition duration-300">
                Bayar Sekarang
            </button>
        </form>
    </div>
    @endsection

</body>
</html>
