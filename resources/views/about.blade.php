@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,400&display=swap');
</style>

<div class="bg-[#FDFBF7] min-h-screen font-sans pb-16">

    <!-- Hero Banner -->
    <div class="relative w-full overflow-hidden bg-[#241A14] flex items-center mb-16 sm:min-h-[400px] shadow-sm" style="background: linear-gradient(135deg, #3A2B24 0%, #1A130F 100%);">
        <div class="absolute inset-0 opacity-20 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1550614000-4b95f1fa6cb2?auto=format&fit=crop&w=1920&q=80'); mix-blend-mode: overlay;"></div>
        
        <div class="relative max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 w-full z-10 py-20 text-center">
            <span class="inline-block py-1.5 px-4 rounded-full border border-[#D4AF37]/40 bg-[#D4AF37]/10 text-[#D4AF37] text-xs font-semibold tracking-[0.15em] uppercase mb-6 shadow-sm">
                Discover Our Heritage
            </span>
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-normal text-white mb-6 leading-tight tracking-wide" style="font-family: 'Cormorant Garamond', serif;">
                About Shan-E-Libas
            </h1>
            <p class="text-gray-300 text-sm sm:text-base leading-relaxed max-w-2xl mx-auto font-light">
                Where tradition meets modern elegance. We craft not just garments, but timeless stories woven in luxury fabrics and exquisite designs.
            </p>
        </div>
    </div>

    <!-- Main Content Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Our Story Section -->
        <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20 mb-24">
            <div class="w-full lg:w-1/2 relative">
                <!-- Decorative Frame -->
                <div class="absolute inset-0 border border-[#D4AF37]/30 rounded-[2.5rem] transform translate-x-4 translate-y-4"></div>
                <img src="https://images.unsplash.com/photo-1595777457583-95e059d581b8?auto=format&fit=crop&w=800&q=80" alt="Our Story" class="relative w-full h-[300px] sm:h-[400px] lg:h-[500px] object-cover rounded-[2.5rem] shadow-2xl z-10">
            </div>
            
            <div class="w-full lg:w-1/2">
                <h2 class="text-3xl sm:text-4xl text-gray-900 mb-6" style="font-family: 'Cormorant Garamond', serif;">Our Story</h2>
                <div class="w-16 h-1 bg-[#D4AF37] mb-8 rounded-full"></div>
                
                <p class="text-gray-600 leading-relaxed mb-6">
                    Founded with a passion for preserving rich cultural aesthetics while embracing contemporary fashion, Shan-E-Libas has grown from a humble boutique into a hallmark of premium clothing. Every stitch reflects our dedication to craftsmanship, quality, and style.
                </p>
                <p class="text-gray-600 leading-relaxed mb-8">
                    Our journey began with a simple vision: to empower individuals to feel confident, elegant, and royal in what they wear. Today, our exclusive collections range from luxurious bridal wear to chic casuals, each designed to make a statement.
                </p>
                
                <a href="{{ route('products.all') }}" class="inline-flex items-center justify-center bg-[#6E472D] hover:bg-[#5A3924] text-white px-8 py-3.5 rounded-full transition-all duration-300 text-sm font-medium tracking-wide shadow-md hover:shadow-lg hover:-translate-y-0.5">
                    Explore Collection
                </a>
            </div>
        </div>

        <!-- Why Choose Us / Values -->
        <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-4xl text-gray-900 mb-6" style="font-family: 'Cormorant Garamond', serif;">The Shan-E-Libas Promise</h2>
            <p class="text-gray-500 max-w-2xl mx-auto">We don't just sell clothes; we curate an experience. Here is what makes us stand apart.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-50 hover:shadow-xl hover:border-gray-100 transition-all duration-500 text-center group">
                <div class="w-16 h-16 mx-auto bg-[#FDFBF7] rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-inner">
                    <svg class="w-8 h-8 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" /></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3" style="font-family: 'Cormorant Garamond', serif;">Premium Quality</h3>
                <p class="text-sm text-gray-500 leading-relaxed">
                    We source only the finest fabrics and materials. Our rigorous quality control ensures that every garment meets the highest luxury standards.
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-50 hover:shadow-xl hover:border-gray-100 transition-all duration-500 text-center group">
                <div class="w-16 h-16 mx-auto bg-[#FDFBF7] rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-inner">
                    <svg class="w-8 h-8 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5" /></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3" style="font-family: 'Cormorant Garamond', serif;">Exquisite Craftsmanship</h3>
                <p class="text-sm text-gray-500 leading-relaxed">
                    Our master artisans pay attention to the smallest details, creating intricate embroideries and flawless cuts that define elegance.
                </p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-50 hover:shadow-xl hover:border-gray-100 transition-all duration-500 text-center group">
                <div class="w-16 h-16 mx-auto bg-[#FDFBF7] rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-inner">
                    <svg class="w-8 h-8 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3" style="font-family: 'Cormorant Garamond', serif;">Customer Satisfaction</h3>
                <p class="text-sm text-gray-500 leading-relaxed">
                    Your delight is our priority. From personalized styling advice to seamless checkout and delivery, we promise an exceptional shopping experience.
                </p>
            </div>
        </div>

    </div>
