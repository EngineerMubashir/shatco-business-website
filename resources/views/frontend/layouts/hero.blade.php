@extends('frontend.layouts.app')

@section('title', 'Hero | SHATCOKSA')

@section('meta_description', 'shatcoksa')

@section('meta_keywords', 'shatcoksa')

@section('content')
<section id="hero" 
         class="relative min-h-screen flex items-center pt-24 pb-16 overflow-hidden bg-gradient-to-b from-black via-gray-900 to-black text-white"
         aria-label="Hero Section"
         role="region"
         itemscope itemtype="https://schema.org/WebPage">

    {{-- Critical inline style block: small, optimized, theme vars, motion-safe, reduced-motion --}}
    <style>
        :root{
            --amber-500: #f59e0b;
            --amber-400: #fbbf24;
            --amber-300: #fcd34d;
            --text-dim: rgba(229,231,235,0.8);
            --glass: rgba(255,255,255,0.04);
        }

        [x-cloak]{display:none !important;} /* prevent flicker with Alpine */

        /* subtle, GPU-friendly shimmer used only for highlighted words */
        @keyframes hero-shimmer { 0%{ background-position: -200% 0 } 100%{ background-position: 200% 0 } }
        .hero-shimmer {
            background: linear-gradient(90deg, rgba(255,255,255,0.14) 0%, rgba(255,255,255,0.6) 50%, rgba(255,255,255,0.14) 100%);
            background-size: 200% 100%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: hero-shimmer 4s linear infinite;
            will-change: background-position;
        }

        /* gradient move */
        @keyframes gradientMove {
            0%{ background-position: 0% 50% }
            50%{ background-position: 100% 50% }
            100%{ background-position: 0% 50% }
        }
        .gradient-move { background-size: 200% 200%; animation: gradientMove 9s ease-in-out infinite; will-change: background-position; }

        /* fade up animation used with delays via utility classes below */
        @keyframes fadeInUp { from{ opacity:0; transform: translateY(22px) } to{ opacity:1; transform: translateY(0) } }
        .fade-in-up { animation: fadeInUp 700ms cubic-bezier(.2,.9,.3,1) forwards; opacity:0; }

        /* small helper delay classes */
        .d-100{ animation-delay: 0.1s } .d-200{ animation-delay: 0.2s } .d-300{ animation-delay: 0.3s } .d-400{ animation-delay: 0.4s } .d-500{ animation-delay: 0.5s } .d-700{ animation-delay: 0.7s }

        /* scroll indicator animation */
        @keyframes scrollIndicator { 0%{ transform: translateY(0) } 50%{ transform: translateY(18px) } 100%{ transform: translateY(0) } }
        .scroll-ind { animation: scrollIndicator 1.6s ease-in-out infinite; }

        /* visual performance and prefers-reduced-motion */
        @media (prefers-reduced-motion: reduce){
            .hero-shimmer, .gradient-move, .fade-in-up, .scroll-ind { animation: none !important; transition: none !important; }
        }

        /* mobile-friendly rounded frame sizes (kept small CPU) */
        .hero-frame { border-radius: 28px; box-shadow: 0 10px 30px rgba(0,0,0,0.6); overflow: hidden; }

        /* subtle grid overlay (low opacity and uses transforms) */
        .grid-overlay {
            background-image:
                linear-gradient(to right, rgba(255,255,255,0.03) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255,255,255,0.03) 1px, transparent 1px);
            background-size: 60px 60px;
            opacity: 0.08;
            will-change: transform;
            pointer-events: none;
        }

        /* small accessibility focus helper for CTA links */
        .focus-ring:focus { outline: none; box-shadow: 0 0 0 3px rgba(245,158,11,0.16), 0 1px 2px rgba(0,0,0,0.6); border-radius: 12px; }
    </style>

    {{-- Background Glows (kept exact look but responsive & optimized) --}}
    <div class="absolute inset-0 z-0 pointer-events-none" aria-hidden="true">
        <div class="absolute -left-10 top-1/4 w-56 h-56 md:w-72 md:h-72 rounded-full blur-3xl bg-[color:var(--amber-400)]/20 transform-gpu" style="filter: blur(72px);"></div>
        <div class="absolute -right-10 bottom-1/4 w-72 h-72 md:w-96 md:h-96 rounded-full blur-[120px] bg-[color:var(--amber-300)]/10 transform-gpu" style="filter: blur(110px);"></div>
        <div class="absolute inset-0 grid-overlay"></div>
    </div>

    {{-- Main content container (keeps same grid and content) --}}
    <div class="container mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            {{-- LEFT CONTENT --}}
            <div class="space-y-6">
                <span class="uppercase tracking-widest font-medium block text-amber-400 animate-[fadeInUp_700ms_ease_1_forwards] opacity-0 d-100">
                    Welcome to SHATCO
                </span>

                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-6xl font-extrabold leading-tight animate-[fadeInUp_700ms_ease_1_forwards] opacity-0 d-200">
                    Your <span class="bg-clip-text text-transparent bg-gradient-to-r from-[color:var(--amber-400)] via-[color:var(--amber-300)] to-[color:var(--amber-500)] hero-shimmer">
                        Strategic Partner
                    </span> in Excellence
                </h1>

                <p class="text-base md:text-lg text-[color:var(--text-dim)] leading-relaxed max-w-xl animate-[fadeInUp_700ms_ease_1_forwards] opacity-0 d-300">
                    At SHATCO, we are passionate about delivering top-tier solutions in Power, Renewable Energy (Solar), 
                    MEP, Low Current, and ICT. Our commitment to innovation ensures that we exceed expectations through 
                    cutting-edge technology and superior service.
                </p>

                <div class="flex flex-wrap gap-4 animate-[fadeInUp_700ms_ease_1_forwards] opacity-0 d-400">
                    <a href="#products-services" 
                       class="inline-flex items-center gap-3 px-6 py-3 bg-[color:var(--amber-500)] hover:bg-[color:var(--amber-500)]/95 text-black font-semibold rounded-lg transition-transform transform-gpu hover:-translate-y-0.5 focus-ring focus:outline-none"
                       role="button" aria-label="Explore Services">
                        Explore Services
                    </a>

                    <a href="#about" 
                       class="inline-flex items-center gap-3 px-6 py-3 border border-[color:var(--amber-400)] text-[color:var(--amber-400)] hover:bg-[color:var(--amber-500)]/8 rounded-lg transition-colors focus-ring focus:outline-none"
                       role="button" aria-label="Learn More About SHATCO">
                        Learn More
                    </a>
                </div>
            </div>

            {{-- RIGHT SHATCO FRAME --}}
            <div class="relative flex justify-center items-center animate-[fadeInUp_700ms_ease_1_forwards] opacity-0 d-500">
                <div class="relative w-full max-w-lg aspect-square hero-frame flex flex-col items-center justify-center bg-black/40">

                    {{-- Animated Gradient Background (GPU-friendly) --}}
                    <div class="absolute inset-0 gradient-move" style="background: linear-gradient(135deg, rgba(245,158,11,0.14), rgba(252,211,77,0.06), rgba(245,158,11,0.09)); mix-blend-mode: screen;"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-black/40"></div>

                    {{-- Text inside frame (kept content identical) --}}
                    <div class="relative z-10 text-center flex flex-col items-center justify-center px-6">
                        <div class="text-5xl sm:text-6xl md:text-7xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-[color:var(--amber-400)] to-[color:var(--amber-300)] drop-shadow-xl">
                            SHATCO
                        </div>
                        <div class="text-lg md:text-xl font-serif text-[color:rgba(229,231,235,0.9)] mt-2 hero-shimmer">
                            مؤسسة شموخ التقدم للمقاولات
                        </div>
                    </div>

                    {{-- Decorative Corners (kept visual motif) --}}
                    <svg aria-hidden="true" class="absolute -top-4 -left-4 w-20 h-20" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" focusable="false">
                        <path d="M0 40 C20 10, 60 0, 100 0" stroke="rgba(251,191,36,0.5)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    <svg aria-hidden="true" class="absolute -bottom-4 -right-4 w-20 h-20 rotate-180" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" focusable="false">
                        <path d="M0 40 C20 10, 60 0, 100 0" stroke="rgba(251,191,36,0.5)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                </div>
            </div>
        </div>
    </div>

    {{-- Scroll Indicator --}}
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex flex-col items-center pointer-events-none" aria-hidden="true">
        <span class="text-[color:var(--amber-400)] text-sm mb-2 fade-in-up d-700">Scroll Down</span>
        <div class="w-0.5 h-10 bg-[color:var(--amber-400)]/50 overflow-hidden relative rounded">
            <div class="absolute inset-0 bg-[color:var(--amber-400)] scroll-ind" style="height:30%; width:100%;"></div>
        </div>
    </div>
</section>
@endsection
