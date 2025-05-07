<footer class="py-12 text-gray-300 bg-gray-800">
    <div class="max-w-6xl px-4 mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
            <div>
                <h3 class="mb-4 text-lg font-semibold text-white">COLORLIB.COM</h3>
                <p class="text-sm">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <a href="#" class="inline-block mt-2 text-sm text-gray-400 hover:text-white">read more →</a>
            </div>
            <div>
                <h3 class="mb-4 text-lg font-semibold text-white">Discover</h3>
                <ul class="space-y-2 text-sm list-none">
                    <li><a href="#" class="hover:text-gray-400">Buy & Sell</a></li>
                    <li><a href="#" class="hover:text-gray-400">Merchant</a></li>
                    <li><a href="#" class="hover:text-gray-400">Giving back</a></li>
                    <li><a href="#" class="hover:text-gray-400">Help & Support</a></li>
                </ul>
            </div>
            <div>
                <h3 class="mb-4 text-lg font-semibold text-white">About</h3>
                <ul class="space-y-2 text-sm list-none">
                    <li><a href="#" class="hover:text-gray-400">Staff</a></li>
                    <li><a href="#" class="hover:text-gray-400">Team</a></li>
                    <li><a href="#" class="hover:text-gray-400">Careers</a></li>
                    <li><a href="#" class="hover:text-gray-400">Blog</a></li>
                </ul>
            </div>
            <div>
                <h3 class="mb-4 text-lg font-semibold text-white">Resources</h3>
                <ul class="space-y-2 text-sm list-none">
                    <li><a href="#" class="hover:text-gray-400">Security</a></li>
                    <li><a href="#" class="hover:text-gray-400">Global</a></li>
                    <li><a href="#" class="hover:text-gray-400">Charts</a></li>
                    <li><a href="#" class="hover:text-gray-400">Privacy</a></li>
                </ul>
            </div>
            <div>
                <h3 class="mb-4 text-lg font-semibold text-white">Social</h3>
                <ul class="space-y-2 text-sm list-none">
                    <li><a href="#" class="hover:text-gray-400">Facebook</a></li>
                    <li><a href="#" class="hover:text-gray-400">Twitter</a></li>
                    <li><a href="#" class="hover:text-gray-400">Instagram</a></li>
                    <li><a href="#" class="hover:text-gray-400">Googleplus</a></li>
                </ul>
            </div>
        </div>
        <div class="flex flex-col items-center justify-between py-4 mt-8 text-sm border-t border-gray-700 md:flex-row">
            <div class="mb-4 md:mb-0">
                <span class="text-gray-400">Our Partner:</span>
                <div class="inline-flex ml-2 space-x-4">
                    <button class="text-gray-400 hover:text-white focus:outline-none">COMPANY 01</button>
                    <button class="text-gray-400 hover:text-white focus:outline-none">COMPANY 02</button>
                    <button class="text-gray-400 hover:text-white focus:outline-none">COMPANY 03</button>
                    <button class="text-gray-400 hover:text-white focus:outline-none">COMPANY 04</button>
                    <button class="text-gray-400 hover:text-white focus:outline-none">COMPANY 05</button>
                    <button class="text-gray-400 hover:text-white focus:outline-none">COMPANY 06</button>
                </div>
            </div>
            <div>
                <a href="#" class="text-gray-400 hover:text-white">See All →</a>
            </div>
        </div>
        <div class="flex flex-col items-center justify-between py-4 mt-6 text-xs text-gray-400 border-t border-gray-700 md:flex-row">
            <p>&copy; Copyright 2024 All rights reserved | This template is made with <span class="text-red-500">♥</span> by <a href="https://colorlib.com" class="hover:text-white">Colorlib.com</a></p>
            <div class="flex space-x-4">
                <a href="#" class="hover:text-white">Terms</a>
                <a href="#" class="hover:text-white">Privacy</a>
                <a href="#" class="hover:text-white">Compliances</a>
            </div>
        </div>
    </div>
</footer>

<div class="py-8 bg-gray-100">
    <div class="flex items-center justify-center max-w-6xl px-4 mx-auto sm:px-6 lg:px-8">
        <h2 class="mr-6 text-2xl font-semibold text-gray-800">Footer #02</h2>
        <div class="flex rounded-md shadow-sm">
            <input type="email" class="block w-full min-w-0 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Enter email address">
            <button type="button" class="inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-white bg-gray-500 border border-transparent rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Subscribe
            </button>
        </div>
    </div>
</div>

<script>
    // Contoh sederhana untuk interaksi (bisa dikembangkan lebih lanjut)
    const partnerButtons = document.querySelectorAll('.inline-flex button');
    partnerButtons.forEach(button => {
        button.addEventListener('mouseover', () => {
            button.classList.add('underline');
        });
        button.addEventListener('mouseout', () => {
            button.classList.remove('underline');
        });
    });

    const seeAllLink = document.querySelector('.border-t > div:last-child > a');
    if (seeAllLink) {
        seeAllLink.addEventListener('click', (event) => {
            event.preventDefault();
            alert('Anda mengklik "See All"!');
            // Tambahkan logika atau navigasi sesuai kebutuhan Anda
        });
    }

    const subscribeButton = document.querySelector('.rounded-md button[type="button"]');
    const emailInput = document.querySelector('input[type="email"]');

    if (subscribeButton && emailInput) {
        subscribeButton.addEventListener('click', () => {
            const email = emailInput.value;
            if (email) {
                alert(`Berlangganan dengan email: ${email}`);
                emailInput.value = ''; // Bersihkan input setelah berlangganan
                // Tambahkan logika pengiriman data ke server jika diperlukan
            } else {
                alert('Silakan masukkan alamat email Anda.');
            }
        });
    }
</script>
