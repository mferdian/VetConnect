<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

<section class="bg-white">
  <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
    <section class="relative flex items-end h-12 bg-gray-900 lg:col-span-5 lg:h-full xl:col-span-6">
      <img
        alt=""
        src={{ asset('images/Dog.png')}}
        class="absolute inset-0 object-cover w-full h-full opacity-80"
      />

      <div class="hidden lg:relative lg:block lg:p-12">
        <h2 class="mt-6 text-2xl font-bold text-white sm:text-3xl md:text-4xl">
          Welcome to Vet<span class="text-emerald-800">Connect</span>
        </h2>

        <p class="mt-4 leading-relaxed text-white/90">
            Sign in to your account to access your personalized experience.
        </p>
      </div>
    </section>

    <main
      class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6"
    >
      <div class="max-w-xl lg:max-w-3xl">
        <div class="relative block -mt-16 lg:hidden">
          <a
            class="inline-flex items-center justify-center text-blue-600 bg-white rounded-full size-16 sm:size-20"
            href="#"
          >

          </a>

          <h1 class="mt-2 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl">
             Welcome to Vet<span class="text-emerald-800">Connect</span>
          </h1>

          <p class="mt-4 leading-relaxed text-gray-500">
            Sign in to your account to access your personalized experience.
          </p>
        </div>

        <form action="#" class="grid grid-cols-3 gap-6 mt-1">
          <div class="col-span-6">
            <label for="Nama" class="block mb-2 text-sm font-medium text-gray-700">Nama</label>
            <div class="relative">
                <input
                type="nama"
                id="Nama"
                name="nama"
                placeholder="Gunawan Wibisono"
                class="w-full pl-10 mt-1 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 outline-none shadow-sm"
                />
            </div>
          </div>

          <div class="col-span-6">
            <label for="Email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
            <div class="relative">
                <input
                type="email"
                id="Email"
                name="email"
                placeholder="nama@contoh.com"
                class="w-full pl-10 mt-1 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 outline-none shadow-sm"
                />
            </div>
          </div>

          <div class="col-span-6">
            <label for="Email" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
            <div class="relative">
                <input
                type="password"
                id="Password"
                name="password"
                class="w-full pl-10 mt-1 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 outline-none shadow-sm"
                />
            </div>
          </div>


          <div class="col-span-6">
            <p class="text-sm text-gray-500">
              By creating an account, you agree to our
              <a href="#" class="text-gray-700 underline"> terms and conditions </a>
              and
              <a href="#" class="text-gray-700 underline">privacy policy</a>.
            </p>
          </div>

          <div class="col-span-6">
            <button
              class="inline-block px-12 py-3 text-sm font-medium text-white transition border rounded-md border-emerald-800 bg-emerald-800 shrink-0 hover:bg-transparent hover:text-emerald-800 focus:ring-3 focus:outline-hidden"
            >
              Create an account
            </button>

            <p class="mt-4 text-sm text-gray-500 sm:mt-5">
              Already have an account?
              <a href="{{ route('login') }}" class="text-gray-700 underline">Log in</a>.
            </p>
          </div>
        </form>
      </div>
    </main>
  </div>
</section>

</body>
