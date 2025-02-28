<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <section class="min-h-screen">
        <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
            <section class="relative flex items-end bg-gray-900 lg:col-span-5 lg:h-full xl:col-span-6">
                <img
                    alt="VetConnect Image"
                    src="{{ asset('images/Dog.png') }}"
                    class="absolute inset-0 object-cover w-full h-full opacity-80"
                />
                <div class="hidden lg:relative lg:block lg:p-12">
                    <h2 class="mt-6 text-2xl font-bold text-white sm:text-3xl md:text-4xl">
                        Welcome to Vet<span class="text-emerald-500">Connect</span>
                    </h2>
                    <p class="mt-4 leading-relaxed text-white/90">
                        Sign up for an account to access your personalized experience.
                    </p>
                </div>
            </section>

            <main class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6">
                <div class="max-w-xl lg:max-w-3xl">
                    <div class="relative block -mt-16 lg:hidden">
                        <h1 class="mt-2 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl">
                            Welcome to Vet<span class="text-emerald-800">Connect</span>
                        </h1>
                        <p class="mt-4 leading-relaxed text-gray-500">
                            Sign up for an account to access your personalized experience.
                        </p>
                    </div>

                    <form action="#" method="POST" class="grid grid-cols-6 gap-6 mt-8">
                        @csrf
                        <div class="col-span-6">
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-700">Nama</label>
                            <input
                                type="text"
                                id="nama"
                                name="nama"
                                placeholder="Gunawan Wibisono"
                                class="w-full px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm outline-none focus:ring-emerald-500 focus:border-emerald-500"
                                required
                            />
                        </div>

                        <div class="col-span-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                placeholder="nama@contoh.com"
                                class="w-full px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm outline-none focus:ring-emerald-500 focus:border-emerald-500"
                                required
                            />
                        </div>

                        <div class="col-span-6">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Masukkan password"
                                class="w-full px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm outline-none focus:ring-emerald-500 focus:border-emerald-500"
                                required
                            />
                        </div>

                        <div class="col-span-6">
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-700">Confirm Password</label>
                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                placeholder="Konfirmasi password"
                                class="w-full px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm outline-none focus:ring-emerald-500 focus:border-emerald-500"
                                required
                            />
                        </div>

                        <div class="col-span-6">
                            <label for="terms" class="flex items-start gap-4">
                                <input
                                    type="checkbox"
                                    id="terms"
                                    name="terms"
                                    class="w-4 h-4 mt-1 bg-white border-gray-300 rounded text-emerald-600 focus:ring-emerald-500"
                                    required
                                />
                                <span class="text-sm text-gray-500">
                                    By creating an account, you agree to our
                                    <a href="#" class="text-emerald-600 hover:text-emerald-700">terms and conditions</a>
                                    and
                                    <a href="#" class="text-emerald-600 hover:text-emerald-700">privacy policy</a>.
                                </span>
                            </label>
                        </div>

                        <div class="col-span-6">
                            <button
                                type="submit"
                                class="w-full px-6 py-3 text-sm font-medium text-white transition rounded-md bg-emerald-800 hover:bg-emerald-700 focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 focus:outline-none"
                            >
                                Create an account
                            </button>
                            <p class="mt-4 text-sm text-center text-gray-500">
                                Already have an account?
                                <a href="{{ route('login') }}" class="font-medium text-emerald-600 hover:text-emerald-700">Log in</a>
                            </p>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </section>
</body>
</html>
