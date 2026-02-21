<section id="contact"
    class="py-24 relative overflow-hidden bg-gradient-to-b from-black via-gray-950 to-black border-t border-orange-500/10"
    role="region"
    aria-label="Contact section">

    <!-- Glowing background orbs -->
    <div class="absolute top-0 left-0 w-1/3 h-1/3 bg-orange-500/10 blur-[120px] rounded-full animate-pulse-slow" aria-hidden="true"></div>
    <div class="absolute bottom-0 right-0 w-1/2 h-1/2 bg-orange-400/10 blur-[150px] rounded-full animate-pulse-slow" aria-hidden="true"></div>

    <div class="container mx-auto relative z-10 px-6">

        <!-- Section Header -->
        <header class="text-center mb-16 animate-fadeInUp">
            <span class="text-orange-400 uppercase tracking-widest font-medium">Get In Touch</span>
            <h2 class="text-4xl md:text-5xl font-bold text-white mt-4 mb-6">
                Contact <span class="text-orange-400">Us</span>
            </h2>
            <p class="text-gray-300 max-w-3xl mx-auto text-lg md:text-xl leading-relaxed">
                Have a project or idea in mind? Let’s collaborate to bring it to life.
            </p>
        </header>

        <!-- Success message -->
        @if(session('success'))
            <div class="max-w-xl mx-auto mb-6 p-4 bg-green-600/20 border border-green-600/40 text-green-300 rounded text-center shadow-lg animate-fadeIn"
                role="alert">
                {{ session('success') }}
            </div>
        @endif

        <!-- Grid Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

            {{-- Contact Form --}}
            <div class="animate-fadeInLeft">
                <h3 class="text-2xl md:text-3xl font-semibold text-white mb-4">Send Us a Message</h3>
                <p class="text-gray-400 mb-8">Fill out the form below and we’ll get back to you shortly.</p>

                <form action="{{ route('contact.send') }}" method="POST" class="space-y-6" novalidate>
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm text-gray-300 mb-2">Full Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" required placeholder="John Doe"
                                class="w-full bg-black border border-orange-500/20 text-white px-4 py-3 rounded-md focus:border-orange-400 focus:ring-1 focus:ring-orange-500 outline-none transition duration-300 hover:shadow-md hover:shadow-orange-500/20">
                        </div>

                        <div>
                            <label class="block text-sm text-gray-300 mb-2">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" required placeholder="john@example.com"
                                class="w-full bg-black border border-orange-500/20 text-white px-4 py-3 rounded-md focus:border-orange-400 focus:ring-1 focus:ring-orange-500 outline-none transition duration-300 hover:shadow-md hover:shadow-orange-500/20">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm text-gray-300 mb-2">Phone</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="+966 512345678"
                                class="w-full bg-black border border-orange-500/20 text-white px-4 py-3 rounded-md focus:border-orange-400 focus:ring-1 focus:ring-orange-500 outline-none transition duration-300 hover:shadow-md hover:shadow-orange-500/20">
                        </div>

                        <div>
                            <label class="block text-sm text-gray-300 mb-2">Select Service</label>
                            <select name="inquiry_service_id"
                                class="w-full bg-black border border-orange-500/20 text-white px-4 py-3 rounded-md focus:border-orange-400 focus:ring-1 focus:ring-orange-500 outline-none transition duration-300 hover:shadow-md hover:shadow-orange-500/20">
                                <option value="">Select Service</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}" @selected(old('inquiry_service_id') == $service->id)>
                                        {{ $service->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm text-gray-300 mb-2">Message</label>
                        <textarea name="message" rows="5" required placeholder="Tell us about your project..."
                            class="w-full bg-black border border-orange-500/20 text-white px-4 py-3 rounded-md focus:border-orange-400 focus:ring-1 focus:ring-orange-500 outline-none transition duration-300 hover:shadow-md hover:shadow-orange-500/20">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-orange-500 text-black font-semibold py-3 rounded-md hover:bg-orange-400 hover:shadow-lg hover:shadow-orange-500/30 transition duration-300">
                        Send Message
                    </button>
                </form>
            </div>

            {{-- Contact Info --}}
            <aside class="animate-fadeInRight">
                <h3 class="text-2xl md:text-3xl font-semibold text-white mb-4">Contact Information</h3>
                <p class="text-gray-400 mb-8">You can also reach us directly through the following details:</p>

                <div class="space-y-6 text-gray-300">
                    <div class="flex items-center gap-3 hover:text-orange-400 transition duration-300">
                        <svg class="w-6 h-6 text-orange-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>{{ $settings['email'] ?? "info@shatcoksa.com"}}</span>
                    </div>

                    <div class="flex items-center gap-3 hover:text-orange-400 transition duration-300">
                        <svg class="w-6 h-6 text-orange-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2H19C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span>{{ $settings['phone'] ?? "+966 123 456 789" }}</span>
                    </div>

                    <div class="flex items-center gap-3 hover:text-orange-400 transition duration-300">
                        <svg class="w-6 h-6 text-orange-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" />
                            <circle cx="12" cy="9" r="2.5" />
                        </svg>
                        <span>{{ $settings['address'] ?? "Riyadh, Saudi Arabia" }}</span>
                    </div>
                </div>

                <div class="mt-10">
                    <h4 class="text-xl md:text-2xl text-orange-400 font-semibold mb-2">Office Hours</h4>
                    <p class="text-gray-400">Sunday – Thursday: 9:00 AM – 6:00 PM</p>
                    <p class="text-gray-400">Friday & Saturday: Closed</p>
                </div>
            </aside>
        </div>
    </div>

    <!-- Custom Animations -->
    <style>
        [x-cloak] { display: none !important; }

        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeInUp { animation: fadeInUp 0.8s ease-out both; }

        @keyframes fadeInLeft {
            0% { opacity: 0; transform: translateX(-40px); }
            100% { opacity: 1; transform: translateX(0); }
        }
        .animate-fadeInLeft { animation: fadeInLeft 0.8s ease-out both; }

        @keyframes fadeInRight {
            0% { opacity: 0; transform: translateX(40px); }
            100% { opacity: 1; transform: translateX(0); }
        }
        .animate-fadeInRight { animation: fadeInRight 0.8s ease-out both; }

        @keyframes pulse-slow {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.05); opacity: 0.7; }
        }
        .animate-pulse-slow { animation: pulse-slow 6s ease-in-out infinite; }
    </style>
</section>
