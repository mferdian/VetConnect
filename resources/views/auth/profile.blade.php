<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
        <h2 class="mb-6 text-2xl font-bold text-center">Profile</h2>

        <!-- Display Success or Error Messages -->
        @if (session('success'))
            <div class="px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="px-4 py-3 mb-4 text-red-700 bg-red-100 border border-red-400 rounded">
                {{ session('error') }}
            </div>
        @endif

        <!-- Profile Information -->
        <div class="mb-6">
            <p class="text-gray-700"><strong>Name:</strong> {{ Auth::user()->name }}</p>
            <p class="text-gray-700"><strong>Email:</strong> {{ Auth::user()->email }}</p>
        </div>

        <!-- Edit Profile Form -->
        <form action="{{ route('profile.update') }}" method="POST" class="mb-6">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="name">Name</label>
                <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="name" name="name" type="text" value="{{ Auth::user()->name }}" required>
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="email">Email</label>
                <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="email" name="email" type="email" value="{{ Auth::user()->email }}" required>
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="password">New Password (leave blank to keep current)</label>
                <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="password" name="password" type="password">
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="password_confirmation">Confirm New Password</label>
                <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="password_confirmation" name="password_confirmation" type="password">
            </div>
            <div class="flex items-center justify-between">
                <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline" type="submit">
                    Update Profile
                </button>
            </div>
        </form>

        <!-- Logout Button -->
        <form action="{{ route('logout') }}" method="POST" class="mb-6">
            @csrf
            <button class="w-full px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700 focus:outline-none focus:shadow-outline" type="submit">
                Logout
            </button>
        </form>

        <!-- Delete Account Button (Optional) -->
        <form action="{{ route('profile.destroy') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
            @csrf
            @method('DELETE')
            <button class="w-full px-4 py-2 font-bold text-white bg-gray-500 rounded hover:bg-gray-700 focus:outline-none focus:shadow-outline" type="submit">
                Delete Account
            </button>
        </form>
    </div>
</body>
</html>
