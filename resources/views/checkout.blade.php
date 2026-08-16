@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#FAF6F3] py-10 px-4 sm:px-6 lg:px-8 relative" 
     x-data="{ 
        paymentMethod: 'cod', 
        loading: false,
        orderSuccess: false,
        orderId: '',
        countdown: 5,
        timer: null,
        submitOrder(e) {
            const form = e.target;
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            this.loading = true;
            const formData = new FormData(form);

            fetch('{{ route('place.order') }}', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(async response => {
                const data = await response.json();
                if (!response.ok) {
                    throw new Error(data.message || 'Something went wrong while placing your order.');
                }
                return data;
            })
            .then(data => {
                this.loading = false;
                this.orderId = data.order_id;
                this.orderSuccess = true;
                
                // 5 seconds auto redirect counter
                this.timer = setInterval(() => {
                    this.countdown--;
                    if (this.countdown <= 0) {
                        this.redirectToHome();
                    }
                }, 1000);
            })
            .catch(error => {
                this.loading = false;
                alert('Error: ' + error.message);
            });
        },
        redirectToHome() {
            if (this.timer) clearInterval(this.timer);
            window.location.href = '{{ url('/') }}';
        }
     }">

    <!-- SUCCESS POPUP MODAL -->
    <div x-show="orderSuccess" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-90"
         x-transition:enter-end="opacity-100 scale-100"
         class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4" 
         style="display: none;">
        <div class="bg-white p-8 rounded-3xl shadow-2xl flex flex-col items-center space-y-5 text-center max-w-md w-full border border-emerald-100">
            
            <!-- Green Animated Icon -->
            <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-600 shadow-inner">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>

            <div class="space-y-2">
                <h3 class="text-2xl font-bold text-gray-900" style="font-family: 'Cormorant Garamond', serif;">Order Placed Successfully! 🎉</h3>
                <p class="text-base font-semibold text-[#4A3222]">
                    Your Order ID: <span class="text-emerald-600 font-extrabold" x-text="'#' + orderId"></span>
                </p>
                <p class="text-xs text-gray-500">Thank you for shopping with us! We have received your order.</p>
            </div>

            <!-- REDIRECT BUTTON WITH COUNTDOWN -->
            <button @click="redirectToHome()" 
                class="w-full bg-[#4A3222] hover:bg-[#362418] text-white font-bold py-3.5 px-6 rounded-2xl transition shadow-md flex items-center justify-center space-x-2 text-sm uppercase tracking-wider">
                <span>Redirecting to Home in <span class="text-amber-300 font-black" x-text="countdown">5</span>s</span>
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </button>
        </div>
    </div>

    <div class="max-w-6xl mx-auto">
        
        <!-- Page Title -->
        <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 text-center mb-10" style="font-family: 'Cormorant Garamond', serif;">
            Checkout
        </h1>

        <form @submit.prevent="submitOrder($event)" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                
                <!-- LEFT COLUMN: Billing Information & Payment Method -->
                <div class="lg:col-span-7 space-y-8">
                    
                    <!-- Billing Information Card -->
                    <div class="bg-white p-6 sm:p-8 rounded-3xl shadow-sm border border-gray-100">
                        <h2 class="text-lg font-bold text-gray-900 mb-6">Billing Information</h2>
                        
                        <div class="space-y-5">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-800 mb-2">Full Name <span class="text-red-500">*</span></label>
                                    <input type="text" name="name" required placeholder="Enter your name" 
                                        class="w-full bg-[#FAF6F3] border-0 rounded-xl px-4 py-3.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#4A3222] transition">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-800 mb-2">Phone Number <span class="text-red-500">*</span></label>
                                    <input type="text" name="phone" required placeholder="03xx-xxxxxxx" 
                                        class="w-full bg-[#FAF6F3] border-0 rounded-xl px-4 py-3.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#4A3222] transition">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">Email (Optional)</label>
                                <input type="email" name="email" placeholder="email@example.com" 
                                    class="w-full bg-[#FAF6F3] border-0 rounded-xl px-4 py-3.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#4A3222] transition">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-800 mb-2">Full Delivery Address <span class="text-red-500">*</span></label>
                                <textarea name="address" rows="3" required placeholder="House #, Street, Area..." 
                                    class="w-full bg-[#FAF6F3] border-0 rounded-xl px-4 py-3.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#4A3222] transition resize-none"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method Card -->
                    <div class="bg-white p-6 sm:p-8 rounded-3xl shadow-sm border border-gray-100">
                        <h2 class="text-lg font-bold text-gray-900 mb-6">Payment Method</h2>
                        
                        <div class="space-y-4">
                            <!-- Option 1: COD -->
                            <label class="flex items-center justify-between p-4 rounded-2xl bg-[#FAF6F3]/60 border border-gray-200/60 cursor-pointer hover:bg-[#FAF6F3] transition">
                                <div class="flex items-center space-x-3">
                                    <input type="radio" name="payment_method" value="cod" x-model="paymentMethod" class="w-4 h-4 text-[#4A3222] focus:ring-[#4A3222]">
                                    <div>
                                        <p class="text-sm font-bold text-gray-900">Cash on Delivery (COD)</p>
                                        <p class="text-xs text-gray-500 mt-0.5">Pay when your order is delivered</p>
                                    </div>
                                </div>
                            </label>

                            <!-- Option 2: Online Payment -->
                            <div class="p-5 rounded-2xl bg-[#FAF6F3] border-2 border-[#4A3222]/20 space-y-4">
                                <label class="flex items-center space-x-3 cursor-pointer">
                                    <input type="radio" name="payment_method" value="jazzcash" x-model="paymentMethod" class="w-4 h-4 text-[#4A3222] focus:ring-[#4A3222]">
                                    <div>
                                        <p class="text-sm font-bold text-gray-900">Online Payment (JazzCash / Bank Transfer)</p>
                                        <p class="text-xs text-[#4A3222] font-medium mt-0.5">Pay via JazzCash / Bank to confirm order</p>
                                    </div>
                                </label>

                                <div class="space-y-4" x-show="paymentMethod === 'jazzcash'">
                                    <div class="space-y-3">
                                        @forelse($settings as $setting)
                                            <div class="bg-white p-4 rounded-xl border border-[#4A3222]/10 space-y-1 shadow-sm">
                                                <p class="text-xs font-bold text-gray-700">{{ $setting->bank_name }} Account Details:</p>
                                                <p class="text-[#4A3222] font-bold text-base">{{ $setting->account_number }}</p>
                                                <p class="text-xs text-gray-600">Account Holder: <span class="font-bold text-gray-800">{{ $setting->account_name }}</span></p>
                                            </div>
                                        @empty
                                            <div class="bg-white p-4 rounded-xl border border-[#4A3222]/10 space-y-1">
                                                <p class="text-xs font-bold text-gray-700">JazzCash Account Details:</p>
                                                <p class="text-[#4A3222] font-bold text-base">03090386227</p>
                                                <p class="text-xs text-gray-600">Account Holder: <span class="font-bold text-gray-800">Shan-E-Libas</span></p>
                                            </div>
                                        @endforelse
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold text-gray-800 mb-2">Upload Payment Screenshot <span class="text-red-500">*</span></label>
                                        <input type="file" name="payment_screenshot" accept="image/*" :required="paymentMethod === 'jazzcash'"
                                            class="w-full text-xs text-gray-600 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-[#4A3222]/10 file:text-[#4A3222] hover:file:bg-[#4A3222]/20 cursor-pointer">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- RIGHT COLUMN: Order Summary -->
                <div class="lg:col-span-5">
                    <div class="bg-white p-6 sm:p-8 rounded-3xl shadow-sm border border-gray-100 sticky top-6">
                        <h2 class="text-lg font-bold text-gray-900 mb-6">Your Order</h2>

                        <!-- Cart Items -->
                        <div class="divide-y divide-gray-100 mb-6 max-h-64 overflow-y-auto pr-1">
                            @php $subtotal = 0; @endphp
                            @foreach($cart as $id => $details)
                                @php 
                                    $itemTotal = $details['price'] * $details['quantity'];
                                    $subtotal += $itemTotal;
                                @endphp
                                <div class="py-3.5 flex justify-between items-start text-sm">
                                    <div>
                                        <p class="font-bold text-gray-800">{{ $details['name'] }}</p>
                                        <p class="text-xs text-gray-500 mt-1">Qty: {{ $details['quantity'] }}</p>
                                    </div>
                                    <span class="font-bold text-[#4A3222] text-sm">Rs. {{ number_format($itemTotal) }}</span>
                                </div>
                            @endforeach
                        </div>

                        <!-- Price Calculations -->
                        @php 
                            $shipping = $subtotal >= 5000 ? 0 : 300; 
                            $total = $subtotal + $shipping; 
                        @endphp
                        <div class="space-y-3.5 border-t border-gray-100 pt-5 text-sm">
                            <div class="flex justify-between text-gray-600">
                                <span>Subtotal</span>
                                <span class="font-bold text-gray-900">Rs. {{ number_format($subtotal) }}</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Shipping</span>
                                <span class="font-bold">
                                    @if($shipping == 0)
                                        <span class="text-emerald-600">Free</span>
                                    @else
                                        <span class="text-gray-900">Rs. {{ number_format($shipping) }}</span>
                                    @endif
                                </span>
                            </div>
                            <div class="flex justify-between text-base font-bold pt-4 border-t border-gray-100">
                                <span class="text-gray-900">Total</span>
                                <span class="text-[#4A3222] text-lg">Rs. {{ number_format($total) }}</span>
                            </div>
                        </div>

                        <!-- PLACE ORDER BUTTON WITH IN-BUTTON LOADING SPINNER -->
<button type="submit" 
    :disabled="loading"
    style="background-color: #4A3222;"s
    class="w-full mt-6 text-white text-sm font-bold py-4 px-6 rounded-2xl uppercase tracking-wider transition-all duration-300 hover:opacity-90 disabled:opacity-50 disabled:cursor-not-allowed shadow-md flex items-center justify-center space-x-2">
    
    <!-- Button Loading Spinner -->
    <svg x-show="loading" class="animate-spin -ml-1 mr-2 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" style="display: none;">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
    </svg>

    <span x-text="loading ? 'Processing...' : 'PLACE ORDER'"></span>
</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection