<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shan-E-Libas | Elegance In Every Thread</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif-luxury { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-[#FCFCFC] text-[#333333] flex flex-col min-h-screen antialiased">

    <div class="bg-[#8A151B] text-white text-[11px] font-medium tracking-wider py-2.5 px-4 hidden sm:block border-b border-black/10">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <span>🚚 FREE SHIPPING on all orders over PKR 5000</span>
            </div>
            <div class="flex items-center space-x-2">
                <span>🎒 NEW ARRIVALS – UP TO 30% OFF</span>
            </div>
            <div class="flex items-center space-x-6">
                <a href="tel:+923001234567" class="hover:opacity-80 transition">📞 +92 300 1234567</a>
                <a href="#" class="hover:opacity-80 transition">🙋 Help & Support</a>
            </div>
        </div>
    </div>

    <nav class="bg-white sticky top-0 z-50 border-b border-gray-100 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">

                <div class="flex-shrink-0 flex items-center space-x-3">
                    <a href="/" class="flex items-center space-x-2 group">
                        <span class="font-serif-luxury text-3xl font-bold tracking-tight text-[#8A151B]">S</span>
                        <div class="flex flex-col border-l border-gray-300 pl-2 leading-none">
                            <span class="font-serif-luxury text-xl font-bold tracking-widest text-[#111111] group-hover:text-[#8A151B] transition">Shan-E-Libas</span>
                            <span class="text-[9px] uppercase tracking-[0.2em] text-gray-400 mt-0.5">Elegance In Every Thread</span>
                        </div>
                    </a>
                </div>

                <div class="hidden md:flex space-x-7 font-semibold text-xs tracking-widest uppercase">
                    <a href="/" class="text-[#8A151B] border-b-2 border-[#8A151B] pb-1">Home</a>
                    @foreach($globalCategories as $cat)
                        <a href="/category/{{ $cat->slug }}" class="text-gray-600 hover:text-[#8A151B] transition pb-1">{{ $cat->name }}</a>
                    @endforeach
                    <a href="#" class="text-gray-600 hover:text-[#8A151B] transition pb-1">Sale</a>
                </div>

                <div class="flex items-center space-x-4 text-gray-700">
                    <button class="p-2 hover:text-[#8A151B] transition cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                    <a href="/admin" class="p-2 hover:text-[#8A151B] transition hidden sm:block">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </a>
                    <button class="p-2 hover:text-[#8A151B] transition relative">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </button>
                    <a href="#" class="relative p-2 hover:text-[#8A151B] transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        <span class="absolute top-1 right-1 bg-[#8A151B] text-white text-[9px] font-bold w-4 h-4 rounded-full flex items-center justify-center">0</span>
                    </a>
                </div>

            </div>
        </div>
    </nav>

    <main class="flex-grow">
        @yield('content')
    </main>

    <div class="bg-[#F9F9F9] border-t border-b border-gray-100 py-6">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div class="flex flex-col items-center">
                <span class="text-xl mb-1">🔒</span>
                <span class="text-xs font-bold uppercase tracking-wider text-gray-800">Secure Payment</span>
                <span class="text-[11px] text-gray-400 mt-0.5">100% safe & secure checkout</span>
            </div>
            <div class="flex flex-col items-center">
                <span class="text-xl mb-1">📦</span>
                <span class="text-xs font-bold uppercase tracking-wider text-gray-800">Premium Packaging</span>
                <span class="text-[11px] text-gray-400 mt-0.5">Delivered with absolute care</span>
            </div>
            <div class="flex flex-col items-center">
                <span class="text-xl mb-1">🤝</span>
                <span class="text-xs font-bold uppercase tracking-wider text-gray-800">Trusted By Thousands</span>
                <span class="text-[11px] text-gray-400 mt-0.5">Join our happy community</span>
            </div>
            <div class="flex flex-col items-center">
                <span class="text-xl mb-1">✨</span>
                <span class="text-xs font-bold uppercase tracking-wider text-gray-800">Quality Assured</span>
                <span class="text-[11px] text-gray-400 mt-0.5">We never compromise on threads</span>
            </div>
        </div>
    </div>

    <footer class="bg-[#111111] text-gray-400 py-10 text-center text-xs tracking-wider">
        <p class="text-white font-serif-luxury text-lg font-bold tracking-widest mb-2">SHAN-E-LIBAS</p>
        <p class="text-gray-500 max-w-md mx-auto leading-relaxed">Premium Eastern & Western Wear Crafted to Define Elegance.</p>
        <div class="border-t border-zinc-850 my-6 max-w-xs mx-auto"></div>
        <p class="text-gray-600">&copy; {{ date('Y') }} Shan-E-Libas. Designed for Luxury.</p>
    </footer>

</body>
</html>
