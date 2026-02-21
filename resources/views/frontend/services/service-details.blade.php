@extends('frontend.layouts.app')

<section class="min-h-screen py-20 px-6 bg-gradient-to-b from-black via-gray-900 to-black text-white">

    <div class="max-w-6xl mx-auto">

        {{-- 🔙 Back Button --}}
        <div class="mb-8 animate-fadeInUp">
            <a href="{{ url('/#services') }}"
                class="inline-flex items-center gap-2 text-amber-400 hover:text-amber-300 transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Services
            </a>
        </div>

        {{-- 🧠 Service Header --}}
        <h1 class="text-4xl md:text-5xl font-bold text-amber-400 mb-4 animate-fadeInUp">
            {{ $service->title ?? 'Untitled Service' }}
        </h1>

        <div class="flex flex-wrap items-center gap-4 text-gray-400 mb-8 animate-fadeInUp delay-100">
            @if(isset($service->category))
            <span class="bg-amber-400/10 text-amber-400 px-3 py-1 rounded-full text-sm">
                {{ $service->category->name ?? 'General' }}
            </span>
            @endif

            <span class="text-sm">📅 Updated: {{ $service->updated_at->format('M Y') }}</span>
        </div>

        {{-- 🖼️ Service Image --}}
        @if($service->thumbnail)
        <div class="rounded-xl overflow-hidden border border-amber-400/10 shadow-xl shadow-amber-900/20 mb-10 animate-fadeInUp delay-200">
            <img src="{{ asset($service->thumbnail) }}" alt="{{ $service->title }}"
                class="w-full h-auto object-cover hover:scale-[1.03] transition-transform duration-700 ease-in-out transform shadow-lg">
        </div>
        @endif

        {{-- 📄 Service Description --}}
        <div class="text-gray-300 leading-relaxed text-lg mb-12 animate-fadeInUp delay-300">
            <p class="mb-4">
                {{ $service->description ?? 'Description coming soon.' }}
            </p>

            @if(!empty($service->details))
            <div class="mt-6 bg-gray-900/40 border border-amber-400/10 rounded-lg p-6 shadow-inner shadow-amber-900/20 animate-fadeInUp delay-400">
                <h3 class="text-xl font-semibold text-amber-400 mb-3">Service Details</h3>
                <div class="text-gray-300 space-y-2">
                    {!! nl2br(e($service->details)) !!}
                </div>
            </div>
            @endif
        </div>

        {{-- 💬 Call To Action --}}
        <div class="text-center bg-gradient-to-b from-gray-900 to-black p-10 rounded-xl border border-amber-400/10 shadow-inner shadow-amber-900/20 animate-fadeInUp delay-500">
            <h2 class="text-2xl md:text-3xl font-bold mb-4 text-amber-400">Interested in This Service?</h2>
            <p class="text-gray-400 mb-8 max-w-2xl mx-auto">
                Contact us to learn how we can deliver innovative and cost-effective solutions tailored to your project needs.
            </p>
            <a href="{{ url('/#contact') }}"
                class="inline-block bg-amber-400 hover:bg-amber-500 text-black font-semibold px-6 py-3 rounded transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-amber-500/40">
                Request a Consultation
            </a>
        </div>

        {{-- 🧩 Related Services --}}
        @if(isset($related_services) && $related_services->count())
        <div class="mt-20 animate-fadeInUp delay-600">
            <h2 class="text-3xl font-bold text-amber-400 mb-10 text-center">Related Services</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($related_services as $related)
                <div class="group bg-gray-900 border border-amber-400/10 rounded-lg overflow-hidden transform transition-all duration-500 hover:-translate-y-2 hover:shadow-lg hover:shadow-amber-500/20">
                    @if($related->media && $related->media->first())
                    <img src="{{ asset($related->media->first()->file_path) }}" alt="{{ $related->title }}"
                        class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-700 ease-out">
                    @endif
                    <div class="p-5">
                        <h3 class="text-lg font-semibold text-amber-400 mb-2">{{ $related->title }}</h3>
                        <p class="text-gray-400 text-sm mb-3 line-clamp-3">{{ $related->description }}</p>
                        <a href="#"
                            class="text-amber-400 text-sm flex items-center gap-1 hover:text-amber-300 transition-colors duration-300">
                            View Details
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>

    {{-- Custom Animations --}}
    <style>
        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeInUp { animation: fadeInUp 0.8s ease-out both; }
        .animate-fadeInUp.delay-100 { animation-delay: 0.1s; }
        .animate-fadeInUp.delay-200 { animation-delay: 0.2s; }
        .animate-fadeInUp.delay-300 { animation-delay: 0.3s; }
        .animate-fadeInUp.delay-400 { animation-delay: 0.4s; }
        .animate-fadeInUp.delay-500 { animation-delay: 0.5s; }
        .animate-fadeInUp.delay-600 { animation-delay: 0.6s; }
    </style>
</section>
