<!-- Top Notification Bar -->
<div class="bg-[#8A151B] text-white text-[11px] font-medium tracking-wider py-2.5 px-4 hidden sm:block border-b border-black/10">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <span>FREE SHIPPING on all orders over PKR 5000</span>
        </div>
        <div class="flex items-center space-x-2">
            <span>NEW ARRIVALS – UP TO 30% OFF</span>
        </div>
        <div class="flex items-center space-x-6">
            <a href="tel:+923001234567" class="hover:opacity-80 transition">📞 +92 300 1234567</a>
            <a href="#" class="hover:opacity-80 transition">Help & Support</a>
        </div>
    </div>
</div>

<!-- Main Navigation Bar -->
<nav class="bg-white/70 backdrop-blur-xl sticky top-0 z-50 border-b border-white/30 shadow-[0_8px_30px_rgb(0,0,0,0.04)]" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 sm:h-20 items-center">

            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="/" class="block group">
                    <img src="{{ asset('assets/logo/logo.png') }}"
                         alt="Shan-E-Libas Logo"
                         class="h-14 sm:h-20 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
                </a>
            </div>

            <!-- Desktop Nav Links -->
            <div class="hidden md:flex space-x-7 font-bold text-xs tracking-widest uppercase">
                <a href="/" class="text-[#8A151B] hover:opacity-90 transition pb-1">Home</a>
                <a href="/categories" class="text-gray-600 hover:text-[#8A151B] transition pb-1">Categories</a>
                <a href="{{ route('products.all') }}" class="text-gray-600 hover:text-[#8A151B] transition pb-1">All Products</a>
                <a href="/about-us" class="text-gray-600 hover:text-[#8A151B] transition pb-1">About Us</a>
                <a href="/customize-dress" class="text-gray-600 hover:text-[#8A151B] transition pb-1">Customize Dress</a>
            </div>

            <!-- Right Icons + Hamburger -->
            <div class="flex items-center space-x-3 text-gray-700">
                <!-- Search -->
                <button class="p-2 hover:text-[#8A151B] transition cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
                <!-- Account (hidden on mobile) -->
                <a href="/admin" class="p-2 hover:text-[#8A151B] transition hidden sm:block">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </a>
                <!-- Wishlist -->
                <button class="p-2 hover:text-[#8A151B] transition relative">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                </button>
                <!-- Cart -->
                <a href="#" class="relative p-2 hover:text-[#8A151B] transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    <span class="absolute top-1 right-1 bg-[#8A151B] text-white text-[9px] font-bold w-4 h-4 rounded-full flex items-center justify-center">0</span>
                </a>
                <!-- Hamburger Button (mobile only) -->
                <button
                    class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition text-gray-700 focus:outline-none"
                    @click="open = !open"
                    aria-label="Toggle Menu">
                    <!-- Hamburger icon -->
                    <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <!-- Close icon -->
                    <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Dropdown Menu -->
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="md:hidden border-t border-gray-100 bg-white shadow-lg"
        style="display: none;">
        <div class="px-4 py-3 space-y-1">
            <a href="/" class="flex items-center px-3 py-3 text-sm font-bold uppercase tracking-wider text-[#8A151B] border-b border-gray-50" @click="open = false">
                🏠 Home
            </a>
            <a href="/categories" class="flex items-center px-3 py-3 text-sm font-semibold uppercase tracking-wider text-gray-700 hover:text-[#8A151B] hover:bg-gray-50 rounded-lg transition border-b border-gray-50" @click="open = false">
                🗂️ Categories
            </a>
            <a href="/products" class="flex items-center px-3 py-3 text-sm font-semibold uppercase tracking-wider text-gray-700 hover:text-[#8A151B] hover:bg-gray-50 rounded-lg transition border-b border-gray-50" @click="open = false">
                👗 All Products
            </a>
            <a href="/about-us" class="flex items-center px-3 py-3 text-sm font-semibold uppercase tracking-wider text-gray-700 hover:text-[#8A151B] hover:bg-gray-50 rounded-lg transition border-b border-gray-50" @click="open = false">
                ℹ️ About Us
            </a>
            <a href="/customize-dress" class="flex items-center px-3 py-3 text-sm font-semibold uppercase tracking-wider text-gray-700 hover:text-[#8A151B] hover:bg-gray-50 rounded-lg transition" @click="open = false">
                ✂️ Customize Dress
            </a>
        </div>
    </div>
</nav>
