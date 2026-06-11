@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,400&display=swap');

    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

    /* ===== Scroll Animations ===== */
    .stagger-item {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94), transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    .stagger-item.visible { 
        opacity: 1; 
        transform: translateY(0); 
    }

    /* ===== Typing Animation ===== */
    @keyframes raiseBounce {
        0% { transform: translateY(15px); opacity: 0; }
        50% { transform: translateY(-5px); opacity: 1; }
        100% { transform: translateY(0); opacity: 1; }
    }
    .char-raise {
        display: inline-block;
        animation: raiseBounce 0.4s ease forwards;
    }
</style>

<!-- Hero Section -->
<div class="relative w-full overflow-hidden sm:min-h-[450px] min-h-[400px] flex items-center" style="background: linear-gradient(135deg, #3A2B24 0%, #241A14 100%);">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full z-10 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        <!-- Text Content -->
        <div class="pt-16 pb-12 md:py-0 text-center md:text-left flex flex-col items-center md:items-start">
            <span class="inline-block py-1.5 px-4 rounded-full border border-[#D4AF37]/40 bg-[#D4AF37]/10 text-[#D4AF37] text-xs sm:text-sm font-semibold tracking-[0.15em] uppercase mb-6">
                Premium Variety
            </span>
            <h1 id="hero-heading" class="text-4xl sm:text-5xl md:text-6xl font-normal text-white mb-5 leading-tight tracking-wide min-h-[4rem] sm:min-h-0 flex flex-col items-center md:items-start" style="font-family: 'Cormorant Garamond', serif;">
                <span class="hidden sm:inline">Our Complete <br/> Collection</span>
                <span class="sm:hidden text-center leading-snug" id="mobile-hero-heading"></span>
            </h1>
            <p class="text-gray-300 text-sm sm:text-base leading-relaxed max-w-md mb-8 font-light mx-auto md:mx-0">
                Browse through our beautifully crafted collections. From sophisticated formal wear to elegantly designed unstitched fabrics, everything is crafted with finesse.
            </p>
        </div>
        
        <!-- Image Content (Desktop only, or small on mobile) -->
        <div class="hidden md:flex justify-end relative h-full items-center">
            <!-- Using a transparent/cutout style fashion image to mimic the cake layout -->
            <img src="https://images.unsplash.com/photo-1595777457583-95e059d581b8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                 alt="Premium Clothing Collection" 
                 class="object-cover h-[350px] lg:h-[450px] w-auto rounded-lg shadow-2xl border border-white/10"
                 style="mask-image: linear-gradient(to right, transparent, black 10%); -webkit-mask-image: linear-gradient(to right, transparent, black 10%);" />
        </div>
    </div>
</div>

<section class="max-w-[90rem] mx-auto py-16 px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12 stagger-item">
        <h2 class="text-2xl md:text-4xl font-normal text-gray-900 tracking-[0.2em] uppercase" style="font-family: 'Cormorant Garamond', serif;">
            Browse Categories
        </h2>
        <div class="w-16 h-[1px] bg-[#6E472D] mx-auto mt-4"></div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8" id="category-grid">
        @forelse($categories as $index => $cat)
            <a href="{{ url('category/' . $cat->slug) }}" 
               class="bg-white rounded-[2rem] p-8 md:p-12 flex flex-col items-center text-center shadow-sm border border-gray-50 hover:shadow-lg hover:border-gray-100 transition-all duration-500 hover:-translate-y-2 group stagger-item" 
               data-index="{{ $index }}">
                
                <div class="w-28 h-28 md:w-32 md:h-32 rounded-full bg-[#FAF6F0] flex items-center justify-center p-2 mb-6 shadow-inner relative overflow-hidden">
                    <img src="{{ $cat->image ? asset('storage/' . $cat->image) : 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&q=80&w=400' }}"
                         alt="{{ $cat->name }}"
                         class="w-full h-full object-cover rounded-full group-hover:scale-110 transition duration-700 ease-in-out">
                </div>

               <h3 class="font-bold text-lg md:text-xl tracking-wide text-gray-900 group-hover:text-[#D4AF37] transition-colors duration-300" style="font-family: 'Cormorant Garamond', serif;">
                {{ $cat->name }}
               </h3>
               <span class="text-[10px] sm:text-xs text-gray-400 mt-2 uppercase tracking-[0.2em] font-light">Collection</span>
            </a>
        @empty
            <div class="col-span-full text-center py-10 text-gray-500 text-sm">
                No categories found in our collection yet.
            </div>
        @endforelse
    </div>
</section>

