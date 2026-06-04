@extends('layouts.app')

@section('content')
    <!-- Hero Section with Premium Gradient and Glassmorphism -->
    <section class="relative min-h-screen flex items-center justify-center bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 overflow-hidden">
        <!-- Background Image Overlay -->
        <div class="absolute inset-0 bg-[url('/images/hero-bg.jpg')] bg-cover bg-center opacity-30"></div>
        <!-- Glass Card -->
        <div class="relative z-10 max-w-2xl mx-auto p-10 bg-white/10 backdrop-blur-xl rounded-2xl border border-white/20 shadow-2xl">
            <span class="block text-sm font-semibold uppercase tracking-wider text-white mb-2">New Collection</span>
            <h1 class="text-5xl md:text-6xl font-extrabold text-white leading-tight mb-4">
                Timeless Beauty,<br><span class="italic font-light text-gray-200">Crafted for You</span>
            </h1>
            <p class="text-white text-base md:text-lg max-w-md mb-6 animate-fade-in">
                Premium fabrics. Exquisite luxury designs. Made for every special moment, uniquely styled for you.
            </p>
            <div class="flex space-x-4">
                <a href="" class="px-8 py-3 bg-white text-purple-700 font-medium rounded-full hover:bg-gray-100 transition">
                    Explore Collection
                </a>
                <a href="" class="px-8 py-3 bg-transparent border border-white text-white font-medium rounded-full hover:bg-white hover:text-purple-700 transition">
                    Contact Us
                </a>
            </div>
        </div>
        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2">
            <svg class="w-6 h-6 text-white animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </div>
    </section>

    <!-- Feature Icons -->
    <section class="bg-white py-8 border-b border-gray-100">
        <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div class="flex flex-col items-center">
                <span class="text-2xl text-[#8A151B]">🚚</span>
                <p class="font-bold uppercase text-xs tracking-wider text-gray-900 mt-1">Free Shipping</p>
                <p class="text-xs text-gray-500">On orders over PKR 5,000</p>
            </div>
            <div class="flex flex-col items-center">
                <span class="text-2xl text-[#8A151B]">🏅</span>
                <p class="font-bold uppercase text-xs tracking-wider text-gray-900 mt-1">Premium Quality</p>
                <p class="text-xs text-gray-500">Finest fabrics & craftsmanship</p>
            </div>
            <div class="flex flex-col items-center">
                <span class="text-2xl text-[#8A151B]">📦</span>
                <p class="font-bold uppercase text-xs tracking-wider text-gray-900 mt-1">Easy Returns</p>
                <p class="text-xs text-gray-500">14‑day hassle‑free returns</p>
            </div>
            <div class="flex flex-col items-center">
                <span class="text-2xl text-[#8A151B]">🎧</span>
                <p class="font-bold uppercase text-xs tracking-wider text-gray-900 mt-1">Support 24/7</p>
                <p class="text-xs text-gray-500">We’re here to help</p>
            </div>
        </div>
    </section>

    <!-- Shop By Category -->
    <section class="max-w-7xl mx-auto py-12">
        <div class="flex items-center justify-center space-x-4 mb-8">
            <div class="w-12 h-px bg-gray-300"></div>
            <span class="text-[#8A151B] text-sm">✦</span>
            <h2 class="font-serif text-2xl font-bold text-gray-900 uppercase tracking-wider">Shop By Category</h2>
            <span class="text-[#8A151B] text-sm">✦</span>
            <div class="w-12 h-px bg-gray-300"></div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <!-- Example Category Card -->
            <div class="group relative bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition">
                <div class="aspect-w-3 aspect-h-4 bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1610030469983-98e550d6193c?auto=format&fit=crop&q=80&w=500" class="object-cover w-full h-full group-hover:scale-105 transition" alt="Women">
                </div>
                <div class="p-4 text-center">
                    <p class="font-bold text-gray-800 uppercase">Women</p>
                    <a href="#" class="inline-flex items-center text-sm text-[#8A151B] font-medium mt-2 hover:text-black transition">
                        Shop Now <span class="ml-1">→</span>
                    </a>
                </div>
            </div>
            <!-- Repeat similar cards for Men, Unstitched, Accessories -->
            <div class="group relative bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition">
                <div class="aspect-w-3 aspect-h-4 bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1618886614638-80e3c103d31a?auto=format&fit=crop&q=80&w=500" class="object-cover w-full h-full group-hover:scale-105 transition" alt="Men">
                </div>
                <div class="p-4 text-center">
                    <p class="font-bold text-gray-800 uppercase">Men</p>
                    <a href="#" class="inline-flex items-center text-sm text-[#8A151B] font-medium mt-2 hover:text-black transition">
                        Shop Now <span class="ml-1">→</span>
                    </a>
                </div>
            </div>
            <div class="group relative bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition">
                <div class="aspect-w-3 aspect-h-4 bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1584273143981-41c073dfe8f8?auto=format&fit=crop&q=80&w=500" class="object-cover w-full h-full group-hover:scale-105 transition" alt="Unstitched">
                </div>
                <div class="p-4 text-center">
                    <p class="font-bold text-gray-800 uppercase">Unstitched</p>
                    <a href="#" class="inline-flex items-center text-sm text-[#8A151B] font-medium mt-2 hover:text-black transition">
                        Shop Now <span class="ml-1">→</span>
                    </a>
                </div>
            </div>
            <div class="group relative bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition">
                <div class="aspect-w-3 aspect-h-4 bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1601924994987-69e26d50dc26?auto=format&fit=crop&q=80&w=500" class="object-cover w-full h-full group-hover:scale-105 transition" alt="Accessories">
                </div>
                <div class="p-4 text-center">
                    <p class="font-bold text-gray-800 uppercase">Accessories</p>
                    <a href="#" class="inline-flex items-center text-sm text-[#8A151B] font-medium mt-2 hover:text-black transition">
                        Shop Now <span class="ml-1">→</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Sign‑Up -->
    <section class="bg-gray-50 py-12">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-lg">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Sign Up & Get 10% OFF</h3>
            <p class="text-sm text-gray-500 mb-4">Subscribe for style updates, early access, and exclusive coupons.</p>
            <form class="flex" onsubmit="event.preventDefault();">
                <input type="email" placeholder="Enter your email" class="flex-1 border border-gray-300 px-4 py-2 focus:outline-none focus:border-[#8A151B]" />
                <button type="submit" class="ml-2 bg-[#8A151B] text-white px-5 py-2 text-sm font-medium hover:bg-black transition">
                    Subscribe
                </button>
            </form>
            <div class="grid grid-cols-3 gap-4 mt-6 border-t pt-4">
                <div class="text-center">
                    <span class="text-2xl">🏷️</span>
                    <p class="text-xs font-bold uppercase text-gray-800">Exclusive Offers</p>
                    <p class="text-[9px] text-gray-500">For subscribers only</p>
                </div>
                <div class="text-center">
                    <span class="text-2xl">🎁</span>
                    <p class="text-xs font-bold uppercase text-gray-800">Early Access</p>
                    <p class="text-[9px] text-gray-500">New collections first</p>
                </div>
                <div class="text-center">
                    <span class="text-2xl">⭐</span>
                    <p class="text-xs font-bold uppercase text-gray-800">Style Updates</p>
                    <p class="text-[9px] text-gray-500">Tips & trends</p>
                </div>
            </div>
        </div>
    </section>
@endsection
