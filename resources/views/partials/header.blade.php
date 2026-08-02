<!-- Top Notification Bar -->
 <style>
  @keyframes marquee {
    0% {
        transform: translateX(-100%);
    }
    100% {
        transform: translateX(0%);
    }

}
 </style>
<div class="bg-[#8A151B] text-white text-[11px] font-medium tracking-wider py-2.5 px-4 border-b border-black/10 overflow-hidden">
    <!-- Mobile Marquee View (Visible on small screens) -->
    <div class="block sm:hidden whitespace-nowrap overflow-hidden">
        <div class="inline-block animate-[marquee_15s_linear_infinite] space-x-8">
            <span>🚚 FREE SHIPPING on all orders over PKR 5000</span>
            <span>🔥 NEW ARRIVALS – UP TO 30% OFF</span>
            <span>📞 <a href="tel:+923090386227" class="underline">+92 309 0386227</a></span>
            <span>💬 <a href="/contact-us" class="underline">Help & Support</a></span>
        </div>
        <!-- Duplicate for Smooth Continuous Loop -->
        <div class="inline-block animate-[marquee_15s_linear_infinite] space-x-8" aria-hidden="true">
            <span>🚚 FREE SHIPPING on all orders over PKR 5000</span>
            <span>🔥 NEW ARRIVALS – UP TO 30% OFF</span>
            <span>📞 <a href="tel:+923090386227" class="underline">+92 309 0386227</a></span>
            <span>💬 <a href="/contact-us" class="underline">Help & Support</a></span>
        </div>
    </div>

    <!-- Desktop View (Visible on sm and larger screens) -->
    <div class="hidden sm:flex max-w-7xl mx-auto justify-between items-center">
        <div class="flex items-center space-x-2">
            <span>FREE SHIPPING on all orders over PKR 5000</span>
        </div>
        <div class="flex items-center space-x-2">
            <span>NEW ARRIVALS – UP TO 30% OFF</span>
        </div>
        <div class="flex items-center space-x-6">
            <a href="tel:+923090386227" class="hover:opacity-80 transition">📞 +92 309 0386227</a>
            <a href="/contact-us" class="hover:opacity-80 transition">Help & Support</a>
        </div>
    </div>
</div>

