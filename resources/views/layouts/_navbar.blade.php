    <!-- Navbar -->
    <nav class="py-4 bg-white shadow-md">
        <div class="container flex flex-wrap items-center justify-between px-6 mx-auto">
            <!-- Logo -->
            <h1 class="text-2xl font-bold text-gray-700">
                Vet<span class="text-[#497D74]">Connect</span>
            </h1>

            <button type="button" class="p-2 ml-auto text-gray-500 rounded-md md:hidden hover:bg-gray-100 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>

            <ul class="flex-col hidden w-full text-gray-600 md:flex md:flex-row md:w-auto md:space-x-6 md:items-center">
                <li><a class="block py-2 text-gray-600 hover:text-gray-800" href="#">Home</a></li>
                <li><a class="block py-2 text-gray-600 hover:text-gray-800" href="#">Doctors</a></li>
                <li><a class="block py-2 text-gray-600 hover:text-gray-800" href="#">Services</a></li>
                <li><a class="block py-2 text-gray-600 hover:text-gray-800" href="#">Articles</a></li>
            </ul>

            <!-- Menampilkan Login & Register jika belum login -->
            @guest
                <div class="items-center hidden gap-4 md:flex">
                    <a class="px-4 py-2 text-sm font-medium text-white transition-colors rounded-md bg-emerald-800 hover:bg-teal-700" href="{{ route('login') }}">Login</a>
                    <a class="px-4 py-2 text-sm font-medium transition-colors bg-gray-100 rounded-md text-emerald-800 hover:text-teal-600 hover:bg-gray-200" href="{{ route('register') }}">Register</a>
                </div>
            @endguest

            <!-- Menampilkan info user jika sudah login -->
            @auth
                <div class="hidden md:flex">
                    <div class="relative group">
                        <a class="flex items-center px-4 py-2 transition-colors bg-white border rounded-full shadow-md hover:bg-gray-50" href="{{ route('profile') }}" class="absolute right-0 w-full"><span>{{ Auth::user()->name }}</span></a>
                    </div>
                </div>
            @endauth
        </div>
    </nav>
    <!-- Navbar End -->



