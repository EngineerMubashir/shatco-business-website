<header
    x-data="{ menuOpen:false, servicesOpen:false }"
    x-cloak
    class="fixed inset-x-0 top-0 z-50 bg-black/90 backdrop-blur-md border-b border-gray-700/60"
    role="banner"
    itemscope
    itemtype="http://schema.org/Organization"
>

    <div class="container mx-auto max-w-7xl px-4 sm:px-6 md:px-8 lg:px-12">
        <div class="flex items-center justify-between gap-3 py-3 md:py-4">

            <!-- Logo -->
            <a href="{{ route('home') }}"
               class="flex items-center gap-2 md:gap-3 text-xl md:text-2xl font-extrabold tracking-tight text-amber-400 hover:text-amber-300 transition-colors duration-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-400 rounded"
               itemprop="url">

                <img
                    src="{{ $settings['logo'] }}"
                    alt="Logo"
                    class="h-8 w-auto"
                    loading="eager"
                    decoding="async"
                >

                <span class="leading-tight truncate max-w-[160px] sm:max-w-none" itemprop="name">
                    {{ $settings['site_name'] ?? 'SHATCO' }}
                </span>
            </a>

            <!-- Desktop Nav -->
            <nav
                class="hidden md:flex items-center gap-6 lg:gap-8 text-gray-300"
                aria-label="Primary Navigation"
                role="navigation"
            >
                <a href="{{ route('home') }}" class="relative px-1 py-1 hover:text-amber-400 transition-colors duration-200">Home</a>
                <a href="{{ route('about') }}" class="px-1 py-1 hover:text-amber-400 transition-colors duration-200">About</a>
                <a href="{{ route('services') }}" class="px-1 py-1 hover:text-amber-400 transition-colors duration-200">Services</a>
                <a href="{{ route('projects') }}" class="px-1 py-1 hover:text-amber-400 transition-colors duration-200">Projects</a>
                <a href="{{ route('testimonials') }}" class="px-1 py-1 hover:text-amber-400 transition-colors duration-200">Testimonials</a>
                <a href="{{ route('faq') }}" class="px-1 py-1 hover:text-amber-400 transition-colors duration-200">Faqs</a>
                <a href="{{ route('contact.show') }}" class="px-1 py-1 hover:text-amber-400 transition-colors duration-200">Contact</a>
            </nav>

            <!-- Mobile Toggle -->
            <button
                type="button"
                @click="menuOpen = !menuOpen"
                :aria-expanded="menuOpen.toString()"
                aria-controls="mobile-menu"
                class="md:hidden inline-flex items-center justify-center rounded-md p-2 text-amber-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-400"
            >
                <span class="sr-only">Toggle menu</span>
                <span x-show="!menuOpen" class="text-2xl leading-none">&#9776;</span>
                <span x-show="menuOpen" class="text-2xl leading-none">&times;</span>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div
        id="mobile-menu"
        x-show="menuOpen"
        x-transition.opacity
        class="md:hidden bg-black/95 border-t border-gray-700/60 px-4 py-4 text-gray-300"
        @click.away="menuOpen = false"
    >
        <div class="flex flex-col gap-3 text-base">
            <a href="#hero" class="px-2 py-2 hover:text-amber-400">Home</a>
            <a href="{{ route('about') }}" class="px-2 py-2 hover:text-amber-400">About</a>

            <!-- Mobile Services -->
            <div x-data="{ open:false }">
                <button
                    @click="open = !open"
                    class="w-full flex justify-between px-2 py-2 hover:text-amber-400"
                >
                    <span>Services</span>
                    <svg class="h-4 w-4 transition-transform" :class="open ? 'rotate-180' : ''" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.23 7.21L10 11.94l4.77-4.73" clip-rule="evenodd" />
                    </svg>
                </button>

                <div x-show="open" x-transition class="pl-4 mt-2 space-y-1">
                    @foreach($services as $s)
                        <a href="{{ route('frontend.services.service-details', $s->slug) }}"
                           class="block px-2 py-1 hover:text-amber-400">
                            {{ $s->title }}
                        </a>
                    @endforeach
                </div>
            </div>

            <a href="{{ route('projects') }}" class="px-2 py-2 hover:text-amber-400">Projects</a>
            <a href="{{ route('faq') }}" class="px-2 py-2 hover:text-amber-400">Faqs</a>
            <a href="{{ route('contact.show') }}" class="px-2 py-2 hover:text-amber-400">Contact</a>
        </div>
    </div>

    <style>
        [x-cloak] { display: none !important; }

        @media (prefers-reduced-motion: reduce) {
            * {
                transition-duration: 0.001ms !important;
                animation-duration: 0.001ms !important;
            }
        }
    </style>

</header>
