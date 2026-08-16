<div class="grid grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6 md:gap-8">
    @forelse($products as $product)
        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-200 hover:shadow-xl hover:border-gray-300 transition-all duration-500 hover:-translate-y-1 group flex flex-col">

            <div class="relative w-full h-[260px] sm:h-[330px] bg-gray-50 border-b border-gray-100">
                @if($product->old_price && $product->old_price > $product->price)
                    <div class="absolute top-3 left-3 bg-red-500 text-white text-[10px] font-bold px-2 py-1 rounded z-10 tracking-widest shadow-sm">SALE</div>
                @endif

                <a href="{{ url('product/' . $product->slug) }}" class="block w-full h-full">
                    @if(is_array($product->image) && count($product->image) > 0)
                        <img src="{{ Str::startsWith($product->image[0], 'http') ? $product->image[0] : asset('storage/' . $product->image[0]) }}"
                            alt="{{ $product->name }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-in-out">
                    @else
                        <img src="{{ $product->image ? (Str::startsWith($product->image, 'http') ? $product->image : asset('storage/' . $product->image)) : 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?auto=format&fit=crop&q=80&w=500' }}"
                            alt="{{ $product->name }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-in-out">
                    @endif
                </a>
            </div>

            <div class="flex flex-col flex-grow p-4 text-center">
                <a href="{{ url('product/' . $product->slug) }}" class="block mb-1">
                    <h3 class="font-bold text-gray-900 text-lg sm:text-xl leading-tight group-hover:text-[#6E472D] transition-colors line-clamp-1" style="font-family: 'Cormorant Garamond', serif;">
                        {{ $product->name }}
                    </h3>
                </a>

                <p class="text-[10px] sm:text-[11px] uppercase tracking-wider text-gray-400 mb-1 mt-2">Starting from</p>

                <div class="flex items-center justify-center gap-2 mb-4">
                    <span class="text-[#D4AF37] font-bold text-base sm:text-lg">Rs. {{ number_format($product->price) }}</span>
                    @if($product->old_price)
                        <span class="text-gray-400 line-through text-xs">Rs. {{ number_format($product->old_price) }}</span>
                    @endif
                </div>

                <div class="w-full mt-auto">
                    <button type="button" 
                            onclick="allProductsAddToCart('{{ $product->id }}')" 
                            class="w-full bg-[#6E472D] hover:bg-[#5A3924] text-white flex items-center justify-center gap-2 py-2.5 sm:py-3 rounded-xl transition-all duration-300 text-xs sm:text-sm font-medium shadow-md hover:shadow-lg cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span>Add to Cart</span>
                    </button>
                </div>
            </div>

        </div>
    @empty
        <div class="col-span-full py-12 text-center text-gray-500">
            <p class="text-lg">No products found matching your filters.</p>
            <button @click="categoryId=''; tag=''; search=''; fetchProducts()" class="mt-4 text-[#D4AF37] underline">Clear Filters</button>
        </div>
    @endforelse
</div>
<!-- 1. Exact Design Matching Top-Right Toast Notification Component -->
@once
<div id="grid-custom-toast" class="fixed top-24 right-5 z-50 transform translate-x-10 opacity-0 hidden transition-all duration-500 ease-out items-center gap-3 bg-[#EDFBF5] text-[#12B76A] px-5 py-4 rounded-lg shadow-md max-w-sm border-l-4 border-[#12B76A]">
    <!-- Green Check Circle Icon -->
    <div class="flex-shrink-0 text-[#12B76A]">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </div>
    <!-- Dynamic Message Text -->
    <span id="grid-custom-toast-message" class="text-xs font-bold tracking-wider uppercase text-[#194E34]">
        Product added to cart successfully!
    </span>
</div>
@endonce

<!-- 2. Updated Script Logic -->
<script>
if (typeof allProductsAddToCart !== 'function') {
    function allProductsAddToCart(productId) {
        fetch(`/cart/add/${productId}`, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                // Cart Badge Count Update
                const headerBadge = document.getElementById('cart-count');
                if (headerBadge) {
                    headerBadge.innerText = data.cart_count;
                }
                
                // Toast Display and Animation Setup
                const toastBox = document.getElementById('grid-custom-toast');
                const toastMsg = document.getElementById('grid-custom-toast-message');
                
                if (toastBox && toastMsg) {
                    toastMsg.innerText = data.message.toUpperCase(); // Uniform layout keep karne k liye uppercase
                    
                    toastBox.classList.remove('hidden');
                    setTimeout(() => {
                        toastBox.classList.remove('translate-x-10', 'opacity-0');
                        toastBox.classList.add('flex', 'translate-x-0', 'opacity-100');
                    }, 10);
                    
                    // 3 seconds ke baad smooth exit animation
                    setTimeout(() => {
                        toastBox.classList.remove('translate-x-0', 'opacity-100');
                        toastBox.classList.add('translate-x-10', 'opacity-0');
                        
                        setTimeout(() => {
                            toastBox.classList.remove('flex');
                            toastBox.classList.add('hidden');
                        }, 500);
                    }, 3000);
                }
            }
        })
        .catch(error => console.error('Error:', error));
    }
}
</script>