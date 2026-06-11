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

<div class="bg-[#FDFBF7] min-h-screen font-sans pb-10">

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
                        <input type="text" placeholder="Search products..." class="w-full bg-white border border-gray-100 rounded-full py-3.5 px-6 text-sm shadow-sm focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition-all placeholder-gray-400">
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
                        <a href="{{ route('products.all') }}" class="flex items-center justify-between {{ is_null($category_id) ? 'bg-[#6E472D] text-white shadow-md' : 'bg-white text-gray-600 border border-transparent hover:border-gray-100 hover:bg-gray-50 shadow-sm' }} rounded-full px-5 py-2.5 lg:px-6 lg:py-3 text-sm transition-transform hover:-translate-y-0.5 duration-300">
                            <span class="font-medium tracking-wide whitespace-nowrap">All Products</span>
                        </a>
                    </li>

                    @foreach($categories as $category)
                        <li class="flex-shrink-0 snap-start">
                            <a href="{{ route('products.all', $category->id) }}"
                            class="flex items-center gap-2 lg:justify-between rounded-full px-5 py-2.5 lg:px-6 lg:py-3 text-sm shadow-sm border transition-all duration-300 group
                                    {{ $category_id == $category->id ? 'bg-[#6E472D] text-white border-[#6E472D]' : 'bg-white text-gray-600 border-transparent hover:border-gray-100 hover:bg-gray-50' }}">

                                <span class="{{ $category_id == $category->id ? 'text-white' : 'group-hover:text-[#6E472D]' }} transition-colors whitespace-nowrap">
                                    {{ $category->name }}
                                </span>

                                @if(method_exists($category, 'products'))
                                    <span class="{{ $category_id == $category->id ? 'bg-white text-[#6E472D]' : 'bg-[#D4AF37] text-white' }} text-[10px] lg:text-xs font-bold rounded-full w-5 h-5 lg:w-6 lg:h-6 flex items-center justify-center shadow-inner shrink-0">
                                        {{ $category->products()->count() }}
                                    </span>
                                @endif
                            </a>
                        </li>
                    @endforeach

                </ul>
            </div>

                <!-- Popular Tags -->
                <div class="mt-2 lg:mt-8 w-full overflow-hidden lg:overflow-visible">
    <h3 class="text-xl font-medium text-gray-900 mb-4 hidden lg:block" style="font-family: 'Cormorant Garamond', serif;">Popular Tags</h3>
    <div class="flex overflow-x-auto lg:flex-wrap gap-2 pb-2 lg:pb-0 scrollbar-hide snap-x">

        <a href="{{ route('products.tag', 'bridal') }}"
           class="flex-shrink-0 snap-start px-4 py-2 rounded-full text-xs font-medium transition-all duration-300 border
                  {{ isset($tag_name) && $tag_name == 'bridal' ? 'bg-[#6E472D] text-white border-[#6E472D]' : 'bg-white text-gray-600 border-gray-100 hover:bg-gray-50 shadow-sm' }}">
            Bridal
        </a>

        <a href="{{ route('products.tag', 'formal') }}"
           class="flex-shrink-0 snap-start px-4 py-2 rounded-full text-xs font-medium transition-all duration-300 border
                  {{ isset($tag_name) && $tag_name == 'formal' ? 'bg-[#6E472D] text-white border-[#6E472D]' : 'bg-white text-gray-600 border-gray-100 hover:bg-gray-50 shadow-sm' }}">
            Formal
        </a>

        <a href="{{ route('products.tag', 'casual') }}"
           class="flex-shrink-0 snap-start px-4 py-2 rounded-full text-xs font-medium transition-all duration-300 border
                  {{ isset($tag_name) && $tag_name == 'casual' ? 'bg-[#6E472D] text-white border-[#6E472D]' : 'bg-white text-gray-600 border-gray-100 hover:bg-gray-50 shadow-sm' }}">
            Casual
        </a>

        <a href="{{ route('products.tag', 'handbags') }}"
           class="flex-shrink-0 snap-start px-4 py-2 rounded-full text-xs font-medium transition-all duration-300 border
                  {{ isset($tag_name) && $tag_name == 'handbags' ? 'bg-[#6E472D] text-white border-[#6E472D]' : 'bg-white text-gray-600 border-gray-100 hover:bg-gray-50 shadow-sm' }}">
            Handbags
        </a>

    </div>
