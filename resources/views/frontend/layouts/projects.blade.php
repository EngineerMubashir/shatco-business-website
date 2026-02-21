@extends('frontend.layouts.app')

@section('title', 'Projects | SHATCOKSA')

@section('content')
<section id="projects"
    x-data="{ activeCategory: 'All', ready: false }"
    x-init="requestAnimationFrame(() => ready = true)"
    x-cloak
    class="py-24 relative overflow-hidden bg-gradient-to-b from-black via-gray-900 to-black text-white"
    role="region"
    aria-label="Projects"
    itemscope itemtype="https://schema.org/CollectionPage">

    {{-- 🔆 Background Glow --}}
    <div class="absolute top-1/3 right-1/4 w-64 h-64 bg-amber-500/10 blur-[120px] rounded-full pointer-events-none -z-10" aria-hidden="true"></div>

    <div class="container mx-auto px-6 relative z-10">

        {{-- Header --}}
        <div class="text-center mb-16">
            <span class="text-amber-400 uppercase tracking-widest font-medium block animate-fadeInUp d-100">Our Work</span>

            <h2 class="text-4xl md:text-5xl font-extrabold mt-4 mb-6 animate-fadeInUp d-200">
                Featured
                <span class="bg-gradient-to-r from-amber-400 to-yellow-300 bg-clip-text text-transparent">
                    Projects
                </span>
            </h2>

            <p class="text-gray-300 max-w-3xl mx-auto mb-10 animate-fadeInUp d-300">
                Explore some of our recent projects that highlight our expertise in Power, Renewable Energy, MEP,
                Low Current, and ICT solutions.
            </p>

            {{-- Category Buttons --}}
            @php
                $categories = ['All', 'Power Solutions', 'Low Current Solutions', 'ICT Solutions', 'IoT Solutions', 'MEP Services', 'Solar Solutions'];
            @endphp

            <div class="flex flex-wrap justify-center gap-3 mb-10 overflow-x-auto py-2 animate-fadeInUp d-400"
                 role="tablist"
                 aria-label="Project categories">

                @foreach ($categories as $category)
                <button
                    @click="activeCategory = '{{ $category }}'"
                    :aria-pressed="activeCategory === '{{ $category }}'"
                    :class="activeCategory === '{{ $category }}'
                        ? 'bg-amber-400 text-black shadow-lg shadow-amber-900/40 scale-105'
                        : 'bg-gray-800 text-white hover:bg-amber-400/20 border border-amber-400/20'"
                    class="px-4 py-2 rounded-md transition-all duration-300 whitespace-nowrap focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-400"
                    role="tab"
                    tabindex="0">
                    {{ $category }}
                </button>
                @endforeach
            </div>
        </div>

        {{-- Projects Grid --}}
        @php
            $projects = [
                ['id'=>1,'title'=>'MEP project with main contractor at NHC villa project','category'=>'MEP Services','location'=>'Near Riyadh Airport (Murcia)','description'=>'Comprehensive MEP services for luxury villas, including HVAC, electrical, and plumbing systems integration.','image'=>'assests/images/projects/mep.webp','year'=>'2022'],
                ['id'=>2,'title'=>'Low current project for SEC','category'=>'Low Current Solutions','location'=>'Saudi Electric Company, Abha','description'=>'Implementation of advanced low current systems for improved security and communication infrastructure.','image'=>'assests/images/projects/low-current.webp','year'=>'2021'],
                ['id'=>3,'title'=>'RMU swap project for SEC','category'=>'Power Solutions','location'=>'Saudi Electric Company, Riyadh','description'=>'Ring Main Unit replacement and upgrade for enhanced power distribution reliability.','image'=>'assests/images/projects/power.webp','year'=>'2023'],
                ['id'=>4,'title'=>'Solar Power Installation','category'=>'Solar Solutions','location'=>'Residential Complex, Jeddah','description'=>'Installation of solar power systems for a residential complex, reducing energy costs and carbon footprint.','image'=>'assests/images/projects/solar.webp','year'=>'2022'],
                ['id'=>5,'title'=>'ICT Infrastructure Upgrade','category'=>'ICT Solutions','location'=>'Corporate Office, Dammam','description'=>'Complete overhaul of ICT infrastructure for improved connectivity, security, and performance.','image'=>'assests/images/projects/ict.webp','year'=>'2021'],
                ['id'=>6,'title'=>'IoT Smart Building Implementation','category'=>'IoT Solutions','location'=>'Commercial Center, Riyadh','description'=>'Integration of IoT solutions for building management, energy efficiency, and enhanced security systems.','image'=>'assests/images/projects/iot.webp','year'=>'2023'],
            ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"
             itemprop="mainEntity"
             itemscope itemtype="https://schema.org/ItemList"
             aria-live="polite">

            @php $position = 1; @endphp
            @foreach ($projects as $project)
            <article
                x-show="ready && (activeCategory === 'All' || activeCategory === '{{ $project['category'] }}')"
                x-transition:enter="transform transition duration-500"
                x-transition:enter-start="opacity-0 -translate-y-6 scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                x-memo="{{ $project['id'] }}"
                x-cloak
                class="group relative overflow-hidden rounded-3xl bg-gray-800 cursor-pointer hover:-translate-y-1 transform will-change-transform transition-all duration-500 shadow-xl shadow-black/40 hover:shadow-amber-500/30"
                itemscope itemtype="https://schema.org/CreativeWork"
                itemprop="itemListElement"
                data-position="{{ $position }}"
                aria-label="{{ $project['title'] }}">

                {{-- Project Image --}}
                <div class="relative aspect-[4/3] overflow-hidden bg-gray-900">
                    <img
                        src="{{ asset($project['image']) }}"
                        alt="{{ $project['title'] }}"
                        loading="lazy"
                        decoding="async"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out will-change-transform"
                        itemprop="image">

                    {{-- Category Badge --}}
                    <div class="absolute top-4 right-4 bg-amber-400/90 text-black text-xs font-medium py-1 px-3 rounded-md">
                        {{ $project['category'] }}
                    </div>

                    {{-- Hover Overlay --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/70 to-transparent opacity-8 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-6 pointer-events-none group-hover:pointer-events-auto">
                        <div class="w-full">
                            <h3 class="text-xl font-serif font-bold text-white mb-1" itemprop="headline">
                                {{ $project['title'] }}
                            </h3>
                            <div class="text-amber-400 text-sm mb-2" itemprop="location">
                                {{ $project['location'] }}
                            </div>
                            <p class="text-sm text-gray-300 mb-3" itemprop="description">
                                {{ $project['description'] }}
                            </p>
                            <a href="{{ route('project.details', $project['id']) }}"
                               class="inline-flex items-center text-amber-400 text-sm font-medium focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-400"
                               itemprop="url">
                                View Project
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Structured data --}}
                <meta itemprop="position" content="{{ $position }}">
                <meta itemprop="datePublished" content="{{ $project['year'] }}">
            </article>
            @php $position++; @endphp
            @endforeach
        </div>
    </div>

    {{-- ⛔ CSS LEFT UNCHANGED --}}
    <style>
        [x-cloak]{display:none !important;}
        :root { --amber-400:#fbbf24; --amber-500:#f59e0b; }
        @keyframes fadeInUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
        .animate-fadeInUp{animation:fadeInUp .8s cubic-bezier(.2,.9,.3,1) both;}
        .d-100{animation-delay:.08s}.d-200{animation-delay:.16s}.d-300{animation-delay:.24s}.d-400{animation-delay:.32s}
        img[loading="lazy"]{background:linear-gradient(90deg,rgba(255,255,255,.02),rgba(255,255,255,.01));}
        @media (prefers-reduced-motion: reduce){.animate-fadeInUp,[x-transition]{animation:none!important;transition:none!important;}}
    </style>
</section>
@endsection
