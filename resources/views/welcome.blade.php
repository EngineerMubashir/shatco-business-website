@extends('frontend.layouts.app')

@section('content')
<!-- Hero Section -->
<section class="bg-black text-white min-h-screen flex items-center justify-center relative overflow-hidden">
  <div class="absolute inset-0">
    <img src="{{ asset('assets/hero-bg.jpg') }}" alt="Background" class="w-full h-full object-cover opacity-30">
  </div>
  <div class="relative text-center z-10 px-6">
    <h1 class="text-5xl md:text-6xl font-serif mb-4 text-orange">Powering the Future with Innovation</h1>
    <p class="text-gray-light text-lg md:text-xl mb-8">
      Delivering excellence in Power, Solar Energy, Construction, and ICT Solutions.
    </p>
    <a href="#services" class="bg-orange hover:bg-orange-dark text-white px-8 py-3 rounded-lg transition duration-300">
      Explore Our Services
    </a>
  </div>
</section>

<!-- About Section -->
<section id="about" class="py-20 bg-gray-light text-center">
  <div class="max-w-5xl mx-auto px-6">
    <h2 class="text-4xl font-serif mb-6 text-orange">About Us</h2>
    <p class="text-gray-dark text-lg leading-relaxed">
      We are a leading services company with a proven track record in <strong>power</strong>, 
      <strong>renewable energy (solar)</strong>, <strong>construction</strong>, and <strong>ICT</strong>. 
      Our mission is to drive innovation and reliability through cutting-edge solutions.
    </p>
  </div>
</section>

<!-- Services Section -->
<section id="services" class="py-20 bg-black text-white">
  <div class="max-w-6xl mx-auto text-center px-6">
    <h2 class="text-4xl font-serif mb-12 text-orange">Our Services</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
      @foreach($services as $service)
        <div class="bg-gray-dark rounded-xl p-6 hover:scale-105 transform transition duration-300">
          <img src="{{ asset($service->thumbnail) }}" alt="{{ $service->title }}" class="h-40 w-full object-cover rounded-lg mb-4">
          <h3 class="text-xl font-semibold text-orange mb-2">{{ $service->title }}</h3>
          <p class="text-gray-light text-sm">{{ Str::limit($service->short_description, 100) }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Contact CTA -->
<section class="py-20 bg-orange text-center text-white">
  <h2 class="text-3xl md:text-4xl font-serif mb-4">Let’s Work Together</h2>
  <p class="mb-8 text-lg">Contact us today for tailored energy, construction, or ICT solutions.</p>
  <a href="{{ route('contact') }}" class="bg-black hover:bg-gray-dark text-white px-8 py-3 rounded-lg transition duration-300">
    Get in Touch
  </a>
</section>
@endsection