</div>
@endsection


@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,400&display=swap');
</style>

<div class="bg-[#FDFBF7] min-h-screen font-sans pb-16">

    <!-- Hero Banner -->
    <div class="relative w-full overflow-hidden bg-[#241A14] flex items-center mb-16 sm:min-h-[400px] shadow-sm" style="background: linear-gradient(135deg, #3A2B24 0%, #1A130F 100%);">
        <div class="absolute inset-0 opacity-20 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1550614000-4b95f1fa6cb2?auto=format&fit=crop&w=1920&q=80'); mix-blend-mode: overlay;"></div>
        
        <div class="relative max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 w-full z-10 py-20 text-center">
            <span class="inline-block py-1.5 px-4 rounded-full border border-[#D4AF37]/40 bg-[#D4AF37]/10 text-[#D4AF37] text-xs font-semibold tracking-[0.15em] uppercase mb-6 shadow-sm">
                Discover Our Heritage
            </span>
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-normal text-white mb-6 leading-tight tracking-wide" style="font-family: 'Cormorant Garamond', serif;">
                About Shan-E-Libas
            </h1>
            <p class="text-gray-300 text-sm sm:text-base leading-relaxed max-w-2xl mx-auto font-light">
                Where tradition meets modern elegance. We craft not just garments, but timeless stories woven in luxury fabrics and exquisite designs.
            </p>
        </div>
    </div>

    <!-- Main Content Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Our Story Section -->
        <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20 mb-24">
            <div class="w-full lg:w-1/2 relative">
                <!-- Decorative Frame -->
                <div class="absolute inset-0 border border-[#D4AF37]/30 rounded-[2.5rem] transform translate-x-4 translate-y-4"></div>
                <img src="https://images.unsplash.com/photo-1595777457583-95e059d581b8?auto=format&fit=crop&w=800&q=80" alt="Our Story" class="relative w-full h-[300px] sm:h-[400px] lg:h-[500px] object-cover rounded-[2.5rem] shadow-2xl z-10">
            </div>
            
            <div class="w-full lg:w-1/2">
                <h2 class="text-3xl sm:text-4xl text-gray-900 mb-6" style="font-family: 'Cormorant Garamond', serif;">Our Story</h2>
                <div class="w-16 h-1 bg-[#D4AF37] mb-8 rounded-full"></div>
                
                <p class="text-gray-600 leading-relaxed mb-6">
                    Founded with a passion for preserving rich cultural aesthetics while embracing contemporary fashion, Shan-E-Libas has grown from a humble boutique into a hallmark of premium clothing. Every stitch reflects our dedication to craftsmanship, quality, and style.
                </p>
                <p class="text-gray-600 leading-relaxed mb-8">
                    Our journey began with a simple vision: to empower individuals to feel confident, elegant, and royal in what they wear. Today, our exclusive collections range from luxurious bridal wear to chic casuals, each designed to make a statement.
                </p>
                
                <a href="{{ route('products.all') }}" class="inline-flex items-center justify-center bg-[#6E472D] hover:bg-[#5A3924] text-white px-8 py-3.5 rounded-full transition-all duration-300 text-sm font-medium tracking-wide shadow-md hover:shadow-lg hover:-translate-y-0.5">
                    Explore Collection
                </a>
            </div>
        </div>

        <!-- Why Choose Us / Values -->
        <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-4xl text-gray-900 mb-6" style="font-family: 'Cormorant Garamond', serif;">The Shan-E-Libas Promise</h2>
            <p class="text-gray-500 max-w-2xl mx-auto">We don't just sell clothes; we curate an experience. Here is what makes us stand apart.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-50 hover:shadow-xl hover:border-gray-100 transition-all duration-500 text-center group">
                <div class="w-16 h-16 mx-auto bg-[#FDFBF7] rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-inner">
                    <svg class="w-8 h-8 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" /></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3" style="font-family: 'Cormorant Garamond', serif;">Premium Quality</h3>
                <p class="text-sm text-gray-500 leading-relaxed">
                    We source only the finest fabrics and materials. Our rigorous quality control ensures that every garment meets the highest luxury standards.
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-50 hover:shadow-xl hover:border-gray-100 transition-all duration-500 text-center group">
                <div class="w-16 h-16 mx-auto bg-[#FDFBF7] rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-inner">
                    <svg class="w-8 h-8 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5" /></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3" style="font-family: 'Cormorant Garamond', serif;">Exquisite Craftsmanship</h3>
                <p class="text-sm text-gray-500 leading-relaxed">
                    Our master artisans pay attention to the smallest details, creating intricate embroideries and flawless cuts that define elegance.
                </p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-50 hover:shadow-xl hover:border-gray-100 transition-all duration-500 text-center group">
                <div class="w-16 h-16 mx-auto bg-[#FDFBF7] rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-inner">
                    <svg class="w-8 h-8 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3" style="font-family: 'Cormorant Garamond', serif;">Customer Satisfaction</h3>
                <p class="text-sm text-gray-500 leading-relaxed">
                    Your delight is our priority. From personalized styling advice to seamless checkout and delivery, we promise an exceptional shopping experience.
                </p>
            </div>
        </div>

    </div>
</div>
@endsection
