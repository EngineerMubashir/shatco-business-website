@extends('frontend.layouts.app')

@section('title', 'Services | SHATCOKSA')

@section('content')
<section id="products-services"
    x-data="{ activeCategory: 'All', ready: false }"
    x-init="requestAnimationFrame(() => ready = true)"
    x-cloak
    class="py-24 bg-gradient-to-br from-black via-[#1a0e00] to-[#2b0f00] text-gray-100"
    role="region"
    aria-label="Our Services"
    itemscope itemtype="https://schema.org/CollectionPage">

    {{-- ⛔ DO NOT TOUCH CSS (kept as-is) --}}
    <style>
        /* unchanged */
        :root { --amber-400:#fbbf24; --amber-500:#f59e0b; --glass:rgba(255,255,255,.03); --muted:rgba(229,231,235,.72);}
        [x-cloak]{display:none!important;}
        .card-lift{transition:transform .45s cubic-bezier(.2,.9,.3,1),box-shadow .45s ease;will-change:transform;}
        .card-lift:hover{transform:translateY(-10px) translateZ(0);box-shadow:0 20px 40px rgba(0,0,0,.6);}
        @keyframes popIn{from{opacity:0;transform:translateY(10px) scale(.995)}to{opacity:1;transform:translateY(0) scale(1)}}
        .pop-in{animation:popIn .6s cubic-bezier(.2,.9,.3,1) both;}
        @keyframes shimmer{0%{background-position:-150% 0}100%{background-position:150% 0}}
        .hero-gradient{background:linear-gradient(90deg,rgba(255,255,255,.06) 0%,rgba(255,255,255,.2) 50%,rgba(255,255,255,.06) 100%);background-size:200% 100%;-webkit-background-clip:text;background-clip:text;color:transparent;animation:shimmer 6s linear infinite;}
        .img-cover{aspect-ratio:16/10;width:100%;object-fit:cover;height:auto;display:block;}
        .focus-ring:focus{outline:none;box-shadow:0 0 0 4px rgba(245,158,11,.14);border-radius:8px;}
        @media (prefers-reduced-motion:reduce){.pop-in,.hero-gradient,.card-lift{animation:none!important;transition:none!important}}
        .scrollbar-hide::-webkit-scrollbar{display:none}
        .scrollbar-hide{-ms-overflow-style:none;scrollbar-width:none}
    </style>

    <div class="container mx-auto px-6">

        {{-- Header --}}
        <div class="text-center mb-16">
            <h2 class="text-5xl font-bold mb-4 text-amber-400 pop-in" itemprop="headline">
                Our Services
            </h2>
            <p class="text-gray-300 max-w-2xl mx-auto pop-in" itemprop="description">
                {{ $settings['services_intro'] ?? 'Explore our specialized solutions designed to meet your needs.' }}
            </p>
        </div>

        {{-- Category Buttons --}}
        <div class="flex flex-wrap justify-center gap-3 mb-10 overflow-x-auto py-2 scrollbar-hide"
             role="tablist"
             aria-label="Service categories">

            <button
                @click="activeCategory = 'All'"
                :aria-pressed="activeCategory === 'All'"
                class="px-4 py-2 rounded-sm transition-all duration-300 whitespace-nowrap focus-ring"
                role="tab">
                All
            </button>

            @foreach ($service_categories as $category)
            <button
                @click="activeCategory = '{{ $category->name }}'"
                :aria-pressed="activeCategory === '{{ $category->name }}'"
                class="px-4 py-2 rounded-sm transition-all duration-300 whitespace-nowrap focus-ring"
                role="tab">
                {{ $category->name }}
            </button>
            @endforeach
        </div>

        {{-- Services Grid --}}
        <div id="services-grid"
             class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8"
             itemprop="mainEntity"
             itemscope itemtype="https://schema.org/ItemList">

            @php $position = 1; @endphp

            @foreach($services as $service)
            <article
                x-show="ready && (activeCategory === 'All' || activeCategory === '{{ $service->category->name ?? '' }}')"
                x-transition:enter="transform transition duration-450"
                x-transition:enter-start="opacity-0 -translate-y-4 scale-98"
                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                x-memo="{{ $service->id }}"
                x-cloak
                class="bg-black border border-amber-400/10 rounded-lg overflow-hidden hover:border-amber-400/40 transition duration-300 card-lift"
                itemscope itemtype="https://schema.org/Service"
                itemprop="itemListElement"
                data-position="{{ $position }}"
                aria-label="{{ $service->title }}">

                <div class="w-full bg-gray-900">
                    <img
                        src="{{ asset($service->thumbnail) }}"
                        alt="{{ $service->title }}"
                        loading="lazy"
                        decoding="async"
                        class="img-cover transform transition-transform duration-700 ease-out will-change-transform"
                        itemprop="image">
                </div>

                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-amber-400 mb-3" itemprop="name">
                        {{ $service->title }}
                    </h3>

                    <p class="text-gray-300 mb-4 leading-relaxed" itemprop="description">
                        {{ Str::limit($service->description, 120) }}
                    </p>

                    <a href="{{ route('frontend.services.service-details', $service->slug) }}"
                       class="inline-flex items-center gap-3 bg-amber-400 text-black px-4 py-2 rounded focus-ring transition-transform transform-gpu hover:-translate-y-0.5"
                       itemprop="url">
                        Learn More
                    </a>
                </div>

                <meta itemprop="position" content="{{ $position }}">
            </article>
            @php $position++; @endphp
            @endforeach
        </div>

        @if($services->isEmpty())
        <p class="text-center text-gray-400 mt-10">
            No services available right now. Please check back later.
        </p>
        @endif

    </div>
</section>
@endsection
