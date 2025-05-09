<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VetConnect - Payment History</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    @include('layouts._navbar')

    <!-- Payment History Section -->
    <div class="max-w-5xl mx-auto mt-6">
        <h2 class="mb-4 text-2xl font-semibold text-gray-800">Payment History</h2>

        <!-- Filter Buttons -->
        <div class="flex mb-4 space-x-4">
            <button class="px-6 py-2 font-medium text-gray-700 border rounded-full">All</button>
            <button class="px-6 py-2 font-medium text-gray-700 border rounded-full">Complete</button>
            <button class="px-6 py-2 font-medium text-gray-700 border rounded-full">Canceled</button>
        </div>

        <!-- Table -->
        <div class="p-4 bg-white rounded-lg shadow">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-600 border-b">
                        <th class="py-2">Dokter</th>
                        <th class="py-2">Date</th>
                        <th class="py-2">Amount</th>
                        <th class="py-2">Jam</th>
                        <th class="py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($paymentHistory as $transaction)
                        <tr class="border-b">
                            <td class="py-2">{{ $transaction->vet->nama ?? '-' }}</td> {{-- Nama Dokter (asumsi ada relasi ke model Vet) --}}
                            <td>{{ $transaction->vetDate->tanggal ?? '-' }}</td>
                            <td>Rp {{ number_format($transaction->total_harga, 0, ',', '.') }}</td> {{-- Total Harga --}}
                            <td>{{ $transaction->vetTime->jam_mulai ?? '-' }} - {{ $transaction->vetTime->jam_selesai ?? '-' }}</td>
                            <td>
                                @if ($transaction->status_bayar === 'berhasil')
                                    <span class="text-green-500">Success</span>
                                @elseif ($transaction->status_bayar === 'pending')
                                    <span class="text-blue-500">Pending</span>
                                @elseif ($transaction->status_bayar === 'gagal' || $transaction->status_bayar === 'canceled')
                                    <span class="text-red-500">{{ ucfirst($transaction->status_bayar) }}</span>
                                @else
                                    {{ ucfirst($transaction->status_bayar) ?? '-' }}
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="py-2 text-center" colspan="5">Tidak ada riwayat transaksi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-between mt-4 text-gray-600">
            <span>
                <select class="p-2 border rounded">
                    <option>10</option>
                    <option>20</option>
                    <option>50</option>
                </select> per page
            </span>
            <span>1 of 1 pages</span>
        </div>
    </div>

</body>
</html>
