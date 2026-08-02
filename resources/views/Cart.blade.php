@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold uppercase tracking-wider text-[#6E472D] mb-8 text-center">Your Shopping Cart</h1>

    <div id="cart-wrapper">
        @if(count($cart) > 0)
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Cart Items List -->
                <div class="lg:col-span-2 space-y-4">
                    @php $total = 0; @endphp
                    @foreach($cart as $id => $details)
                        @php $total += $details['price'] * $details['quantity']; @endphp
                        
                        <!-- Row ID -->
                        <div id="cart-row-{{ $id }}" class="flex flex-col sm:flex-row sm:items-center justify-between border border-gray-100 rounded-xl p-4 shadow-xs bg-white relative group gap-4">
                            <div class="flex items-center gap-4">
                                <!-- Product Image -->
                                @if(isset($details['image']) && is_array($details['image']) && count($details['image']) > 0)
                            
                                    <img src="{{ asset('storage/' . $details['image'][0]) }}" alt="{{ $details['name'] ?? 'Product Image' }}" class="w-16 h-16 sm:w-20 sm:h-20 object-cover rounded-lg">
                                @elseif(isset($details['image']) && is_string($details['image']) && !empty($details['image']))
                                    
                                    <img src="{{ asset('storage/' . $details['image']) }}" alt="{{ $details['name'] ?? 'Product Image' }}" class="w-16 h-16 sm:w-20 sm:h-20 object-cover rounded-lg">
                                @else
                                    <img src="https://images.unsplash.com/photo-1591047139829-d91aecb6caea?auto=format&fit=crop&q=80&w=500" alt="Fallback Image" class="w-16 h-16 sm:w-20 sm:h-20 object-cover rounded-lg">
                                @endif
                                
                                <div>
                                    <h3 class="font-bold text-gray-800 text-sm sm:text-base">{{ $details['name'] }}</h3>
                                    <p class="text-xs text-gray-500 py-0.5 sm:py-1">Price: Rs. {{ number_format($details['price']) }}</p>
                                    
                                    <!-- Cross / Delete Button (Product Name k neechay pyara sa text link) -->
                                    <button onclick="removeItem('{{ $id }}')" class="text-xs text-red-600 hover:text-red-800 font-semibold uppercase tracking-wider flex items-center gap-1 mt-0.5 sm:mt-1 cursor-pointer transition">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Remove Item
                                    </button>
                                </div>
                            </div>

                            <!-- Quantity Selector & Total -->
                            <div class="flex items-center justify-between sm:justify-end gap-6 w-full sm:w-auto border-t border-gray-50 sm:border-t-0 pt-3 sm:pt-0">
                                <!-- Custom Plus Minus Buttons -->
                                <div class="flex items-center border border-gray-200 rounded-lg overflow-hidden bg-gray-50">
                                    <button onclick="changeQty('{{ $id }}', -1)" class="px-2.5 py-1 bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold transition cursor-pointer text-xs sm:text-sm">-</button>
                                    <input type="text" id="qty-input-{{ $id }}" value="{{ $details['quantity'] }}" class="w-8 sm:w-10 text-center bg-transparent text-xs sm:text-sm font-semibold text-gray-700 outline-none" readonly>
                                    <button onclick="changeQty('{{ $id }}', 1)" class="px-2.5 py-1 bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold transition cursor-pointer text-xs sm:text-sm">+</button>
                                </div>
                                
                                <!-- Individual Item Total Price -->
                                <span id="item-total-{{ $id }}" class="font-bold text-[#6E472D] min-w-[70px] sm:min-w-[90px] text-right text-sm sm:text-base">
                                    Rs. {{ number_format($details['price'] * $details['quantity']) }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Order Summary Card -->
                <div class="bg-gray-50 rounded-xl p-6 h-fit shadow-xs border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 uppercase tracking-wider">Order Summary</h3>
                    
                    <!-- Subtotal Row -->
                    <div class="flex justify-between mb-3">
                        <span class="text-gray-600 text-sm">Subtotal</span>
                        <span id="cart-subtotal" class="font-bold text-gray-800">Rs. {{ number_format($total) }}</span>
                    </div>

                    <!-- Delivery Charges Row -->
                    <div class="flex justify-between border-b border-gray-200 pb-3 mb-4">
                        <span class="text-gray-600 text-sm">Delivery Charges</span>
                        <span id="delivery-charges" class="font-bold {{ $total >= 5000 ? 'text-green-600' : 'text-gray-800' }}">
                            {{ $total >= 5000 ? 'Free' : 'Rs. 300' }}
                        </span>
                    </div>

                    <!-- Grand Total Row -->
                    <div class="flex justify-between mb-6">
                        <span class="text-base font-bold text-gray-800">Total Amount</span>
                        @php 
                            $grandTotal = $total >= 5000 ? $total : $total + 300;
                        @endphp
                        <span id="cart-total" class="text-xl font-extrabold text-[#6E472D]">Rs. {{ number_format($grandTotal) }}</span>
                    </div>

                    <a href="#" class="block w-full bg-[#6E472D] hover:bg-[#533521] text-white text-xs font-bold uppercase tracking-widest text-center py-4 px-4 rounded-lg transition duration-300 shadow-xs">
                        Proceed to Checkout
                    </a>
                </div>
            </div>
        @else
            <!-- Empty Cart State Container -->
            <div class="text-center py-16 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
                <p class="text-gray-500 font-medium mb-6">Your cart is feeling a bit light!</p>
                <a href="{{ route('home') }}" class="inline-block bg-[#6E472D] hover:bg-[#533521] text-white text-xs font-bold uppercase tracking-widest py-3 px-6 rounded-lg transition">
                    Continue Shopping
                </a>
            </div>
        @endif
    </div>
</div>

<!-- AJAX JavaScript for Cart Updates -->
<script>
// 1. Quantity Plus Minus handler
function changeQty(productId, amount) {
    const inputField = document.getElementById('qty-input-' + productId);
    if (!inputField) return;

    let currentQty = parseInt(inputField.value);
    let newQty = currentQty + amount;

    updateCartRequest(productId, newQty, inputField);
}

// 2. Direct Cross / Remove Button handler
function removeItem(productId) {
    if (confirm('Do you want to remove this product?')) {
        updateCartRequest(productId, 0, null);
    }
}

// Core Fetch Function jo server ko request bhejti hy
function updateCartRequest(productId, targetQty, inputField) {
    fetch("{{ route('cart.update') }}", {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({
            id: productId,
            quantity: targetQty
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Header counter update
            const headerBadge = document.getElementById('cart-count');
            if (headerBadge) headerBadge.innerText = data.cart_count;

            // Agar row remove ho chuki hy (ya qty 0 thi ya direct remove dabaya)
            if (data.removed) {
                const row = document.getElementById('cart-row-' + productId);
                if (row) row.remove();
                
                if (data.cart_count === 0) {
                    location.reload(); // Empty state view lane klye
                }
            } else if (inputField) {
                // Input aur row item total update
                inputField.value = targetQty;
                document.getElementById('item-total-' + productId).innerText = data.item_total;
            }

            // --- FIXED: DELIVERY CHARGES AUR TOTALS KO LIVE SWAP KREGA ---
            document.getElementById('cart-subtotal').innerText = data.subtotal;
            document.getElementById('cart-total').innerText = data.total;
            
            const shippingBadge = document.getElementById('delivery-charges');
            if (shippingBadge) {
                shippingBadge.innerText = data.shipping;
                if (data.is_free_shipping) {
                    shippingBadge.className = "font-bold text-green-600";
                } else {
                    shippingBadge.className = "font-bold text-gray-800";
                }
            }
        }
    })
    .catch(error => console.error('Error updating cart:', error));
}
</script>
@endsection