@extends('layouts.app')

@section('meta')
    <title>{{ $product->name }} | Shan-E-Libas</title>
    <meta name="description" content="{{ Str::limit(strip_tags($product->description ?? 'Premium Pakistani clothing'), 155) }}">
    <meta name="keywords" content="{{ $product->name }}, Pakistani clothes, lawn suits, Shan-E-Libas">
    <meta property="og:title" content="{{ $product->name }} | Shan-E-Libas">
    <meta property="og:description" content="{{ Str::limit(strip_tags($product->description ?? ''), 155) }}">
    <meta property="og:image" content="{{ is_array($product->image) ? asset('storage/' . $product->image[0]) : asset('storage/' . $product->image) }}">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

@section('content')
<div class="container mx-auto px-4 py-12 max-w-6xl">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
        
        <!-- Left Column: Product Image Gallery -->
        <div class="space-y-4">
            <div class="bg-white p-2 rounded-2xl border border-gray-100 shadow-xs">
                @php
                    $productImages = is_string($product->image) ? json_decode($product->image, true) : $product->image;
                    $productImages = is_array($productImages) ? $productImages : [$product->image];
                @endphp
                
                <img id="main-display-image" 
                     src="{{ asset('storage/' . $productImages[0]) }}" 
                     alt="{{ $product->name }}" 
                     class="w-full h-[320px] sm:h-[450px] md:h-[550px] object-cover rounded-xl transition duration-300">
            </div>

            {{-- Thumbnails --}}
            @if(count($productImages) > 1)
                <div class="grid grid-cols-5 gap-3">
                    @foreach($productImages as $img_path)
                        <div class="border border-gray-200 hover:border-[#6E472D] rounded-lg overflow-hidden cursor-pointer p-0.5 bg-white transition">
                            <img src="{{ asset('storage/' . $img_path) }}" 
                                 alt="{{ $product->name }}"
                                 class="w-full h-20 object-cover rounded-md"
                                 onclick="changeMainImage(this.src)">
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Right Column: Product Info -->
        <div class="space-y-6">
            <div>
                <span class="text-xs uppercase tracking-widest text-gray-400 font-semibold">Premium Collection</span>
                <h1 class="text-3xl font-bold tracking-wide text-gray-950 mt-1 uppercase">{{ $product->name }}</h1>
            </div>

            <!-- Price -->
            <div class="border-b border-gray-100 pb-4">
                <span class="text-sm text-gray-500 block">Starting From</span>
                <span class="text-2xl font-extrabold text-[#6E472D]">PKR {{ number_format($product->price) }}</span>
            </div>

            <!-- Description -->
            <div class="space-y-2">
                <h4 class="text-xs font-bold uppercase tracking-wider text-gray-800">Product Details</h4>
                <p class="text-gray-600 text-sm leading-relaxed">
                    {!! $product->description ?? 'Experience premium comfort and elegance with this exclusive article from our latest collection, tailored to perfection.' !!}
                </p>
            </div>

            <!-- Features -->
            <ul class="text-xs space-y-2 text-gray-500 border-t border-b border-gray-100 py-4">
                <li class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 bg-[#6E472D] rounded-full"></span> Premium Quality Fabric
                </li>
                <li class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 bg-[#6E472D] rounded-full"></span> Perfect Stitching & Fitting
                </li>
                <li class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 bg-[#6E472D] rounded-full"></span> Free Delivery on orders above Rs. 5,000
                </li>
            </ul>

            <!-- Action Buttons -->
            <div class="pt-4">
                <button onclick="addToCart('{{ $product->id }}')" class="w-full bg-[#6E472D] hover:bg-[#533521] text-white text-xs font-bold uppercase tracking-widest py-4 px-8 rounded-lg transition duration-300 shadow-xs cursor-pointer flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    Add To Cart
                </button>
            </div>
        </div>

    </div>
</div>

<!-- Related Products Section -->
@if(isset($relatedProducts) && count($relatedProducts) > 0)
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 border-t border-gray-100">
    
    <div class="text-center mb-8">
        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 uppercase tracking-wider" style="font-family: 'Cormorant Garamond', serif;">
            Related Products
        </h3>
        @include('partials.stylish_line')
    </div>

    <div class="grid grid-cols-3 md:grid-cols-4 gap-3 sm:gap-5">
        @foreach($relatedProducts as $index => $related)
            <a href="{{ route('product.show', $related->slug) }}" 
               class="group block bg-white rounded-xl border border-gray-100 p-2 sm:p-3 shadow-xs hover:shadow-md transition duration-300 {{ $index >= 6 ? 'max-md:hidden' : '' }}">
                
                <div class="aspect-square w-full overflow-hidden rounded-lg bg-gray-50 mb-2">
                    @php
                        $imgSrc = 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?auto=format&fit=crop&q=80&w=300';
                        if (!empty($related->image)) {
                            $relatedImages = is_string($related->image) ? json_decode($related->image, true) : $related->image;
                            if (is_array($relatedImages) && count($relatedImages) > 0) {
                                $imgSrc = asset('storage/' . $relatedImages[0]);
                            } elseif (is_string($related->image)) {
                                $imgSrc = asset('storage/' . $related->image);
                            }
                        }
                    @endphp
                    <img src="{{ $imgSrc }}" alt="{{ $related->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>

                <h4 class="text-xs sm:text-sm font-semibold text-gray-800 text-center line-clamp-1 group-hover:text-[#8A151B] transition">
                    {{ $related->name }}
                </h4>
            </a>
        @endforeach
    </div>

    <div class="text-center mt-8">
        <a href="{{ route('products.all', ['category' => $product->category->slug ?? $product->category_id]) }}" 
           class="inline-flex items-center gap-2 border border-[#6E472D] text-[#6E472D] hover:bg-[#6E472D] hover:text-white px-6 py-2.5 rounded-full text-xs sm:text-sm font-bold uppercase tracking-wider transition duration-300">
            Show More
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
            </svg>
        </a>
    </div>

</section>
@endif

<script>
function changeMainImage(src) {
    const mainImg = document.getElementById('main-display-image');
    if (mainImg) {
        mainImg.src = src;
    }
}

function addToCart(productId) {
    fetch(`/cart/add/${productId}`, {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            const headerBadge = document.getElementById('cart-count');
            if (headerBadge) headerBadge.innerText = data.cart_count;
            if (typeof showToast === 'function') {
                showToast(data.message);
            } else {
                alert(data.message);
            }
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>
@endsection