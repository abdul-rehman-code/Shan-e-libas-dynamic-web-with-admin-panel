<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shan-E-Libas | Elegance In Every Thread</title>

    <!-- SEO Meta Tags -->
<meta name="description" content="Shan-E-Libas - Premium Pakistani clothing store. Shop latest women's fashion, lawn suits, formal wear and more. Free shipping on orders over PKR 5000.">
<meta name="keywords" content="Pakistani clothes online, women fashion Pakistan, lawn suits, shalwar kameez, Pakistani dress, online shopping Pakistan, Shan-E-Libas">
<meta name="author" content="Shan-E-Libas">
<meta name="robots" content="index, follow">
<link rel="canonical" href="https://shanelibas.store">

<!-- Open Graph Tags -->
<meta property="og:title" content="Shan-E-Libas | Elegance In Every Thread">
<meta property="og:description" content="Premium Pakistani clothing store with latest collections. Free shipping on orders over PKR 5000.">
<meta property="og:url" content="https://shanelibas.store">
<meta property="og:type" content="website">
<meta property="og:image" content="https://shanelibas.store/images/og-image.jpg">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Shan-E-Libas | Elegance In Every Thread">
<meta name="twitter:description" content="Premium Pakistani clothing store with latest collections.">

@hasSection('meta')
    @yield('meta')
@else
    <meta name="description" content="Shan-E-Libas - Premium Pakistani clothing store.">
@endif



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif-luxury { font-family: 'Playfair Display', serif; }
        /* Global horizontal scroll fix that preserves position: sticky */
        html, body { overflow-x: clip !important; max-width: 100vw; }
    </style>
</head>
<body class="bg-[#F5F5F7] text-[#333333] flex flex-col min-h-screen antialiased">

<div id="toast-container" class="fixed top-24 right-5 z-[9999] space-y-3 pointer-events-none"></div>
@include('partials.header')

    <main class="flex-grow w-full overflow-x-hidden">
        @yield('content')
    </main>

    @include('partials.footer');

   
</body>
</html><script>
document.addEventListener('DOMContentLoaded', function () {
    const cartButtons = document.querySelectorAll('.add-to-cart-btn');

    cartButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            const productId = this.getAttribute('data-id');

            fetch(`/cart/add/${productId}`, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const cartCountBadge = document.querySelector('#cart-count');
                    
                    if (cartCountBadge) {
                        cartCountBadge.innerText = data.cart_count;
                    }

                    // Alert khatam! Ab yahan hum custom toast function call kr rhe hain
                    showToast(data.message);
                }
            })
            .catch(error => {
                console.error('Fetch error:', error);
            });
        });
    });
});

function showToast(message) {
    const container = document.getElementById('toast-container');
    if (!container) return;

    const toast = document.createElement('div');
    
    toast.className = "pointer-events-auto flex items-center gap-3 bg-green-50 border-l-4 border-green-600 text-green-800 px-4 py-3 rounded-r-lg shadow-xl transform translate-x-full opacity-0 transition-all duration-300 ease-out min-w-[300px] z-[9999]";
    
    toast.innerHTML = `
        <svg class="w-5 h-5 text-green-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <div class="text-xs font-bold tracking-wide uppercase">${message}</div>
    `;

    container.appendChild(toast);

    setTimeout(() => {
        toast.classList.remove('translate-x-full', 'opacity-0');
    }, 10);

    setTimeout(() => {
        toast.classList.add('translate-x-full', 'opacity-0');
        setTimeout(() => {
            toast.remove();
        }, 300);
    }, 3000);
}
</script>