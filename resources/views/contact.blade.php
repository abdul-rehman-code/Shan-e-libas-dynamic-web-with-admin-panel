@extends('layouts.app')
@section('meta')
    <title>Contact Us | Shan-E-Libas</title>
    <meta name="description" content="Contact Shan-E-Libas for any queries about our premium Pakistani clothing. Call us at +92 309 0386227 or send us a message. We're here to help!">
    <meta name="keywords" content="contact Shan-E-Libas, Pakistani clothes store contact, customer support Pakistan">
    <meta property="og:title" content="Contact Us | Shan-E-Libas">
    <meta property="og:description" content="Get in touch with Shan-E-Libas - Premium Pakistani clothing store.">
    <meta property="og:url" content="https://shanelibas.store/contact-us">
@endsection
@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,400&display=swap');
</style>

<div class="bg-[#FDFBF7] min-h-screen font-sans pb-16">

    <!-- Hero Banner -->
    <div class="relative w-full overflow-hidden bg-[#241A14] flex items-center mb-16 sm:min-h-[400px] shadow-sm" style="background: linear-gradient(135deg, #3A2B24 0%, #1A130F 100%);">
        <div class="absolute inset-0 opacity-20 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1596524430615-b46475ddff6e?auto=format&fit=crop&w=1920&q=80'); mix-blend-mode: overlay;"></div>
        
        <div class="relative max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8 w-full z-10 py-20 text-center">
            <span class="inline-block py-1.5 px-4 rounded-full border border-[#D4AF37]/40 bg-[#D4AF37]/10 text-[#D4AF37] text-xs font-semibold tracking-[0.15em] uppercase mb-6 shadow-sm">
                We Are Here For You
            </span>
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-normal text-white mb-6 leading-tight tracking-wide" style="font-family: 'Cormorant Garamond', serif;">
                Contact Us
            </h1>
            <p class="text-gray-300 text-sm sm:text-base leading-relaxed max-w-2xl mx-auto font-light">
                Have a question about a product, need styling advice, or require support? Reach out to our dedicated team and we'll ensure you receive a royal experience.
            </p>
        </div>
    </div>

    <!-- Main Content Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 md:gap-12 lg:gap-16">
            
            <!-- Contact Information (Left Column) -->
            <div class="md:col-span-5 flex flex-col space-y-8">
                <div>
                    <h2 class="text-3xl sm:text-4xl text-gray-900 mb-4" style="font-family: 'Cormorant Garamond', serif;">Get In Touch</h2>
                    <div class="w-16 h-1 bg-[#D4AF37] mb-6 rounded-full"></div>
                    <p class="text-gray-600 leading-relaxed mb-8">
                        Whether you are looking for custom bridal wear details or need help with your order, we are always ready to assist you. Drop us a message or visit our boutique.
                    </p>
                </div>

                <div class="space-y-6">
                    <!-- Location -->
                    <div class="flex items-start gap-4 p-4 bg-white rounded-2xl shadow-sm border border-gray-50 hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 bg-[#FDFBF7] rounded-full flex items-center justify-center flex-shrink-0 border border-[#D4AF37]/20">
                            <svg class="w-6 h-6 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1" style="font-family: 'Cormorant Garamond', serif;">Our Boutique</h4>
                            <p class="text-sm text-gray-500 leading-relaxed">Shahkot, Faisalabad, Pakistan</p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex items-start gap-4 p-4 bg-white rounded-2xl shadow-sm border border-gray-50 hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 bg-[#FDFBF7] rounded-full flex items-center justify-center flex-shrink-0 border border-[#D4AF37]/20">
                            <svg class="w-6 h-6 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1" style="font-family: 'Cormorant Garamond', serif;">Call Us</h4>
                            <p class="text-sm text-gray-500 leading-relaxed">+923090386227<br>Mon-Sat: 10:00 AM - 9:00 PM</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start gap-4 p-4 bg-white rounded-2xl shadow-sm border border-gray-50 hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 bg-[#FDFBF7] rounded-full flex items-center justify-center flex-shrink-0 border border-[#D4AF37]/20">
                            <svg class="w-6 h-6 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1" style="font-family: 'Cormorant Garamond', serif;">Email Us</h4>
                            <p class="text-sm text-gray-500 leading-relaxed">support@shanelibas.com<br>info@shanelibas.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form (Right Column) -->
            <div class="md:col-span-7">
                <div class="bg-white rounded-[2rem] p-8 sm:p-10 shadow-xl border border-gray-100">
                    <h3 class="text-2xl text-gray-900 mb-6" style="font-family: 'Cormorant Garamond', serif;">Send a Message</h3>
                    
                   <!-- Success Message Alert -->
               <!-- Response Alert Message Box -->
         <div id="contact-alert" class="hidden mb-6 p-4 rounded-xl text-sm font-medium"></div>

            <form id="contact-form" action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                        <input type="text" name="first_name" required placeholder="Jane" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition-all placeholder-gray-400">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                        <input type="text" name="last_name" required placeholder="Doe" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition-all placeholder-gray-400">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input type="email" name="email" required placeholder="jane@example.com" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition-all placeholder-gray-400">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                    <input type="text" name="subject" required placeholder="How can we help?" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition-all placeholder-gray-400">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                    <textarea name="message" rows="5" required placeholder="Write your message here..." class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition-all placeholder-gray-400 resize-none"></textarea>
                </div>

                <button type="submit" id="submit-btn" class="w-full bg-[#6E472D] hover:bg-[#5A3924] text-white py-4 rounded-xl transition-all duration-300 font-medium tracking-wide shadow-md hover:shadow-lg flex justify-center items-center gap-2">
                    <span id="btn-text">Send Message</span>
                    <!-- Spinner Icon -->
                    <svg id="btn-spinner" class="hidden animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </button>
            </form>

            <script>
            document.getElementById('contact-form').addEventListener('submit', function(e) {
                e.preventDefault();

                const form = this;
                const btn = document.getElementById('submit-btn');
                const btnText = document.getElementById('btn-text');
                const btnSpinner = document.getElementById('btn-spinner');
                const alertBox = document.getElementById('contact-alert');

                // Button state -> Loading
                btn.disabled = true;
                btnText.innerText = 'Sending...';
                btnSpinner.classList.remove('hidden');
                alertBox.classList.add('hidden');

                const formData = new FormData(form);

                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    alertBox.classList.remove('hidden', 'bg-red-50', 'border-red-200', 'text-red-700');
                    
                    if (data.status === 'success') {
                        alertBox.className = 'mb-6 p-4 rounded-xl text-sm font-medium bg-green-50 border border-green-200 text-green-700';
                        alertBox.innerText = data.message;
                        form.reset(); 
                    } else {
                        alertBox.className = 'mb-6 p-4 rounded-xl text-sm font-medium bg-red-50 border border-red-200 text-red-700';
                        alertBox.innerText = data.message || 'Something went wrong!';
                    }
                })
                .catch(error => {
                    alertBox.classList.remove('hidden');
                    alertBox.className = 'mb-6 p-4 rounded-xl text-sm font-medium bg-red-50 border border-red-200 text-red-700';
                    alertBox.innerText = 'Error sending message. Please try again.';
                })
                .finally(() => {
                    // Button state -> Normal
                    btn.disabled = false;
                    btnText.innerText = 'Send Message';
                    btnSpinner.classList.add('hidden');
                });
            });
            </script>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
