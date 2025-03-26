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
            <li><a class="block py-2 text-gray-600 hover:text-gray-800" href="{{ route('home') }}">Home</a></li>
            <li><a class="block py-2 text-gray-600 hover:text-gray-800" href="{{ route('doctor') }}">Doctors</a></li>
            <li><a class="block py-2 text-gray-600 hover:text-gray-800" href="{{ route('aplication') }}">Aplikasi</a></li>
            <li><a class="block py-2 text-gray-600 hover:text-gray-800" href="{{ route('articles') }}">Articles</a></li>
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
                    <button class="flex items-center gap-2 px-4 py-2 transition-colors bg-white border rounded-full shadow-md hover:bg-gray-50">
                        <!-- Foto profil -->
                        @if(Auth::user()->profile_photo)
                            <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Profile Photo" class="object-cover w-8 h-8 rounded-full">
                        @else
                            <div class="flex items-center justify-center w-8 h-8 text-white rounded-full bg-emerald-800">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                        @endif
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div class="absolute right-0 invisible transition-all duration-300 transform translate-y-2 opacity-0 group-hover:visible group-hover:opacity-100 group-hover:translate-y-0">
                        <div class="w-48 py-2 bg-white rounded-md shadow-lg">
                            <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Profile</a>
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit Profile</a>
                            <a href="{{ route('history') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My History</a>
                            <div class="border-t border-gray-100"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full px-4 py-2 text-sm text-left text-red-600 hover:bg-gray-100">Log Out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endauth
    </div>
</nav>
<!-- Navbar End -->