<!-- The Shan-e-Libas Promise Section -->
<section class="w-full py-16 md:py-24 bg-[#FAF6F0]"> 
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center mb-16 stagger-item">
            <h2 class="text-4xl md:text-5xl font-normal text-gray-900 tracking-wide" style="font-family: 'Cormorant Garamond', serif;">
                The Shan-e-Libas Promise
            </h2>
            <!-- Heart icon or small divider -->
            <div class="flex items-center justify-center mt-6 gap-4 opacity-80">
                <div class="h-px w-16 bg-[#6E472D]/40"></div>
                <svg class="w-5 h-5 text-[#6E472D]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                <div class="h-px w-16 bg-[#6E472D]/40"></div>
            </div>
        </div>

        <!-- Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-10 lg:gap-12">
            
            <!-- Card 1: Cloths -->
            <div class="bg-white rounded-[2.5rem] rounded-b-[1.5rem] p-8 md:p-10 text-center shadow-lg hover:-translate-y-2 transition-transform duration-300 stagger-item">
                <div class="w-20 h-20 mx-auto bg-[#F4A8A4] rounded-2xl flex items-center justify-center mb-6 transform -rotate-3 hover:rotate-0 transition-transform duration-300 shadow-sm border-2 border-white">
                    <!-- Hanger/Cloths Icon -->
                    <svg class="w-10 h-10 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 8.25V6a2.25 2.25 0 00-2.25-2.25H9.75A2.25 2.25 0 007.5 6v2.25m8 0h3a2.25 2.25 0 012.25 2.25v9a2.25 2.25 0 01-2.25 2.25H6.5a2.25 2.25 0 01-2.25-2.25v-9A2.25 2.25 0 016.5 8.25h3m6 0v2.25a2.25 2.25 0 01-2.25 2.25h-4.5A2.25 2.25 0 017.5 10.5V8.25" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4" style="font-family: 'Cormorant Garamond', serif;">Premium Cloths</h3>
                <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                    Discover our exquisite range of formal and casual wear, woven with premium threads to ensure you stand out.
                </p>
            </div>

            <!-- Card 2: Bags -->
            <div class="bg-white rounded-[2.5rem] rounded-b-[1.5rem] p-8 md:p-10 text-center shadow-lg hover:-translate-y-2 transition-transform duration-300 stagger-item">
                <div class="w-20 h-20 mx-auto bg-[#F5C270] rounded-2xl flex items-center justify-center mb-6 transform rotate-3 hover:rotate-0 transition-transform duration-300 shadow-sm border-2 border-white">
                    <!-- Handbag Icon -->
                    <svg class="w-10 h-10 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4" style="font-family: 'Cormorant Garamond', serif;">Luxury Bags</h3>
                <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                    Complete your look with our exclusive collection of handbags crafted for the modern, elegant woman.
                </p>
            </div>

            <!-- Card 3: Cosmetics -->
            <div class="bg-white rounded-[2.5rem] rounded-b-[1.5rem] p-8 md:p-10 text-center shadow-lg hover:-translate-y-2 transition-transform duration-300 stagger-item">
                <div class="w-20 h-20 mx-auto bg-[#FF6F91] rounded-2xl flex items-center justify-center mb-6 transform -rotate-3 hover:rotate-0 transition-transform duration-300 shadow-sm border-2 border-white">
                    <!-- Cosmetics/Beauty Icon -->
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4" style="font-family: 'Cormorant Garamond', serif;">Cosmetics</h3>
                <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                    Enhance your natural beauty with our carefully curated cosmetics line, designed for a flawless finish.
                </p>
            </div>

        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    // Stagger animation based on data-index for grid items
                    const index = entry.target.getAttribute('data-index');
                    if (index !== null) {
                        setTimeout(() => {
                            entry.target.classList.add('visible');
                        }, index * 100); // 100ms delay per item
                    } else {
                        // Regular animation for non-indexed elements (like the heading)
                        entry.target.classList.add('visible');
                    }
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.stagger-item').forEach(function (el) {
            observer.observe(el);
        });

        // Mobile Typewriter Effect
        if (window.innerWidth < 640) {
            const headingText = "Our Complete Collection";
            const mobileHeadingEl = document.getElementById('mobile-hero-heading');
            
            // Wait a brief moment before starting the typing effect
            setTimeout(() => {
                const words = headingText.split(' ');
                let charIndex = 0;
                
                // Pre-create word containers to avoid awkward wrapping of characters mid-word
                const wordSpans = words.map(word => {
                    const ws = document.createElement('span');
                    ws.className = 'inline-block whitespace-nowrap mr-2 mb-1';
                    mobileHeadingEl.appendChild(ws);
                    return { word, span: ws };
                });
                
                let currentWordIdx = 0;
                let currentCharIdx = 0;

                function typeChar() {
                    if (currentWordIdx < wordSpans.length) {
                        const currentObj = wordSpans[currentWordIdx];
                        const char = currentObj.word.charAt(currentCharIdx);
                        
                        const charSpan = document.createElement('span');
                        charSpan.textContent = char;
                        charSpan.className = 'char-raise';
                        
                        currentObj.span.appendChild(charSpan);
                        
                        currentCharIdx++;
                        
                        // Move to next word if current word is finished
                        if (currentCharIdx >= currentObj.word.length) {
                            currentWordIdx++;
                            currentCharIdx = 0;
                        }
                        
                        // Adjust the timeout for typing speed
                        setTimeout(typeChar, 80); 
                    }
                }
                typeChar();
            }, 300); // 300ms initial delay
        }
    });
</script>
@endsection
