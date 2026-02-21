<section id="faqs"
    class="py-24 bg-gradient-to-br from-black via-[#1a0e00] to-[#2b0f00] text-gray-100"
    role="region"
    aria-label="Frequently Asked Questions">

    <div class="container mx-auto px-6">

        {{-- Section Header --}}
        <header class="text-center mb-16 animate-fadeInUp">
            <h2 class="text-5xl font-bold mb-4 text-amber-400">
                Frequently Asked Questions
            </h2>
            <p class="text-gray-300 max-w-2xl mx-auto text-lg leading-relaxed">
                {{ $settings['faqs_intro'] ?? 'Find answers to the most common questions about our services and solutions.' }}
            </p>
        </header>

        {{-- FAQ Accordion --}}
        <div class="max-w-4xl mx-auto space-y-4" role="list">
            @forelse($faqs as $index => $faq)
                <div
                    x-data="{ open: false }"
                    x-cloak
                    class="border border-amber-400/20 rounded-lg overflow-hidden bg-black hover:border-amber-400/40 transition duration-500 shadow-lg hover:shadow-amber-400/20"
                    role="listitem">

                    <button
                        type="button"
                        @click="open = !open"
                        :aria-expanded="open.toString()"
                        aria-controls="faq-answer-{{ $index }}"
                        class="w-full flex justify-between items-center px-6 py-4 text-left focus:outline-none hover:bg-amber-500/5 transition-all duration-300">

                        <h3 class="text-lg md:text-xl font-semibold text-amber-400">
                            {{ $faq->question }}
                        </h3>

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6 text-amber-400 transform transition-transform duration-300"
                            :class="open ? 'rotate-180' : ''"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div
                        id="faq-answer-{{ $index }}"
                        x-show="open"
                        x-collapse
                        class="px-6 pb-4 text-gray-300 text-base md:text-lg leading-relaxed">
                        <p>{{ $faq->answer }}</p>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-400 mt-8 text-lg">
                    No FAQs available right now. Please check back later.
                </p>
            @endforelse
        </div>
    </div>

    {{-- Animations --}}
    <style>
        [x-cloak] { display: none !important; }

        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out both;
        }
    </style>
</section>

