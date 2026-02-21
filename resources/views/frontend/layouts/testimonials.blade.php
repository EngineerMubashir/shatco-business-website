@extends('frontend.layouts.app')

@section('title', 'Testimonial | SHATCOKSA')

@section('meta_description', 'shatcoksa')

@section('meta_keywords', 'shatcoksa')

@section('content')
<section id="testimonials"
    class="py-24 bg-gradient-to-br from-black via-[#1a0e00] to-[#2b0f00] text-gray-100"
    role="region"
    aria-label="Client testimonials"
    itemscope
    itemtype="https://schema.org/CollectionPage">

    <div class="container mx-auto px-6">

        <!-- Section Title -->
        <header class="text-center mb-16">
            <h2 class="text-5xl font-bold mb-4 text-amber-400">
                What Our Clients Say
            </h2>
            <p class="text-gray-300 max-w-2xl mx-auto">
                {{ $settings['testimonials_intro'] ?? "Hear from our satisfied clients who trust our expertise and professionalism." }}
            </p>
        </header>

        <!-- Testimonials Grid -->
        <div
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"
            id="testimonials-grid"
            aria-live="polite">

            @forelse($testimonials as $testimonial)
            <article
                class="testimonial-card bg-black border border-amber-400/20 rounded-lg p-6 shadow-lg transform transition-all duration-400 will-change-transform"
                itemscope
                itemtype="https://schema.org/Review"
                itemprop="review"
                aria-label="Testimonial by {{ $testimonial->name }}">

                <!-- Author -->
                <div class="flex items-center gap-4 mb-4">
                    @if(!empty($testimonial->image))
                        <div class="w-14 h-14 rounded-full overflow-hidden flex-shrink-0 bg-gray-900">
                            <img
                                src="{{ asset($testimonial->image) }}"
                                alt="{{ $testimonial->name }}"
                                loading="lazy"
                                decoding="async"
                                class="w-full h-full object-cover">
                        </div>
                    @else
                        <div class="w-14 h-14 rounded-full bg-amber-400/10 border border-amber-400/30 flex items-center justify-center text-amber-400 font-bold text-lg">
                            {{ strtoupper(substr($testimonial->name, 0, 1)) }}
                        </div>
                    @endif

                    <div>
                        <h3 class="text-lg font-semibold text-amber-400" itemprop="author">
                            {{ $testimonial->name }}
                        </h3>

                        @if(!empty($testimonial->designation))
                            <p class="text-gray-400 text-sm">
                                {{ $testimonial->designation }}
                            </p>
                        @endif
                    </div>
                </div>

                <!-- Message -->
                <p class="text-gray-300 italic mb-4" itemprop="reviewBody">
                    “{{ Str::limit($testimonial->message, 180) }}”
                </p>

                <!-- Rating -->
                @if(!empty($testimonial->rating))
                <div class="flex space-x-1" aria-label="Rating: {{ $testimonial->rating }} out of 5">
                    @for($i = 1; $i <= 5; $i++)
                        <svg
                            class="h-4 w-4 {{ $i <= $testimonial->rating ? 'text-amber-400' : 'text-gray-600' }}"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            aria-hidden="true">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.287a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.287c.3.921-.755 1.688-1.539 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.783.57-1.838-.197-1.539-1.118l1.07-3.287a1 1 0 00-.364-1.118L2.98 8.714c-.783-.57-.38-1.81.588-1.81h3.462a1 1 0 00.95-.69l1.07-3.287z"/>
                        </svg>
                    @endfor
                </div>
                @endif

            </article>
            @empty
                <p class="text-center text-gray-400 mt-10 col-span-full">
                    No testimonials available right now. Please check back later.
                </p>
            @endforelse

        </div>
    </div>
</section>
@endsection
