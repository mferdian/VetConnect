@extends('layouts.app')

@section('title', 'Payment Status- VetConnect')
@section('content')

<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-8 text-center bg-white rounded-lg shadow-md">
            <div class="mb-6">
                <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 bg-blue-100 rounded-full">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h1 class="mb-2 text-2xl font-bold text-gray-800">Pembayaran Sedang Diproses</h1>
                <p class="text-gray-600">
                    Terima kasih! Kami sedang memverifikasi pembayaran Anda.
                </p>
            </div>

            <div class="p-4 mb-6 rounded-lg bg-gray-50">
                <div class="mb-2 text-sm text-gray-600">Order ID:</div>
                <div class="font-mono text-lg font-bold">{{ $booking->order_id }}</div>
            </div>

            <div class="space-y-3">
                <p class="text-sm text-gray-600">
                    Status pembayaran akan diperbarui secara otomatis.
                    Anda akan menerima notifikasi setelah pembayaran dikonfirmasi.
                </p>

                <div class="flex space-x-3">
                    <a href="{{ route('myorder.index') }}"
                       class="flex-1 px-4 py-2 text-white transition duration-200 bg-blue-600 rounded-lg hover:bg-blue-700">
                        Lihat Pesanan Saya
                    </a>
                    <a href="{{ route('home') }}"
                       class="flex-1 px-4 py-2 text-gray-700 transition duration-200 bg-gray-300 rounded-lg hover:bg-gray-400">
                        Kembali ke Home
                    </a>
                </div>
            </div>

            <!-- Auto refresh untuk check status -->
            <script>
                // Auto refresh setiap 10 detik untuk check status
                let refreshCount = 0;
                const maxRefresh = 18; // 3 menit total (18 x 10 detik)

                const checkStatus = () => {
                    if (refreshCount < maxRefresh) {
                        setTimeout(() => {
                            refreshCount++;
                            window.location.reload();
                        }, 10000);
                    }
                };

                // Mulai auto refresh jika status masih pending
                @if($booking->status_bayar === 'pending')
                    checkStatus();
                @endif
            </script>
        </div>
    </div>
</body>

@endsection
