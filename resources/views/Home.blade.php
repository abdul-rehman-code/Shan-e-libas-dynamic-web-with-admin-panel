@extends('layouts.app')

@section('content')
    <style>
        .font-serif-luxury { font-family: 'Playfair Display', serif; }
        .bg-light-beige { background-color: #FAF7F2; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

        .animate-rtl {
            opacity: 0;
            transform: translateX(80px);
            transition: opacity 0.75s ease, transform 0.75s ease;
        }
        .animate-rtl.visible { opacity: 1; transform: translateX(0); }

        .animate-ltr {
            opacity: 0;
            transform: translateX(-80px);
            transition: opacity 0.75s ease, transform 0.75s ease;
        }
        .animate-ltr.visible { opacity: 1; transform: translateX(0); }

        .anim-clip { overflow: hidden; }
        .marquee-wrapper {
            overflow: hidden;
            position: relative;
            background: #FAF7F2;
            max-width: 100vw;
        }
        .marquee-wrapper::before,
        .marquee-wrapper::after {
            content: '';
            position: absolute;
            top: 0; bottom: 0;
            width: 40px;
            z-index: 2;
            pointer-events: none;
        }
        .marquee-wrapper::before { left: 0;  background: linear-gradient(to right, #FAF7F2, transparent); }
        .marquee-wrapper::after  { right: 0; background: linear-gradient(to left,  #FAF7F2, transparent); }

        .marquee-track {
            display: flex;
            width: max-content;
            animation: marquee-scroll 22s linear infinite;
        }
        .marquee-track:hover { animation-play-state: paused; }

        .marquee-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 24px;
            white-space: nowrap;
            flex-shrink: 0;
        }
        .marquee-divider {
            width: 1px;
            height: 28px;
            background: #d4b99a;
            flex-shrink: 0;
        }

        @keyframes marquee-scroll {
            0%   { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(25px, -25px) scale(1.05); }
            66% { transform: translate(-15px, 15px) scale(0.95); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob { animation: blob 8s infinite ease-in-out; }
        .animation-delay-2000 { animation-delay: 2s; }

        /* ===== Mobile Responsive Fixes ===== */
        @media (max-width: 640px) {
            .hero-overlay-text h1 { font-size: 1.6rem !important; line-height: 1.25 !important; }
            .hero-overlay-text p  { font-size: 0.78rem !important; }
            .hero-overlay-text    { padding: 1.25rem !important; }
            .marquee-item { padding: 0 16px !important; gap: 8px !important; }
            .marquee-item h4 { font-size: 10px !important; }
            .marquee-item p  { font-size: 9px !important; }
            .marquee-item > div:first-child { width: 28px; height: 28px; padding: 6px !important; }

            .cat-circle { 
                    width: 90px !important; 
                    height: 90px !important; 
                    border-radius: 9999px !important; 
                }

            .promo-banner { border-radius: 1.25rem !important; }
            .promo-banner .promo-img { height: 220px !important; }
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
                    <p class="text-sm md:text-base text-gray-700 font-light max-w-md leading-relaxed">
                        Elevate your everyday look with our premium collection, crafted for comfort and designed for you.
                    </p>

                    <!-- CTA Button -->
                    <div class="pt-2 md:pt-4">
                        <a href="{{ route('products.all') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-[#8C5226] text-white font-medium text-sm rounded-full shadow-md hover:bg-[#73421d] transition-all transform hover:scale-105 duration-200 group">
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

    <!-- 2. Trust Badges – Infinite Marquee Ticker -->
    <section class="marquee-wrapper py-5 border-y border-gray-200/70">
        <div class="marquee-track">
            <!-- Set 1 -->
            <div class="marquee-item">
                <div class="p-2.5 bg-white rounded-full shadow-sm text-[#6E472D] shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg>
                </div>
                <div>
                    <h4 class="font-bold text-xs uppercase tracking-wider text-gray-900">Free Shipping</h4>
                    <p class="text-[11px] text-gray-500">On orders over PKR 5,000</p>
                </div>
            </div>
            <div class="marquee-divider"></div>
            <div class="marquee-item">
                <div class="p-2.5 bg-white rounded-full shadow-sm text-[#6E472D] shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <div>
                    <h4 class="font-bold text-xs uppercase tracking-wider text-gray-900">Secure Payment</h4>
                    <p class="text-[11px] text-gray-500">100% secure checkout</p>
                </div>
            </div>
            <div class="marquee-divider"></div>
            <div class="marquee-item">
                <div class="p-2.5 bg-white rounded-full shadow-sm text-[#6E472D] shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 8H18.5"/></svg>
                </div>
                <div>
                    <h4 class="font-bold text-xs uppercase tracking-wider text-gray-900">Easy Returns</h4>
                    <p class="text-[11px] text-gray-500">10-days return policy</p>
                </div>
            </div>
            <div class="marquee-divider"></div>
            <div class="marquee-item">
                <div class="p-2.5 bg-white rounded-full shadow-sm text-[#6E472D] shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                </div>
                <div>
                    <h4 class="font-bold text-xs uppercase tracking-wider text-gray-900">Premium Quality</h4>
                    <p class="text-[11px] text-gray-500">Finest materials & thread</p>
                </div>
            </div>
            <div class="marquee-divider"></div>
            <!-- Set 2 (duplicate for seamless loop) -->
            <div class="marquee-item">
                <div class="p-2.5 bg-white rounded-full shadow-sm text-[#6E472D] shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg>
                </div>
                <div>
                    <h4 class="font-bold text-xs uppercase tracking-wider text-gray-900">Free Shipping</h4>
                    <p class="text-[11px] text-gray-500">On orders over PKR 5,000</p>
                </div>
            </div>
            <div class="marquee-divider"></div>
            <div class="marquee-item">
                <div class="p-2.5 bg-white rounded-full shadow-sm text-[#6E472D] shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <div>
                    <h4 class="font-bold text-xs uppercase tracking-wider text-gray-900">Secure Payment</h4>
                    <p class="text-[11px] text-gray-500">100% secure checkout</p>
                </div>
            </div>
            <div class="marquee-divider"></div>
            <div class="marquee-item">
                <div class="p-2.5 bg-white rounded-full shadow-sm text-[#6E472D] shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 8H18.5"/></svg>
                </div>
                <div>
                    <h4 class="font-bold text-xs uppercase tracking-wider text-gray-900">Easy Returns</h4>
                    <p class="text-[11px] text-gray-500">30-days return policy</p>
                </div>
            </div>
            <div class="marquee-divider"></div>
            <div class="marquee-item">
                <div class="p-2.5 bg-white rounded-full shadow-sm text-[#6E472D] shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                </div>
                <div>
                    <h4 class="font-bold text-xs uppercase tracking-wider text-gray-900">Premium Quality</h4>
                    <p class="text-[11px] text-gray-500">Finest materials & thread</p>
                </div>
            </div>
            <div class="marquee-divider"></div>
        </div>
    </section>

    <!-- 3. Browse Categories Circle Row -->
  <section class="anim-clip max-w-7xl mx-auto pt-8 pb-4 px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-6 animate-ltr">
        <h2 class="text-xl sm:text-2xl md:text-4xl font-normal text-gray-900 tracking-[0.15em] sm:tracking-[0.2em] uppercase" style="font-family: 'Cormorant Garamond', serif;">
            Browse Categories
        </h2>
        <!-- Ornamental Divider -->
    <div class="flex items-center justify-center mt-4 mb-10">
        <svg width="180" height="20" viewBox="0 0 180 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="0" y1="10" x2="65" y2="10" stroke="#8A151B" stroke-width="1" opacity="0.5"/>
            <path d="M65 10 C 72 2, 78 2, 82 10 C 78 18, 72 18, 65 10 Z" stroke="#8A151B" stroke-width="1" fill="none" opacity="0.6"/>
            <circle cx="90" cy="10" r="3" fill="#8A151B" opacity="0.6"/>
            <path d="M98 10 C 102 2, 108 2, 115 10 C 108 18, 102 18, 98 10 Z" stroke="#8A151B" stroke-width="1" fill="none" opacity="0.6"/>
            <line x1="115" y1="10" x2="180" y2="10" stroke="#8A151B" stroke-width="1" opacity="0.5"/>
        </svg>
    </div>
    </div>

<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-x-8 gap-y-6 sm:gap-6 md:gap-8">
    @forelse($categories as $cat)
        <a href="{{ url('all-products/' . $cat->id) }}" class="animate-ltr group flex flex-col items-center text-center">
            <div class="cat-circle w-full aspect-square sm:w-28 sm:h-28 md:w-32 md:h-32 rounded-full overflow-hidden border border-gray-100 shadow-sm relative transition duration-500 transform hover:scale-105 hover:shadow-md">
                <img src="{{ $cat->image ? asset('storage/' . $cat->image) : 'https://images.unsplash.com/photo-1509695507497-903c140c43b0?auto=format&fit=crop&q=80&w=400' }}"
                     alt="{{ $cat->name }}"
                     class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
            </div>
            <span class="mt-2 sm:mt-3 font-bold text-[10px] sm:text-xs uppercase tracking-widest text-gray-800 group-hover:text-[#6E472D] transition">
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
<section class="anim-clip max-w-7xl mx-auto pt-4 pb-10 md:py-16 px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-6 md:mb-12">
        <h2 class="text-xl sm:text-2xl md:text-4xl font-normal text-gray-900 tracking-[0.15em] sm:tracking-[0.2em] uppercase" style="font-family: 'Cormorant Garamond', serif;">
            Popular Products
        </h2>
        <!-- <div class="w-16 h-[1px] bg-[#6E472D] mx-auto mt-4"></div> -->
         <!-- Ornamental Divider -->
        <div class="flex items-center justify-center mt-4">
            <svg width="180" height="20" viewBox="0 0 180 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line x1="0" y1="10" x2="65" y2="10" stroke="#8A151B" stroke-width="1" opacity="0.5"/>
                <path d="M65 10 C 72 2, 78 2, 82 10 C 78 18, 72 18, 65 10 Z" stroke="#8A151B" stroke-width="1" fill="none" opacity="0.6"/>
                <circle cx="90" cy="10" r="3" fill="#8A151B" opacity="0.6"/>
                <path d="M98 10 C 102 2, 108 2, 115 10 C 108 18, 102 18, 98 10 Z" stroke="#8A151B" stroke-width="1" fill="none" opacity="0.6"/>
                <line x1="115" y1="10" x2="180" y2="10" stroke="#8A151B" stroke-width="1" opacity="0.5"/>
            </svg>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 lg:gap-8">
        @forelse($products as $prod)
            <div class="group relative flex flex-col bg-white rounded-2xl overflow-hidden border border-gray-100 p-0 transition duration-500 hover:shadow-xl">

                <div class="relative w-full overflow-hidden bg-gray-50 rounded-t-2xl h-[500px] sm:h-[500px] md:h-96 lg:h-[440px]">
                <a href="{{ url('product/' . $prod->slug) }}" class="block w-full h-full">
                    @if(is_array($prod->image) && count($prod->image) > 0)
                        <!-- {{-- Agar multiple images ka array hy to pehli image (thumbnail) dikhao --}} -->
                        <img src="{{ asset('storage/' . $prod->image[0]) }}"
                            alt="{{ $prod->name }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-700 ease-out">
                    @else
                        <!-- {{-- Agar purana data hy ya simple string hy --}} -->
                        <img src="{{ $prod->image ? asset('storage/' . $prod->image) : 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?auto=format&fit=crop&q=80&w=500' }}"
                            alt="{{ $prod->name }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-700 ease-out">
                    @endif
                </a>
            </div>

                <div class="flex flex-col flex-grow text-left p-4">

                    <a href="{{ route('product.show', $prod->slug) }}" class="text-sm font-semibold text-gray-900 hover:text-[#6E472D] transition line-clamp-1" style="font-family: 'Cormorant Garamond', serif; font-size: 16px;">
                        {{ $prod->name }}
                    </a>

                    <div class="mt-2 flex flex-col mb-4">
                        <span class="text-[10px] text-gray-400 uppercase tracking-wider font-medium">Starting from</span>
                        <span class="text-sm font-bold text-[#6E472D] mt-0.5">PKR {{ number_format($prod->price) }}</span>
                    </div>

                    <div class="mt-auto">
                        <button data-id="{{ $prod->id }}" class="add-to-cart-btn w-full bg-[#6E472D] hover:bg-[#533521] text-white text-xs font-bold uppercase tracking-widest py-3 px-4 rounded-lg flex items-center justify-center gap-2 transition duration-300 active:scale-98 shadow-xs cursor-pointer text-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        <span>Add to Cart</span>
                    </button>
                    </div>

                </div>

            </div>
        @empty
            <div class="col-span-full text-center py-12 text-gray-500">
                No products found in database.
            </div>
            </div>
        @endforelse
    </div>
</section>
<div class="max-w-7xl mx-auto px-4 py-4 sm:p-6">
    <div class="relative overflow-hidden rounded-3xl bg-[#F5EFE6] shadow-md border border-gray-100/50 flex flex-col md:flex-row items-stretch">
      
        <!-- Left Content Section -->
        <div class="w-full md:w-1/2 p-6 sm:p-10 md:p-16 flex flex-col justify-center items-center text-center md:items-start md:text-left relative z-20">
        
            <!-- Floral Background Outline (Desktop only) -->
            <div class="absolute bottom-3 left-3 opacity-15 pointer-events-none select-none hidden md:block">
                <svg width="120" height="120" viewBox="0 0 100 100" fill="none" stroke="#B08D57" stroke-width="1">
                    <path d="M10,90 Q30,40 80,20 M20,70 Q40,50 60,80 M40,30 Q60,10 90,40"></path>
                </svg>
            </div>

            <!-- Subtitle -->
            <div class="text-[10px] sm:text-xs font-semibold tracking-[0.2em] text-[#A38054] uppercase mb-1 flex items-center justify-center md:justify-start gap-2">
                <span class="inline-block w-4 sm:w-6 h-[1px] bg-[#A38054]/50"></span>
                <span>SUMMER COLLECTION 2026</span>
                <span class="inline-block w-4 sm:w-6 h-[1px] bg-[#A38054]/50"></span>
            </div>

            <div class="text-[#A38054] text-[10px] sm:text-xs my-0.5 font-serif select-none">❖</div>

            <!-- Main Heading -->
            <h2 class="text-2xl sm:text-4xl md:text-5xl font-bold text-[#1F2937] tracking-tight leading-tight my-2" style="font-family: 'Cormorant Garamond', Georgia, serif;">
                NEW SEASON, <br class="hidden sm:inline" />
                NEW VIBES <span class="inline-block text-xl sm:text-3xl font-normal text-[#1F2937] ml-0.5">♡</span>
            </h2>

            <div class="w-8 sm:w-10 h-[1px] bg-[#A38054]/50 my-2"></div>

            <!-- Description -->
            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed mb-6 max-w-xs sm:max-w-md font-sans">
                Discover our new lightweight, premium fabrics tailored for timeless comfort and effortless sophistication.
            </p>

            <!-- CTA Button -->
            <div>
                <a href="{{ route('products.all') }}" 
                   class="inline-flex items-center gap-2.5 bg-[#B6925B] hover:bg-[#A38054] text-white font-medium text-xs sm:text-sm tracking-wider uppercase px-6 py-3 sm:px-7 sm:py-3.5 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 transform active:scale-95 group">
                    <span>Explore Collection</span>
                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Right Image Section (Fixed height/aspect ratio for mobile) -->
        <div class="w-full md:w-1/2 relative aspect-[4/5] sm:aspect-square md:aspect-auto overflow-hidden">
            
            <!-- Desktop Left Curved Cutout -->
            <div class="hidden md:block absolute top-0 -left-1 h-full w-24 z-10 pointer-events-none">
                <svg class="h-full w-full text-[#F5EFE6]" viewBox="0 0 100 100" preserveAspectRatio="none" fill="currentColor">
                    <path d="M0,0 L0,100 Q100,50 0,0 Z"></path>
                </svg>
            </div>
            <div class="hidden md:block absolute top-0 -left-1 h-full w-24 z-10 pointer-events-none opacity-40">
                <svg class="h-full w-full stroke-[#A38054]" viewBox="0 0 100 100" preserveAspectRatio="none" fill="none" stroke-width="1.5">
                    <path d="M0,0 Q100,50 0,100"></path>
                </svg>
            </div>

            <!-- Mobile Top Arch Divider -->
            <div class="block md:hidden absolute -top-1 left-0 w-full h-8 z-10 pointer-events-none">
                <svg class="w-full h-full text-[#F5EFE6]" viewBox="0 0 100 100" preserveAspectRatio="none" fill="currentColor">
                    <path d="M0,0 Q50,60 100,0 Z"></path>
                </svg>
            </div>

            <!-- Image -->
            <img src="{{ asset('banners/cover3.png') }}" 
                 alt="Summer Collection Model" 
                 class="w-full h-full object-cover object-top">
        </div>

    </div>
</div>
@include('partials.review_slider')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.12 });

        document.querySelectorAll('.animate-rtl, .animate-ltr').forEach(function (el) {
            observer.observe(el);
        });
    });
</script>

@endsection
