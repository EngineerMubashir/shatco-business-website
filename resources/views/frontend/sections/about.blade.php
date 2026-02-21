<section id="about"
    x-data="{ ready: false }"
    x-init="requestAnimationFrame(() => ready = true)"
    class="relative py-24 overflow-hidden min-h-screen bg-gradient-to-br from-black via-[#1a0e00] to-[#2b0f00] text-gray-100">

    {{-- 🔸 Background Glow --}}
    <div class="absolute inset-0 z-0 pointer-events-none">
        <div class="absolute top-1/4 left-1/3 w-96 h-96 bg-amber-500/20 blur-[130px] rounded-full animate-pulse-slow"></div>
        <div class="absolute bottom-1/4 right-1/4 w-[28rem] h-[28rem] bg-amber-600/10 blur-[120px] rounded-full animate-pulse-slow"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            {{-- 🔹 Left Image --}}
            <div x-show="ready" class="relative group animate-fadeInLeft">
                <div class="relative bg-gradient-to-tr from-amber-900/40 via-amber-800/20 to-transparent 
                            rounded-3xl border border-amber-500/30 p-4 shadow-lg shadow-amber-900/30 overflow-hidden">

                    <div class="relative w-full h-[550px] rounded-2xl overflow-hidden">
                        <img
                            src="{{ asset('assests/images/projects/solar.webp') }}"
                            alt="Solar panels with modern city background"
                            loading="lazy"
                            decoding="async"
                            class="object-cover w-full h-full rounded-2xl transform group-hover:scale-105 transition-transform duration-700 ease-in-out shadow-lg will-change-transform">
                    </div>

                    {{-- Overlay text box --}}
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6">
                        <h3 class="text-4xl font-serif font-bold bg-gradient-to-r from-amber-400 via-amber-200 to-yellow-300 bg-clip-text text-transparent mb-2 animate-fadeInUp">
                            SHATCO
                        </h3>
                        <p class="text-gray-300 text-lg animate-fadeInUp delay-150">
                            Renewable Energy Solutions
                        </p>
                    </div>
                </div>
            </div>

            {{-- 🔹 Right Content --}}
            <div x-show="ready" class="animate-fadeInRight">
                <span class="text-amber-400 uppercase tracking-widest font-medium">
                    About Us
                </span>

                <h2 class="text-4xl md:text-5xl font-bold mt-4 mb-6 text-gray-100 leading-tight animate-fadeInUp">
                    Your Strategic
                    <span class="bg-gradient-to-r from-amber-400 via-yellow-300 to-orange-400 bg-clip-text text-transparent">
                        Partner
                    </span>
                    in Excellence
                </h2>

                <p class="text-gray-300 mb-6 text-lg leading-relaxed animate-fadeInUp delay-100">
                    At <strong>SHATCO</strong>, we deliver top-tier Power, Solar, MEP, Low Current, and ICT solutions.
                    Innovation and precision drive every project to exceed your expectations.
                </p>

                <h3 class="text-xl font-bold text-amber-400 mt-8 mb-4 animate-fadeInUp delay-200">
                    Our Key Strengths
                </h3>

                <div class="space-y-6 mb-8">

                    {{-- 🌟 Expert Team --}}
                    <div class="flex gap-4 animate-fadeInUp delay-250">
                        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-amber-500/20 flex items-center justify-center shadow-md shadow-amber-900/20 transition-transform duration-500 hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-6 w-6 text-amber-400"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-100">Expert Team</h4>
                            <p class="text-gray-300">
                                Our professionals ensure a customer-centric approach with years of experience and dedication.
                            </p>
                        </div>
                    </div>

                    {{-- 🌟 Versatility --}}
                    <div class="flex gap-4 animate-fadeInUp delay-300">
                        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-amber-500/20 flex items-center justify-center shadow-md shadow-amber-900/20 transition-transform duration-500 hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-6 w-6 text-amber-400"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2H4V5z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-100">Versatility</h4>
                            <p class="text-gray-300">
                                A skilled and adaptive team that can handle complex projects with innovation and precision.
                            </p>
                        </div>
                    </div>

                    {{-- 🌟 Safety First --}}
                    <div class="flex gap-4 animate-fadeInUp delay-350">
                        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-amber-500/20 flex items-center justify-center shadow-md shadow-amber-900/20 transition-transform duration-500 hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-6 w-6 text-amber-400"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M9 12l2 2 4-4" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-100">Safety First</h4>
                            <p class="text-gray-300">
                                We follow strict OHS standards to ensure safe and successful project environments.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    {{-- ⛔ CSS UNCHANGED --}}
    <style>
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
            0%,100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.05); opacity: 0.7; }
        }
        .animate-pulse-slow { animation: pulse-slow 6s ease-in-out infinite; }
    </style>
</section>