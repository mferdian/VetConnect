<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="p-8 bg-white rounded-lg shadow-lg w-96">
        <h2 class="mb-6 text-2xl font-bold text-center">Login</h2>
        <form>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="username">
                    Username
                </label>
                <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username">
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                    Password
                </label>
                <input class="w-full px-3 py-2 mb-3 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
            </div>
            <div class="flex items-center justify-between">
                <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline" type="button">
                    Sign In
                </button>
                <a class="inline-block text-sm font-bold text-blue-500 align-baseline hover:text-blue-800" href="#">
                    Forgot Password?
                </a>
            </div>
        </form>
        <p class="mt-6 text-xs text-center text-gray-500">
            Don't have an account? <a href="/register" class="text-blue-500 hover:text-blue-800">Register here</a>.
        </p>
    </div>
</body>
</html>