</div>
            </div>

            <!-- Main Content Area -->
            <div class="w-full lg:w-3/4">

                <!-- Toolbar -->
                <div class="flex flex-col sm:flex-row justify-between items-center bg-white p-4 px-6 rounded-2xl shadow-sm border border-gray-50 mb-8">
                    <p class="text-sm text-gray-500 mb-4 sm:mb-0">Showing <span class="font-bold text-gray-900">{{ $products->count() }}</span> results</p>
                    <div class="flex items-center gap-3">
                        <span class="text-sm text-gray-500">Sort by:</span>
                       <div class="relative">
                        <select onchange="location = this.value;"
                                class="appearance-none bg-gray-50 border border-gray-100 text-gray-700 text-sm rounded-xl focus:ring-1 focus:ring-[#D4AF37] focus:border-[#D4AF37] block py-2.5 pl-4 pr-10 outline-none cursor-pointer hover:bg-gray-100 transition-colors">

                            <option value="{{ request()->fullUrlWithQuery(['sort' => 'latest']) }}"
                                    {{ request('sort') == 'latest' || !request('sort') ? 'selected' : '' }}>
                                Latest
                            </option>

                            <option value="{{ request()->fullUrlWithQuery(['sort' => 'price_low']) }}"
                                    {{ request('sort') == 'price_low' ? 'selected' : '' }}>
                                Price: Low to High
                            </option>

                            <option value="{{ request()->fullUrlWithQuery(['sort' => 'price_high']) }}"
                                    {{ request('sort') == 'price_high' ? 'selected' : '' }}>
                                Price: High to Low
                            </option>
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
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">

    @foreach($products as $product)
        <div class="bg-white rounded-[2rem] p-5 shadow-sm border border-gray-50 hover:shadow-xl hover:border-gray-100 transition-all duration-500 hover:-translate-y-1 group flex flex-col">

            <div class="relative w-full h-56 rounded-[1.5rem] overflow-hidden mb-5 bg-gray-50">
                @if($product->old_price && $product->old_price > $product->price)
                    <div class="absolute top-4 left-4 bg-red-500 text-white text-[10px] font-bold px-3 py-1 rounded-lg z-10 tracking-widest shadow-sm">SALE</div>
                @endif

                {{-- <a href="{{ route('product.show', $product->id) }}"> --}}
                    <a href="#">
                    <img src="{{ Str::startsWith($product->image, 'http') ? $product->image : asset('storage/' . $product->image) }}"
                         alt="{{ $product->name }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-in-out">
                </a>
            </div>

            <div class="flex-grow text-center">
                {{-- <a href="{{ route('product.show', $product->id) }}" class="block mb-1"> --}}
                    <a href="#" class="block mb-1">
                    <h3 class="font-bold text-gray-900 text-xl leading-tight group-hover:text-[#6E472D] transition-colors line-clamp-1" style="font-family: 'Cormorant Garamond', serif;">
                        {{ $product->name }}
                    </h3>
                </a>

                <p class="text-[11px] uppercase tracking-wider text-gray-400 mb-1 mt-3">Starting from</p>

                <div class="flex items-center justify-center gap-3 mb-5">
                    <span class="text-[#D4AF37] font-bold text-lg">Rs. {{ number_format($product->price) }}</span>
                    @if($product->old_price)
                        <span class="text-gray-400 line-through text-xs">Rs. {{ number_format($product->old_price) }}</span>
                    @endif
                </div>
            </div>

            <form action="#" method="POST" class="w-full mt-auto">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="quantity" value="1">

                <button type="submit" class="w-full bg-[#6E472D] hover:bg-[#5A3924] text-white flex items-center justify-center gap-2 py-3 rounded-xl transition-all duration-300 text-sm font-medium shadow-md hover:shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Add to Cart
                </button>
            </form>

        </div>
    @endforeach

</div>
            </div>
        </div>
    </div>
</div>
@endsection
