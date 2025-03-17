<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="max-w-4xl p-6 mx-auto mt-10 bg-white rounded-lg shadow-md">
        <!-- Profile Header -->
        <div class="flex items-center space-x-4">
            <img src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : asset('default-profile.png') }}"
                 alt="Profile Photo" class="w-20 h-20 rounded-full">
            <div>
                <h2 class="text-xl font-bold">{{ Auth::user()->name }}</h2>
                <p class="text-gray-600">{{ Auth::user()->email }}</p>
            </div>
            <a href="{{ route('profile.edit') }}" class="px-4 py-2 ml-auto text-white bg-blue-500 rounded hover:bg-blue-700">Edit</a>
        </div>

        <!-- Profile Details -->
        <div class="grid grid-cols-2 gap-4 mt-6">
            <div>
                <p class="text-gray-500">Full Name</p>
                <p class="font-semibold">{{ Auth::user()->name }}</p>
            </div>
            <div>
                <p class="text-gray-500">No Telpon</p>
                <p class="font-semibold">{{ Auth::user()->no_telp ?? '-' }}</p>
            </div>
            <div>
                <p class="text-gray-500">Umur</p>
                <p class="font-semibold">{{ Auth::user()->umur ?? '-' }}</p>
            </div>
        </div>

        {{-- <!-- Email List -->
        <div class="mt-6">
            <h3 class="font-semibold">My Email Address</h3>
            <p class="mt-2 text-gray-600">{{ Auth::user()->email }}</p>
            <p class="text-sm text-gray-400">1 month ago</p>
            <button class="px-4 py-2 mt-2 text-blue-500 border border-blue-500 rounded hover:bg-blue-500 hover:text-white">+ Add Email Address</button>
        </div> --}}
    </div>
</body>
</html>
