@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,400&display=swap');
    
    /* Hide scrollbar for horizontal scrolling elements */
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>

<div class="bg-[#FDFBF7] min-h-screen font-sans pb-10"
    x-data="{ 
        categoryId: '{{ $category_id ?? '' }}', 
        tag: '{{ $tag_name ?? '' }}', 
        sort: '{{ request('sort', 'latest') }}', 
        search: '{{ request('search', '') }}', 
        loading: false,
        productsCount: {{ $products->count() }},
        
        fetchProducts() {
            this.loading = true;
            let baseUrl = '{{ url('/all-products') }}';
            let url = new URL(baseUrl, window.location.origin);
            
            if (this.categoryId) {
                url.pathname = '/all-products/' + this.categoryId;
            } else {
                url.pathname = '/all-products';
            }
            
            if (this.tag) url.searchParams.set('tag', this.tag);
            if (this.sort && this.sort !== 'latest') url.searchParams.set('sort', this.sort);
            if (this.search) url.searchParams.set('search', this.search);
            
            window.history.pushState({}, '', url);

            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                document.getElementById('product-grid-container').innerHTML = data.html;
                this.productsCount = data.count;
                this.loading = false;
            });
        }
    }">

    <!-- Hero Banner -->
    <div class="relative w-full overflow-hidden bg-[#241A14] flex items-center mb-12 sm:min-h-[450px] shadow-sm" style="background: linear-gradient(135deg, #3A2B24 0%, #1A130F 100%);">
        <!-- Subtle background pattern/image to represent fashion items -->
        <div class="absolute inset-0 opacity-10 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1441984904996-e0b6ba687e04?auto=format&fit=crop&w=1920&q=80');"></div>

        <div class="relative max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 w-full z-10 grid grid-cols-1 md:grid-cols-2 gap-8 items-center py-16">

            <!-- Text Content (Left) -->
            <div class="text-center md:text-left">
                <span class="inline-block py-1.5 px-4 rounded-full border border-[#D4AF37]/40 bg-[#D4AF37]/10 text-[#D4AF37] text-xs font-semibold tracking-[0.15em] uppercase mb-6 shadow-sm">
                    Premium Collections
                </span>
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-normal text-white mb-5 leading-tight tracking-wide" style="font-family: 'Cormorant Garamond', serif;">
                    All Products
                </h1>
                <p class="text-gray-300 text-sm sm:text-base leading-relaxed max-w-md mx-auto md:mx-0 font-light">
                    Browse our entire exquisite collection of premium clothing, luxury handbags, and flawless cosmetics, crafted with elegance just for you.
                </p>
            </div>

            <!-- Featured Card (Right) -->
            <div class="hidden md:flex justify-end relative items-center">
                <!-- Glassmorphic Card -->
                <div class="w-full max-w-md rounded-[2.5rem] p-8 relative overflow-hidden backdrop-blur-md bg-white/5 border border-white/10 shadow-2xl">
                    <!-- Sale Badge -->
                    <div class="absolute top-0 right-8 bg-[#ec729c] md:bg-[#D4AF37] text-white text-xs font-bold px-4 py-2 rounded-b-lg tracking-widest shadow-md">
                        HOT SALE
                    </div>

                    <!-- Product Image -->
                    <div class="flex justify-center mb-6 mt-4">
                        <img src="https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&w=400&q=80" alt="Featured Item" class="w-48 h-48 object-cover rounded-full border-4 border-white/10 shadow-xl group-hover:scale-105 transition-transform duration-500">
                    </div>

                    <!-- Product Info -->
                    <div class="text-center">
                        <h3 class="font-bold text-white text-xl mb-2" style="font-family: 'Cormorant Garamond', serif;">Exclusive Bridal Set</h3>
                        <div class="flex items-center justify-center gap-3 mb-6">
                            <span class="text-[#D4AF37] font-bold text-2xl">Rs. 8,500</span>
                            <span class="text-gray-400 line-through text-sm">Rs. 10,200</span>
                        </div>

                        <button class="w-full bg-white/10 hover:bg-[#D4AF37] border border-white/20 hover:border-[#D4AF37] text-white py-3.5 rounded-full transition-all duration-300 font-medium text-sm tracking-wide shadow-sm">
                            Grab Offer Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col lg:flex-row gap-10 lg:gap-14">

            <!-- Sidebar -->
            <div class="w-full lg:w-1/4 flex-shrink-0 space-y-10">

                <!-- Search -->
                <div x-data="{ searchOpen: false }">
                    <div class="flex items-center justify-between lg:block mb-4 lg:mb-5">
                        <h3 class="text-xl font-medium text-gray-900 hidden lg:block" style="font-family: 'Cormorant Garamond', serif;">Search</h3>
                        <!-- Mobile Search Toggle -->
                        <button @click="searchOpen = !searchOpen" class="lg:hidden w-full flex items-center justify-center gap-3 bg-white px-5 py-3.5 rounded-full border border-gray-100 shadow-sm text-gray-700 focus:outline-none hover:bg-gray-50 transition active:scale-95">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#D4AF37]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                            <span class="font-medium text-sm tracking-wide">Tap to Search Products</span>
                        </button>
                    </div>

                    <!-- Search Input Wrapper -->
                    <div x-show="searchOpen" x-transition class="lg:!block relative mt-2 lg:mt-0" style="display: none;">
                        <input type="text" x-model="search" @input.debounce.500ms="fetchProducts()" placeholder="Search products..." class="w-full bg-white border border-gray-100 rounded-full py-3.5 px-6 text-sm shadow-sm focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition-all placeholder-gray-400">
                        <button class="absolute right-5 top-1/2 transform -translate-y-1/2 text-[#D4AF37] hover:text-[#6E472D] transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                        </button>
                    </div>
                </div>

                <!-- Categories -->
                <div class="w-full overflow-hidden lg:overflow-visible">
                <h3 class="text-xl font-medium text-gray-900 mb-4 hidden lg:block" style="font-family: 'Cormorant Garamond', serif;">Categories</h3>
                <ul class="flex overflow-x-auto lg:flex-col lg:overflow-visible space-x-3 lg:space-x-0 lg:space-y-3 pb-2 lg:pb-0 scrollbar-hide items-center lg:items-stretch snap-x">

                    <li class="flex-shrink-0 snap-start">
                        <button @click="categoryId=''; tag=''; search=''; fetchProducts()" :class="!categoryId && !tag ? 'bg-[#6E472D] text-white shadow-md' : 'bg-white text-gray-600 border border-transparent hover:border-gray-100 hover:bg-gray-50 shadow-sm'" class="flex items-center justify-between rounded-full px-5 py-2.5 lg:px-6 lg:py-3 text-sm transition-transform hover:-translate-y-0.5 duration-300 w-full text-left">
                            <span class="font-medium tracking-wide whitespace-nowrap">All Products</span>
                        </button>
                    </li>

                    @foreach($categories as $category)
                        <li class="flex-shrink-0 snap-start">
                            <button @click="categoryId='{{ $category->id }}'; fetchProducts()"
                            :class="categoryId == '{{ $category->id }}' ? 'bg-[#6E472D] text-white border-[#6E472D]' : 'bg-white text-gray-600 border-transparent hover:border-gray-100 hover:bg-gray-50'" class="flex w-full items-center gap-2 lg:justify-between rounded-full px-5 py-2.5 lg:px-6 lg:py-3 text-sm shadow-sm border transition-all duration-300 group">

                                <span :class="categoryId == '{{ $category->id }}' ? 'text-white' : 'group-hover:text-[#6E472D]'" class="transition-colors whitespace-nowrap">
                                    {{ $category->name }}
                                </span>

                                @if(method_exists($category, 'products'))
                                    <span :class="categoryId == '{{ $category->id }}' ? 'bg-white text-[#6E472D]' : 'bg-[#D4AF37] text-white'" class="text-[10px] lg:text-xs font-bold rounded-full w-5 h-5 lg:w-6 lg:h-6 flex items-center justify-center shadow-inner shrink-0">
                                        {{ $category->products_count ?? 0 }}
                                    </span>
                                @endif
                            </button>
                        </li>
                    @endforeach

                </ul>
            </div>

                <!-- Popular Tags -->
                <div class="mt-2 lg:mt-8 w-full overflow-hidden lg:overflow-visible">
    <h3 class="text-xl font-medium text-gray-900 mb-4 hidden lg:block" style="font-family: 'Cormorant Garamond', serif;">Popular Tags</h3>
    <div class="flex overflow-x-auto lg:flex-wrap gap-2 pb-2 lg:pb-0 scrollbar-hide snap-x">

        @php
            $tags = [
                'bridal' => 'Bridal', 
                'casual' => 'Casual', 
                'handbags' => 'Handbags',
                'formal' => 'Formal', 
                'winter_wear' => 'Winter Wear', 
                'festive' => 'Festive',
                'luxury_wear' => 'Luxury Wear', 
                'silk' => 'Silk', 
                'heavy_work' => 'Heavy Work', 
                'event_wear' => 'Event Wear'
            ];
        @endphp
        @foreach($tags as $key => $label)
            <button @click="tag='{{ $key }}'; fetchProducts()"
               :class="tag == '{{ $key }}' ? 'bg-[#6E472D] text-white border-[#6E472D]' : 'bg-white text-gray-600 border-gray-100 hover:bg-gray-50 shadow-sm'"
               class="flex-shrink-0 snap-start px-4 py-2 rounded-full text-xs font-medium transition-all duration-300 border">
                {{ $label }}
            </button>
        @endforeach

    </div>
