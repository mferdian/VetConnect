<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VetConnect - Payment History</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                    <tr class="border-b">
                        <td class="py-2">Herjuna Taraka</td>
                        <td>Mar 1, 2023</td>
                        <td>Rp 300.000</td>
                        <td>08:00</td>
                        <td class="text-green-500">Success</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2">Birra Soddaq</td>
                        <td>Jan 26, 2023</td>
                        <td>Rp 300.000</td>
                        <td>16:00</td>
                        <td class="text-green-500">Success</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2">Fikri Rizany</td>
                        <td>Feb 28, 2033</td>
                        <td>Rp 500.000</td>
                        <td>08:00</td>
                        <td class="text-red-500">Rejected</td>
                    </tr>
                    <tr>
                        <td class="py-2">Rifat Farhan</td>
                        <td>March 18, 2033</td>
                        <td>Rp 100.000</td>
                        <td>12:00</td>
                        <td class="text-blue-500">Pending</td>
                    </tr>
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
