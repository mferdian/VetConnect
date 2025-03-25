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
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Payment History</h2>

        <!-- Filter Buttons -->
        <div class="flex space-x-4 mb-4">
            <button class="px-6 py-2 border rounded-full text-gray-700 font-medium">All</button>
            <button class="px-6 py-2 border rounded-full text-gray-700 font-medium">Complete</button>
            <button class="px-6 py-2 border rounded-full text-gray-700 font-medium">Canceled</button>
        </div>

        <!-- Table -->
        <div class="bg-white p-4 rounded-lg shadow">
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
                        <td>100</td>
                        <td>08:00</td>
                        <td class="text-green-500">Success</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2">Birra Soddaq</td>
                        <td>Jan 26, 2023</td>
                        <td>300</td>
                        <td>16:00</td>
                        <td class="text-green-500">Success</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2">#12436</td>
                        <td>Feb 12, 2033</td>
                        <td>100</td>
                        <td>1</td>
                        <td class="text-green-500">Success</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2">#16879</td>
                        <td>Feb 12, 2033</td>
                        <td>500</td>
                        <td>5</td>
                        <td class="text-green-500">Success</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2">#16378</td>
                        <td>Feb 28, 2033</td>
                        <td>500</td>
                        <td>5</td>
                        <td class="text-red-500">Rejected</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2">#16609</td>
                        <td>March 13, 2033</td>
                        <td>100</td>
                        <td>1</td>
                        <td class="text-green-500">Success</td>
                    </tr>
                    <tr>
                        <td class="py-2">#16907</td>
                        <td>March 18, 2033</td>
                        <td>100</td>
                        <td>1</td>
                        <td class="text-blue-500">Pending</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4 flex justify-between items-center text-gray-600">
            <span>
                <select class="border p-2 rounded">
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
