<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-100">
    <div class="max-w-3xl p-8 mx-auto mt-10 bg-white rounded-lg shadow-md">
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center space-x-4">
                    @if(Auth::user()->profile_photo)
                        <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Profile Photo" class="object-cover rounded-full w-14 h-14">
                    @else
                        <div class="flex items-center justify-center text-white rounded-full w-14 h-14 bg-emerald-800">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                    @endif
                <div>
                    <h2 class="text-2xl font-semibold">{{ Auth::user()->name }}</h2>
                    <p class="text-gray-600">{{ Auth::user()->email }}</p>
                </div>
            </div>
            <a href="{{ route('profile.edit') }}" class="px-4 py-2 text-white transition-colors rounded bg-emerald-800 hover:bg-emerald-700">Edit Profil</a>
        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div class="p-4 rounded-lg bg-gray-50">
                <div class="flex items-center mb-2">
                    <i class="mr-2 text-gray-500 fas fa-user"></i>
                    <p class="font-semibold">Nama Lengkap</p>
                </div>
                <p class="text-gray-800">{{ Auth::user()->name }}</p>
            </div>

            <div class="p-4 rounded-lg bg-gray-50">
                <div class="flex items-center mb-2">
                    <i class="mr-2 text-gray-500 fas fa-phone"></i>
                    <p class="font-semibold">Nomor Telepon</p>
                </div>
                <p class="text-gray-800">{{ Auth::user()->no_telp ?? '-' }}</p>
            </div>

            <div class="p-4 rounded-lg bg-gray-50">
                <div class="flex items-center mb-2">
                    <i class="mr-2 text-gray-500 fas fa-calendar-alt"></i>
                    <p class="font-semibold">Umur</p>
                </div>
                <p class="text-gray-800">{{ Auth::user()->umur ?? '-' }}</p>
            </div>

            </div>

        </div>
</body>
</html>
