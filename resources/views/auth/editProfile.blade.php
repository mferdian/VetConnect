<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="max-w-4xl p-6 mx-auto mt-10 bg-white rounded-lg shadow-md">
        <h2 class="mb-4 text-2xl font-bold">Edit Profile</h2>

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Profile Photo -->
            <div class="mb-4">
                <label class="block mb-2 font-bold" for="profile_photo">Profile Photo</label>
                @if (Auth::user()->profile_photo)
                    <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Profile Photo" class="w-20 h-20 mb-2 rounded-full">
                @endif
                <input type="file" name="profile_photo" id="profile_photo" class="w-full p-2 border">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 font-bold">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label class="block mb-2 font-bold">Email</label>
                    <input type="email" name="email" value="{{ Auth::user()->email }}" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label class="block mb-2 font-bold">No HP</label>
                    <input type="text" name="no_telp" value="{{ Auth::user()->no_telp }}" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label class="block mb-2 font-bold">Umur</label>
                    <input type="text" name="umur" value="{{ Auth::user()->umur }}" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label class="block mb-2 font-bold">New Password</label>
                    <input type="password" name="password" class="w-full p-2 border rounded">
                </div>
                <div>
                    <label class="block mb-2 font-bold">Confirmasi Password</label>
                    <input type="password" name="password_confirmation" class="w-full p-2 border rounded">
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="px-4 py-2 text-white rounded bg-emerald-800 hover:bg-emerald-700">Save Changes</button>
                <a href="{{ route('profile') }}" class="px-4 py-2 ml-4 text-gray-500 border border-gray-500 rounded hover:bg-gray-500 hover:text-white">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
