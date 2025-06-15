<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'VetConnect')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('head') <!-- Untuk custom meta tag dari child -->
</head>
<body class="flex flex-col min-h-screen bg-gray-100">

    @include('layouts._navbar')

    <main class="container flex-1 px-4 py-6 mx-auto sm:px-6 lg:px-8">
        @yield('content')
    </main>

</body>
</html>
