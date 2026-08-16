<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shan-E-Libas | Elegance In Every Thread</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo/Favicon_logo.ico') }}">

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

        @keyframes wa-ripple {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7), 0 0 0 0 rgba(37, 211, 102, 0.4);
            }
            70% {
                box-shadow: 0 0 0 12px rgba(37, 211, 102, 0), 0 0 0 24px rgba(37, 211, 102, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0), 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }

        .wa-waves-btn {
            animation: wa-ripple 2s infinite;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 999999;
            background-color: #25D366;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: transform 0.2s ease-in-out;
        }

        .wa-waves-btn svg {
            width: 30px;
            height: 30px;
            fill: #ffffff;
        }

        /* Desktop Screens Fix */
        @media (min-width: 768px) {
            .wa-waves-btn {
                width: 60px;
                height: 60px;
                bottom: 30px;
                right: 30px;
            }
            .wa-waves-btn svg {
                width: 36px;
                height: 36px;
            }
        }
    </style>
</head>
<body class="bg-[#F5F5F7] text-[#333333] flex flex-col min-h-screen antialiased">

    <div id="toast-container" class="fixed top-24 right-5 z-[9999] space-y-3 pointer-events-none"></div>

    @include('partials.header')

    <main class="flex-grow w-full overflow-x-hidden">
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- FLOATING WHATSAPP BUTTON -->
    <a href="https://wa.me/923090386227?text=Hi,%20I%20have%20a%20query%20about%20your%20products." 
       target="_blank" 
       rel="noopener noreferrer"
       class="wa-waves-btn"
       onmouseover="this.style.transform='scale(1.1)'"
       onmouseout="this.style.transform='scale(1)'">
        
        <!-- WhatsApp Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3 18.6-68.1-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18.1-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18.1-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
        </svg>
    </a>

    <script>
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
</body>
</html>