</div>
            </div>

            <!-- Main Content Area -->
            <div class="w-full lg:w-3/4">

                <!-- Toolbar -->
                <div class="flex flex-col sm:flex-row justify-between items-center bg-white p-4 px-6 rounded-2xl shadow-sm border border-gray-50 mb-8">
                    <p class="text-sm text-gray-500 mb-4 sm:mb-0">Showing <span class="font-bold text-gray-900" x-text="productsCount">{{ $products->count() }}</span> results</p>
                    <div class="flex items-center gap-3">
                        <span class="text-sm text-gray-500">Sort by:</span>
                       <div class="relative">
                        <select x-model="sort" @change="fetchProducts()"
                                class="appearance-none bg-gray-50 border border-gray-100 text-gray-700 text-sm rounded-xl focus:ring-1 focus:ring-[#D4AF37] focus:border-[#D4AF37] block py-2.5 pl-4 pr-10 outline-none cursor-pointer hover:bg-gray-100 transition-colors">

                            <option value="latest">Latest</option>
                            <option value="price_low">Price: Low to High</option>
                            <option value="price_high">Price: High to Low</option>
                        </select>

                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- Product Grid -->
                <div id="product-grid-container" :class="loading ? 'opacity-50' : ''" class="transition-opacity duration-300">
                    @include('partials.product_grid')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
