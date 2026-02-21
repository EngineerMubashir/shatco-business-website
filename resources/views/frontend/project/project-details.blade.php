@extends('frontend.layouts.app')

<section class="min-h-screen py-20 px-6 bg-gradient-to-b from-black via-gray-900 to-black text-white">

    <div class="max-w-6xl mx-auto">

        {{-- 🔙 Back Button --}}
        <div class="mb-8 animate-fadeInUp">
            <a href="{{ url('/#projects') }}"
               class="inline-flex items-center gap-2 text-amber-400 hover:text-amber-300 transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Projects
            </a>
        </div>

        {{-- 🧠 Project Header --}}
        <h1 class="text-4xl md:text-5xl font-bold text-amber-400 mb-4 animate-fadeInUp">
            {{ $projectData['title'] ?? 'Untitled Project' }}
        </h1>

        <div class="flex flex-wrap items-center gap-4 text-gray-400 mb-8 animate-fadeInUp delay-100">
            <span class="bg-amber-400/10 text-amber-400 px-3 py-1 rounded-full text-sm">
                {{ $projectData['category'] ?? '—' }}
            </span>
            <span class="text-sm">📍 {{ $projectData['location'] ?? 'Location not available' }}</span>
            <span class="text-sm">🗓️ {{ $projectData['year'] ?? 'N/A' }}</span>
        </div>

        {{-- 🖼️ Project Image --}}
        @if(!empty($projectData['image']))
        <div class="rounded-xl overflow-hidden border border-amber-400/10 shadow-xl shadow-amber-900/20 mb-10 animate-fadeInUp delay-200">
            <img src="{{ $projectData['image'] }}" alt="{{ $projectData['title'] ?? 'Project image' }}"
                 class="w-full h-auto object-cover hover:scale-[1.03] transition-transform duration-700 ease-in-out transform shadow-lg shadow-amber-500/20">
        </div>
        @endif

        {{-- 📄 Project Description --}}
        <div class="text-gray-300 leading-relaxed text-lg mb-12 animate-fadeInUp delay-300">
            <p class="mb-4">{{ $projectData['fullDescription'] ?? $projectData['description'] ?? 'Description coming soon.' }}</p>

            {{-- Optional: Highlights --}}
            <ul class="list-disc list-inside text-gray-400 space-y-2 mt-4">
                <li>High-quality engineering and execution</li>
                <li>Strict adherence to safety and sustainability standards</li>
                <li>Delivered on time with exceptional precision</li>
            </ul>
        </div>

        {{-- 💬 Call To Action --}}
        <div class="text-center bg-gradient-to-b from-gray-900 to-black p-10 rounded-xl border border-amber-400/10 shadow-inner shadow-amber-900/20 animate-fadeInUp delay-400">
            <h2 class="text-2xl md:text-3xl font-bold mb-4 text-amber-400">Ready to Start Your Project?</h2>
            <p class="text-gray-400 mb-8 max-w-2xl mx-auto">
                Our expert team is here to turn your vision into reality. Reach out today for consultation and project assistance.
            </p>
            <a href="{{ url('/#contact') }}"
               class="inline-block bg-amber-400 hover:bg-amber-500 text-black font-semibold px-6 py-3 rounded transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-amber-500/40">
                Discuss Your Project
            </a>
        </div>

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
    </style>
</section>
