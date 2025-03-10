<nav class="py-4 bg-white shadow-md">
    <div class="container flex flex-wrap items-center justify-between px-6 mx-auto">
        <!-- Logo -->
        <h1 class="text-2xl font-bold text-gray-700">Vet<span class="text-[#497D74]">Connect</span></h1>
        <button type="button" class="p-2 ml-auto text-gray-500 rounded-md md:hidden hover:bg-gray-100 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
        <ul class="flex-col hidden w-full text-gray-600 md:flex md:flex-row md:w-auto md:space-x-6 md:items-center">
            <li><a class="block py-2 text-gray-600 hover:text-gray-800" href="{{ route('index') }}">Home</a></li>
            <li><a class="block py-2 text-gray-600 hover:text-gray-800" href="{{ route('booking') }}">Doctors</a></li>
            <li><a class="block py-2 text-gray-600 hover:text-gray-800" href="#">Services</a></li>
            <li><a class="block py-2 text-gray-600 hover:text-gray-800" href="{{ route('articlePage') }}">Articles</a></li>
        </ul>
        <button class="flex items-center px-4 py-2 bg-white border rounded-full shadow-md">
                <span>Gunawan Wibisono | 19</span>
                <img src="{{ asset('images/Gunawan.png')}}" class="w-8 h-8 ml-2 rounded-full">
        </button>
    </div>
</nav>
