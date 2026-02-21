<footer class="relative overflow-hidden pt-16 pb-8 bg-black text-gray-400">
    <!-- Decorative Lines and Glow -->
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-amber-400/50 to-transparent z-0"></div>
    <div class="absolute bottom-0 right-0 w-1/3 h-1/3 bg-amber-400/10 blur-[120px] rounded-full z-0"></div>

    <div class="container mx-auto px-6 relative z-10">
        <!-- Top Section -->
        <div data-aos="fade-up" data-aos-duration="800"
            class="flex flex-col md:flex-row justify-between items-start md:items-center gap-8">

            <a href="{{ url('/') }}"
                class="text-4xl font-extrabold bg-gradient-to-r from-amber-500 via-amber-300 to-yellow-500 text-transparent bg-clip-text tracking-widest mb-4">
                {{ $settings['site_name'] ?? "info@shatcoksa.com"}}
            </a>

            <!-- Social Links -->
            <div class="flex space-x-4">
                <a href="{{ $settings['linkedin'] }}" target="_blank" rel="noopener noreferrer"
                    class="w-10 h-10 rounded-sm bg-neutral-900 border border-amber-500/30 flex items-center justify-center text-amber-400 hover:bg-amber-400 hover:text-black transition duration-300 font-semibold"
                    aria-label="LinkedIn">
                    <i class="fa fa-linkedin"></i>
                </a>

                <a href="{{ $settings['twitter'] }}" target="_blank" rel="noopener noreferrer"
                    class="w-10 h-10 rounded-sm bg-neutral-900 border border-amber-500/30 flex items-center justify-center text-amber-400 hover:bg-amber-400 hover:text-black transition duration-300 font-semibold"
                    aria-label="Twitter">
                    <i class="fa fa-twitter"></i>
                </a>

                <a href="{{ $settings['instagram'] }}" target="_blank" rel="noopener noreferrer"
                    class="w-10 h-10 rounded-sm bg-neutral-900 border border-amber-500/30 flex items-center justify-center text-amber-400 hover:bg-amber-400 hover:text-black transition duration-300 font-semibold"
                    aria-label="Instagram">
                    <i class="fa fa-instagram"></i>
                </a>

                <a href="{{ $settings['facebook'] }}" target="_blank" rel="noopener noreferrer"
                    class="w-10 h-10 rounded-sm bg-neutral-900 border border-amber-500/30 flex items-center justify-center text-amber-400 hover:bg-amber-400 hover:text-black transition duration-300 font-semibold"
                    aria-label="Facebook">
                    <i class="fa fa-facebook"></i>
                </a>

                <a href="{{ $settings['whatsapp'] }}" target="_blank" rel="noopener noreferrer"
                    class="w-10 h-10 rounded-sm bg-neutral-900 border border-amber-500/30 flex items-center justify-center text-amber-400 hover:bg-amber-400 hover:text-black transition duration-300 font-semibold"
                    aria-label="WhatsApp">
                    <i class="fa fa-whatsapp"></i>
                </a>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="pt-8 mt-8 border-t border-amber-500/20 flex flex-col md:flex-row justify-between items-center">
            <p class="text-gray-500 text-sm mb-4 md:mb-0">
                &copy; {{ date('Y') }} {{ $settings['site_name'] ?? "SHATCO"}}. All rights reserved.
            </p>

            <div class="flex flex-wrap justify-center gap-x-8 gap-y-2 text-sm text-gray-500">
                <a href="{{ url('/terms') }}" class="hover:text-amber-400 transition duration-300">Terms of Service</a>
                <a href="{{ url('/privacy') }}" class="hover:text-amber-400 transition duration-300">Privacy Policy</a>
                <a href="{{ url('/cookies') }}" class="hover:text-amber-400 transition duration-300">Cookie Policy</a>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap JS (Deferred) -->
<script defer
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>

@push('scripts')
<!-- AOS Animation Library (Deferred) -->
<script defer src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        AOS.init({
            duration: 800,
            once: true
        });
    });
</script>
@endpush
