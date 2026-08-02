<!-- Voices of Royalty (3D Infinite Auto-Scroll Review Slider) -->
<section class="max-w-[90rem] mx-auto py-8 sm:py-16 px-1 sm:px-6 lg:px-8 overflow-hidden"
         x-data="{
            activeSlide: 0,
            realCount: 6,
            perView: 1,
            transitioning: true,
            setPerView() {
                this.perView = window.innerWidth >= 1024 ? 3 : (window.innerWidth >= 640 ? 2 : 1);
            },
            next() {
                this.transitioning = true;
                this.activeSlide++;
                if (this.activeSlide >= this.realCount) {
                    setTimeout(() => {
                        this.transitioning = false;
                        this.activeSlide = 0;
                    }, 700); // transition duration k baad reset
                }
            },
            autoplay() {
                setInterval(() => { this.next(); }, 3200);
            },
            init() {
                this.setPerView();
                window.addEventListener('resize', () => this.setPerView());
                this.autoplay();
            }
         }"
         x-init="init()">

    <!-- Section Title -->
    <div class="text-center mb-6 sm:mb-14 mt-4 md:mt-0">
        <h2 class="text-2xl md:text-3xl font-normal text-gray-900 tracking-[0.2em] uppercase" style="font-family: 'Cormorant Garamond', serif;">
            Voices of Royalty
        </h2>
        <!-- <div class="w-16 h-[1px] bg-[#6E472D] mx-auto mt-4"></div> -->
         <!-- Ornamental Divider -->
    <div class="flex items-center justify-center mt-2 sm:mt-4">
    <svg width="180" height="20" viewBox="0 0 180 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <line x1="0" y1="10" x2="65" y2="10" stroke="#8A151B" stroke-width="1" opacity="0.5"/>
        <path d="M65 10 C 72 2, 78 2, 82 10 C 78 18, 72 18, 65 10 Z" stroke="#8A151B" stroke-width="1" fill="none" opacity="0.6"/>
        <circle cx="90" cy="10" r="3" fill="#8A151B" opacity="0.6"/>
        <path d="M98 10 C 102 2, 108 2, 115 10 C 108 18, 102 18, 98 10 Z" stroke="#8A151B" stroke-width="1" fill="none" opacity="0.6"/>
        <line x1="115" y1="10" x2="180" y2="10" stroke="#8A151B" stroke-width="1" opacity="0.5"/>
    </svg>
