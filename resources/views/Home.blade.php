@extends('layouts.app')

@section('content')
    <!-- CSS styles for slider, transitions and premium typography -->
    <style>
        .font-serif-luxury {
            font-family: 'Playfair Display', serif;
        }
        .bg-light-beige {
            background-color: #FAF7F2;
        }
        /* Custom scrollbar hiding helper */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    <!-- 1. Hero Banner Section -->
    <section class="w-full relative overflow-hidden bg-[#FAF7F2]">
    <!-- Main Banner Image Wrapper -->
    <div class="relative w-full h-full">
        <img src="{{ asset('banners/abc.png') }}" alt="Shan-E-Libas New Collection" class="w-full h-auto object-cover object-center min-h-[400px] md:min-h-0">

        <!-- Text & Button Overlay Container -->
        <div class="absolute inset-0 bg-black/5 md:bg-transparent flex items-center">
            <div class="max-w-7xl mx-auto w-full px-6 md:px-12 lg:px-24">
                <div class="max-w-lg lg:max-w-xl space-y-3 md:space-y-6">

                    <!-- Subheading -->
                    <span class="block text-xs md:text-sm font-bold tracking-widest text-[#8C5226] uppercase">
                        New Collection 2026
                    </span>

                    <!-- Main Heading -->
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-serif font-medium leading-tight text-[#111111]">
                        EFFORTLESS STYLE,<br>
                        <span class="text-[#8C5226]">TIMELESS YOU</span>
                    </h1>

                    <!-- Description -->
                    <p class="text-sm md:text-base text-gray-7xl font-light max-w-md leading-relaxed text-gray-7xl">
                        Elevate your everyday look with our premium collection, crafted for comfort and designed for you.
                    </p>

                    <!-- CTA Button -->
                    <div class="pt-2 md:pt-4">
                        <a href="/products" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-[#8C5226] text-white font-medium text-sm rounded-full shadow-md hover:bg-[#73421d] transition-all transform hover:scale-105 duration-200 group">
                            SHOP NOW
                            <!-- Right Arrow SVG -->
                            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

    <!-- 2. Top Trust Badges Bar -->
    <section class="bg-[#FAF7F2] py-8 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-4 divide-y md:divide-y-0 md:divide-x divide-gray-200/60">
            <div class="flex items-center justify-center space-x-4 p-2">
                <div class="p-3 bg-white rounded-full shadow-xs text-[#6E472D]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg>
                </div>
                <div>
                    <h4 class="font-bold text-xs uppercase tracking-wider text-gray-900">Free Shipping</h4>
                    <p class="text-[11px] text-gray-500">On orders over PKR 5,000</p>
                </div>
            </div>
            <div class="flex items-center justify-center space-x-4 p-2 pt-4 md:pt-2">
                <div class="p-3 bg-white rounded-full shadow-xs text-[#6E472D]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <div>
                    <h4 class="font-bold text-xs uppercase tracking-wider text-gray-900">Secure Payment</h4>
                    <p class="text-[11px] text-gray-500">100% secure checkout</p>
                </div>
            </div>
            <div class="flex items-center justify-center space-x-4 p-2 pt-4 md:pt-2">
                <div class="p-3 bg-white rounded-full shadow-xs text-[#6E472D]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 8H18.5"/></svg>
                </div>
                <div>
                    <h4 class="font-bold text-xs uppercase tracking-wider text-gray-900">Easy Returns</h4>
                    <p class="text-[11px] text-gray-500">30-days return policy</p>
                </div>
            </div>
            <div class="flex items-center justify-center space-x-4 p-2 pt-4 md:pt-2">
                <div class="p-3 bg-white rounded-full shadow-xs text-[#6E472D]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                </div>
                <div>
                    <h4 class="font-bold text-xs uppercase tracking-wider text-gray-900">Premium Quality</h4>
                    <p class="text-[11px] text-gray-500">Finest materials & thread</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Browse Categories Circle Row -->
  <section class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-10">
        <h2 class="text-3xl md:text-4xl font-normal text-gray-900 tracking-[0.25em] uppercase" style="font-family: 'Cormorant Garamond', serif;">
            Browse Categories
        </h2>
        <div class="w-16 h-[1px] bg-[#6E472D] mx-auto mt-3"></div>
    </div>

    <div class="grid grid-cols-3 md:grid-cols-6 gap-6 sm:gap-8">
        @forelse($categories as $cat)
            <a href="{{ url('category/' . $cat->slug) }}" class="group flex flex-col items-center text-center">
                <div class="w-24 h-24 sm:w-32 sm:h-32 rounded-full overflow-hidden border border-gray-100 shadow-sm relative group transition duration-500 transform hover:scale-105 hover:shadow-md">
                    <img src="{{ $cat->image ? asset('storage/' . $cat->image) : 'https://images.unsplash.com/photo-1509695507497-903c140c43b0?auto=format&fit=crop&q=80&w=400' }}"
                         alt="{{ $cat->name }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                </div>
                <span class="mt-4 font-bold text-xs uppercase tracking-widest text-gray-800 group-hover:text-[#6E472D] transition">
                    {{ $cat->name }}
                </span>
            </a>
        @empty
            <div class="col-span-full text-center py-6 text-gray-500 text-sm">
                No categories found in database.
            </div>
        @endforelse
    </div>
</section>

    <!-- 4. New Arrivals Tabs and Grid Section -->
<section class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-normal text-gray-900 tracking-[0.25em] uppercase" style="font-family: 'Cormorant Garamond', serif;">
            Popular Products
        </h2>
        <div class="w-16 h-[1px] bg-[#6E472D] mx-auto mt-4"></div>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 lg:gap-8">
        @forelse($products as $prod)
            {{-- Outer card se p-3.5 hata kar p-0 kar diya taakay image borders se touch ho jaye --}}
            <div class="group relative flex flex-col bg-white rounded-2xl overflow-hidden border border-gray-100 p-0 transition duration-500 hover:shadow-xl">

                <div class="relative aspect-[3/4] w-full overflow-hidden bg-gray-50 rounded-t-2xl">
                    <a href="{{ url('product/' . $prod->slug) }}" class="block w-full h-full">
                        <img src="{{ $prod->image ? asset('storage/' . $prod->image) : 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?auto=format&fit=crop&q=80&w=500' }}"
                             alt="{{ $prod->name }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-700 ease-out">
                    </a>
                </div>

                <div class="flex flex-col flex-grow text-left p-4">

                    <a href="{{ url('product/' . $prod->slug) }}" class="text-sm font-semibold text-gray-900 hover:text-[#6E472D] transition line-clamp-1" style="font-family: 'Cormorant Garamond', serif; font-size: 16px;">
                        {{ $prod->name }}
                    </a>

                    <div class="mt-2 flex flex-col mb-4">
                        <span class="text-[10px] text-gray-400 uppercase tracking-wider font-medium">Starting from</span>
                        <span class="text-sm font-bold text-[#6E472D] mt-0.5">PKR {{ number_format($prod->price) }}</span>
                    </div>

                    <div class="mt-auto">
                        <button class="w-full bg-[#6E472D] hover:bg-[#533521] text-white text-xs font-bold uppercase tracking-widest py-3 px-4 rounded-lg flex items-center justify-center gap-2 transition duration-300 active:scale-98 shadow-xs cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            Add to Cart
                        </button>
                    </div>

                </div>

            </div>
        @empty
            <div class="col-span-full text-center py-12 text-gray-500">
                No products found in database.
            </div>
        @endforelse
    </div>
</section>
    <!-- 5. Summer Collection Promotion Banner -->
  <section class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
    {{-- Main Container: Iski height fix kar di hai taakay niche se width/height zyada na ho --}}
    <div class="w-full rounded-[2.5rem] overflow-hidden relative flex flex-col md:flex-row items-stretch min-h-[350px] md:h-[420px] bg-gradient-to-r from-[#DFD3C3] via-[#F4EBE1] to-[#EBE3DB] shadow-lg border border-gray-100">

        <!-- Text Content Left -->
        <div class="relative z-10 px-8 py-10 md:py-0 md:px-16 md:w-1/2 flex flex-col justify-center text-left space-y-4">
            <!-- Summer Collection Sub-tag -->
            <p class="text-[11px] font-bold tracking-widest text-[#6E472D] uppercase">
                SUMMER COLLECTION 2026
            </p>

            <!-- Heading with Bigger & Rotated Hollow Heart -->
            <h2 class="text-3xl md:text-5xl font-normal text-gray-900 leading-tight tracking-wide flex flex-wrap items-center gap-x-3" style="font-family: 'Cormorant Garamond', serif;">
                <span class="block w-full">NEW SEASON,</span>
                <span class="flex items-center gap-3">
                    NEW VIBES
                    <!-- Dil ka size bada (text-4xl / md:text-5xl) aur thoda rotate (-rotate-12) kiya hai -->
                    <span class="inline-block text-4xl md:text-5xl text-[#6E472D] font-light transform -rotate-12 select-none origin-center ml-1">
                        ♡
                    </span>
                </span>
            </h2>

            <!-- Subtle Description Line -->
            <p class="text-xs text-gray-600 font-medium tracking-wide max-w-sm leading-relaxed pt-1">
                Discover our new lightweight, premium fabrics tailored for timeless comfort and effortless sophistication.
            </p>

            <!-- Premium Explore CTA Button -->
            <div class="pt-4">
                <a href="{{ url('/shop') }}" class="inline-flex items-center space-x-3 px-8 py-3.5 bg-[#6E472D] text-white text-xs font-bold tracking-widest uppercase rounded-full hover:bg-[#533521] transition duration-300 shadow-md group cursor-pointer">
                    <span>Explore Collection</span>
                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Image Right (Ab ye box ko niche se barhne nahi dega) -->
        <div class="w-full md:w-1/2 h-64 md:h-full relative overflow-hidden">
            <img src="{{ asset('banners/cover1.png') }}"
                 class="w-full h-full object-cover object-center md:object-right-bottom"
                 alt="Summer Vibes">
            <!-- Smooth overlay matching background -->
            <div class="absolute inset-0 bg-gradient-to-t md:bg-gradient-to-r from-[#F4EBE1]/10 to-transparent pointer-events-none"></div>
        </div>

    </div>
</section>

@endsection
