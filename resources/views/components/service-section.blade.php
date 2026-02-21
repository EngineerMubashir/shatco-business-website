<div x-show="activeCategory === '{{ $id }}'" x-transition class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
    {{-- Left: Text --}}
    <div>
        <h3 class="text-2xl font-serif font-bold text-white mb-4">{{ $title }}</h3>
        <p class="text-gray-300 mb-8">{{ $description }}</p>

        <div class="space-y-5">
            @foreach ($services as $s)
                <div class="bg-black border border-amber-400/20 p-4 rounded-md hover:border-amber-400/40 transition-all duration-300">
                    <h4 class="text-lg font-medium text-amber-400 mb-1">{{ $s['title'] }}</h4>
                    <p class="text-gray-400 text-sm">{{ $s['desc'] }}</p>
                </div>
            @endforeach
        </div>

        <div class="mt-8 flex gap-4">
            <a href="/services/{{ $id }}" class="btn-primary">Learn More</a>
            <a href="#contact" class="btn-outline">Request Info</a>
        </div>
    </div>

    {{-- Right: Image --}}
    <div class="relative bg-gradient-to-tr from-amber-900/40 via-amber-800/20 to-transparent rounded-3xl border border-amber-500/30 p-4 shadow-lg shadow-amber-900/30 overflow-hidden">
        <img src="{{ asset($image) }}" alt="{{ $imageAlt }}"
             class="w-full h-[450px] object-cover rounded-2xl hover:scale-105 transition-transform duration-700">
        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4">
            <h4 class="text-2xl font-serif bg-gradient-to-r from-amber-400 to-yellow-300 bg-clip-text text-transparent font-bold">
                {{ $imageAlt }}
            </h4>
        </div>
    </div>
</div>