</div>
    </div>

    <!-- Slider Container Window -->
    <div class="relative px-0 sm:px-10" style="perspective: 1600px;">

        <!-- Left Button -->
        <button @click="transitioning = true; activeSlide = activeSlide > 0 ? activeSlide - 1 : realCount - 1"
                class="absolute left-0 top-1/2 -translate-y-1/2 z-20 w-11 h-11 rounded-full border border-gray-100 bg-white/90 backdrop-blur shadow-[0_8px_20px_rgba(0,0,0,0.08)] flex items-center justify-center text-gray-400 hover:text-[#8A151B] hover:shadow-lg hover:-translate-y-[calc(50%+2px)] transition-all cursor-pointer hidden sm:flex">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
        </button>

        <!-- Right Button -->
        <button @click="next()"
                class="absolute right-0 top-1/2 -translate-y-1/2 z-20 w-11 h-11 rounded-full border border-gray-100 bg-white/90 backdrop-blur shadow-[0_8px_20px_rgba(0,0,0,0.08)] flex items-center justify-center text-gray-400 hover:text-[#8A151B] hover:shadow-lg hover:-translate-y-[calc(50%+2px)] transition-all cursor-pointer hidden sm:flex">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
        </button>

        <!-- Cards Wrapper Window -->
        <div class="overflow-hidden" style="transform-style: preserve-3d;">
            <div class="flex"
                 :class="transitioning ? 'transition-transform duration-700 ease-in-out' : ''"
                 :style="'transform: translateX(-' + (activeSlide * (100 / perView)) + '%)'">

                <!-- Reusable card template x6 + 3 clones (first 3 duplicated at end for seamless loop on lg) -->
                @php
                    $reviews = [
                        ['name' => 'Ayesha Malik', 'img' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&q=80&w=120', 'text' => 'The fabric quality is exceptional. High-end experience and premium stitching!'],
                        ['name' => 'Zainab Raza', 'img' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&q=80&w=120', 'text' => 'Kapray ka stuff bohat hi kamal hy! Color bilkul wesa hi hy jesa picture m dikhaya tha.'],
                        ['name' => 'Sara Ahmed', 'img' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&q=80&w=120', 'text' => 'Super fast delivery and elegant packaging. The luxury premium feel totally justified the price.'],
                        ['name' => 'Mariam Khan', 'img' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&q=80&w=120', 'text' => 'Mera ye pehla order tha pr delivery milte hi m bht khush hui. Embroidery bohat safai se ki hui hy.'],
                        ['name' => 'Hamza Sheikh', 'img' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80&w=120', 'text' => 'Bought a dress set for my wife. Excellent stitching and premium royal look. Highly recommended!'],
                        ['name' => 'Hina Malik', 'img' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?auto=format&fit=crop&q=80&w=120', 'text' => 'Fitting bilkul perfect aayi hy aur tailor-made experience mila. Shan-E-Libas se ab hmesha shopping hogi.'],
                    ];
                    // Loop ko seamless banane k liye shuru k 3 reviews end mein clone kr dete hain
                    $slidesToRender = array_merge($reviews, array_slice($reviews, 0, 3));
                @endphp

                @foreach($slidesToRender as $review)
                    <div class="w-full sm:w-1/2 lg:w-1/3 flex-shrink-0 px-2 sm:px-3 group/card">
                        <div class="relative bg-white border border-gray-100 rounded-2xl p-5 sm:p-8 flex flex-col items-center text-center h-full
                                    shadow-[0_10px_15px_-3px_rgba(0,0,0,0.04),0_4px_6px_-4px_rgba(0,0,0,0.04)]
                                    transition-all duration-500 ease-out
                                    hover:shadow-[0_25px_40px_-10px_rgba(138,21,27,0.18)]
                                    hover:-translate-y-2
                                    [transform-style:preserve-3d]
                                    hover:[transform:rotateX(4deg)_rotateY(-4deg)]">

                            <!-- Subtle 3D accent edge -->
                            <div class="absolute inset-x-6 -bottom-1 h-4 bg-gradient-to-b from-[#8A151B]/10 to-transparent rounded-b-2xl blur-sm opacity-0 group-hover/card:opacity-100 transition-opacity duration-500"></div>

                            <!-- Quote mark -->
                            <span class="absolute top-4 right-5 text-5xl text-[#8A151B]/[0.06] font-serif leading-none select-none">&rdquo;</span>

                            <div class="flex items-center justify-center space-x-4 mb-4 w-full">
                                <img src="{{ $review['img'] }}" alt="{{ $review['name'] }}"
                                     class="w-14 h-14 rounded-full object-cover ring-4 ring-[#8A151B]/[0.06] shadow-md">
                                <div class="text-left">
                                    <h4 class="font-bold text-base text-[#8A151B]" style="font-family: 'Cormorant Garamond', serif;">{{ $review['name'] }}</h4>
                                    <div class="flex text-amber-500 text-xs mt-0.5">★★★★★</div>
                                </div>
                            </div>
                            <p class="relative text-gray-500 text-sm italic font-light leading-relaxed max-w-xs">
                                "{{ $review['text'] }}"
                            </p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <!-- Indicator Dots -->
        <div class="flex justify-center space-x-2 mt-4 sm:mt-10">
            <template x-for="index in realCount" :key="index">
                <button @click="transitioning = true; activeSlide = index - 1"
                        class="h-1.5 rounded-full transition-all duration-300"
                        :class="(activeSlide % realCount) === (index - 1) ? 'w-7 bg-[#8A151B]' : 'w-1.5 bg-gray-200'"></button>
            </template>
        </div>

    </div>
</section>