<!-- Main Navigation Bar -->
<nav class="bg-white/70 backdrop-blur-xl sticky top-0 z-50 border-b border-white/30 shadow-[0_8px_30px_rgb(0,0,0,0.04)]" x-data="{ open: false, showSearch: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 sm:h-20 items-center relative">

            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="/" class="block group">
                    <img src="{{ asset('assets/logo/logo.png') }}"
                         alt="Shan-E-Libas Logo"
                         class="h-14 sm:h-20 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
                </a>
            </div>

            <!-- Desktop Nav Links -->
            <div class="hidden md:flex space-x-7 font-bold text-xs tracking-widest uppercase" x-show="!showSearch">
                <a href="/" class="{{ Request::is('/') ? 'text-[#8A151B]' : 'text-gray-600 hover:text-[#8A151B]' }} transition pb-1">Home</a>
                <a href="/categories" class="{{ Request::is('categories') ? 'text-[#8A151B]' : 'text-gray-600 hover:text-[#8A151B]' }} transition pb-1">Categories</a>
                <a href="{{ route('products.all') }}" class="{{ Route::is('products.all') ? 'text-[#8A151B]' : 'text-gray-600 hover:text-[#8A151B]' }} transition pb-1">All Products</a>
                <a href="/about-us" class="{{ Request::is('about-us') ? 'text-[#8A151B]' : 'text-gray-600 hover:text-[#8A151B]' }} transition pb-1">About Us</a>
                <a href="/contact-us" class="{{ Request::is('contact-us') ? 'text-[#8A151B]' : 'text-gray-600 hover:text-[#8A151B]' }} transition pb-1">Contact Us</a>
            </div>

           <!-- 🔍 Inline Slide-down Search Bar (With Live Suggestions) -->
        <div class="absolute inset-x-0 mx-4 sm:mx-6 lg:mx-8 max-w-xl left-1/2 -translate-x-1/2"
            x-data="{ suggestions: [], fetchSuggestions() {
                let q = $refs.searchInput.value;
                if(q.length < 2) { this.suggestions = []; return; }
                fetch(`/api/search-suggestions?search=${q}`)
                    .then(res => res.json())
                    .then(data => { this.suggestions = data; });
            }}"
            x-show="showSearch"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            style="display: none;"
            @click.outside="showSearch = false; suggestions = [];">
            
            <div class="relative w-full">
                <form action="{{ route('products.all') }}" method="GET" class="relative flex items-center w-full">
                    <input type="text" 
                        name="search" 
                        value="{{ request('search') }}"
                        placeholder="Search products, premium fabrics..." 
                        class="w-full bg-gray-50 border border-gray-200 rounded-full py-2 pl-4 pr-10 text-sm focus:outline-none focus:border-[#8A151B] focus:ring-1 focus:ring-[#8A151B] transition"
                        x-ref="searchInput"
                        @input.debounce.300ms="fetchSuggestions()"> <!-- Word likhte hi trigger hoga -->
                    <button type="button" @click="showSearch = false; suggestions = [];" class="absolute right-3 text-gray-400 hover:text-gray-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </form>

                <!-- 🎯 Live Suggestions Dropdown List -->
                <div class="absolute left-0 right-0 mt-2 bg-white border border-gray-100 rounded-xl shadow-xl max-h-60 overflow-y-auto z-50 divide-y divide-gray-50"
                    x-show="suggestions.length > 0"
                    style="display: none;">
                    <template x-for="item in suggestions" :key="item.id">
                        <a :href="`/product/${item.slug}`" class="flex items-center gap-3 px-4 py-2.5 hover:bg-gray-50 transition">
                            <!-- Thumbnail -->
                            <img :src="item.image_url" class="w-8 h-8 object-cover rounded-md bg-gray-100">
                            <!-- Product Info -->
                            <div class="flex flex-col">
                                <span class="text-sm font-medium text-gray-800" x-text="item.name"></span>
                                <span class="text-xs text-gray-500" x-text="`Rs. ${parseInt(item.price).toLocaleString()}`"></span>
                            </div>
                        </a>
                    </template>
                </div>
            </div>
        </div>

            <!-- Right Icons + Hamburger -->
            <div class="flex items-center space-x-3 text-gray-700">
                <!-- Search Button (Toggles Form) -->
                <button @click="showSearch = !showSearch; if(showSearch) $nextTick(() => $refs.searchInput.focus());" 
                        class="p-2 hover:text-[#8A151B] transition cursor-pointer"
                        :class="{ 'text-[#8A151B]': showSearch }">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
                
                <!-- Account (hidden on mobile) -->
                <!-- <a href="/admin" class="p-2 hover:text-[#8A151B] transition hidden sm:block">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </a> -->
                
                <!-- Wishlist -->
                <!-- <button class="p-2 hover:text-[#8A151B] transition relative">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                </button> -->
                
                <!-- Cart -->
                <a href="{{ route('cart.index') }}" class="relative p-2 hover:text-[#8A151B] transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    <span id="cart-count" class="absolute top-1 right-1 bg-[#8A151B] text-white text-[9px] font-bold w-4 h-4 rounded-full flex items-center justify-center">
                        {{ session('cart') ? array_sum(array_column(session('cart'), 'quantity')) : 0 }}
                    </span>
                </a>
                
                <!-- Hamburger Button (mobile only) -->
                <button class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition text-gray-700 focus:outline-none"
                        @click="open = !open"
                        aria-label="Toggle Menu">
                    <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Dropdown Menu -->
    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="md:hidden border-t border-gray-100 bg-white shadow-lg"
         style="display: none;">
        <div class="px-4 py-3 space-y-1">
            <a href="/" class="flex items-center px-3 py-3 text-sm uppercase tracking-wider {{ Request::is('/') ? 'font-bold text-[#8A151B]' : 'font-semibold text-gray-700 hover:text-[#8A151B] hover:bg-gray-50' }} rounded-lg transition border-b border-gray-50" @click="open = false">Home</a>
            <a href="/categories" class="flex items-center px-3 py-3 text-sm uppercase tracking-wider {{ Request::is('categories') ? 'font-bold text-[#8A151B]' : 'font-semibold text-gray-700 hover:text-[#8A151B] hover:bg-gray-50' }} rounded-lg transition border-b border-gray-50" @click="open = false">Categories</a>
            <a href="{{ route('products.all') }}" class="flex items-center px-3 py-3 text-sm uppercase tracking-wider {{ Route::is('products.all') ? 'font-bold text-[#8A151B]' : 'font-semibold text-gray-700 hover:text-[#8A151B] hover:bg-gray-50' }} rounded-lg transition border-b border-gray-50" @click="open = false">All Products</a>
            <a href="/about-us" class="flex items-center px-3 py-3 text-sm uppercase tracking-wider {{ Request::is('about-us') ? 'font-bold text-[#8A151B]' : 'font-semibold text-gray-700 hover:text-[#8A151B] hover:bg-gray-50' }} rounded-lg transition border-b border-gray-50" @click="open = false">About Us</a>
            <a href="/contact-us" class="flex items-center px-3 py-3 text-sm uppercase tracking-wider {{ Request::is('contact-us') ? 'font-bold text-[#8A151B]' : 'font-semibold text-gray-700 hover:text-[#8A151B] hover:bg-gray-50' }} rounded-lg transition border-b border-gray-50" @click="open = false">Contact Us</a>
            <a href="/customize-dress" class="flex items-center px-3 py-3 text-sm uppercase tracking-wider {{ Request::is('customize-dress') ? 'font-bold text-[#8A151B]' : 'font-semibold text-gray-700 hover:text-[#8A151B] hover:bg-gray-50' }} rounded-lg transition" @click="open = false">Customize Dress</a>
        </div>
    </div>
</nav>