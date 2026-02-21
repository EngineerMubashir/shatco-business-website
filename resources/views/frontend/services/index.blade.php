@extends('frontend.layouts.app')

@section('content')
<section class="min-h-screen pt-24 pb-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-black via-gray-900 to-black text-white">
    <div class="max-w-7xl mx-auto text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 text-amber-400">Our Services</h1>
        <p class="text-xl mb-16 text-gray-300 max-w-3xl mx-auto">
            Explore our comprehensive range of premium services designed to meet your specific needs with excellence and innovation.
        </p>

        @php
            $services = [
                [
                    'id' => 'power-solutions',
                    'name' => 'Power Solutions & Services',
                    'description' => 'We specialize in delivering innovative power solutions tailored to residential and commercial needs.',
                    'image' => 'frontend/images/services/power.webp',
                ],
                [
                    'id' => 'low-current',
                    'name' => 'Low Current Solutions & Services',
                    'description' => 'Comprehensive low current integrations including CCTV, access control, and automation systems.',
                    'image' => 'frontend/images/services/lowcurrent.webp',
                ],
                [
                    'id' => 'ict-solutions',
                    'name' => 'ICT Solutions & Services',
                    'description' => 'Design and implementation of resilient ICT infrastructures — networks, data centers, and cloud services.',
                    'image' => 'frontend/images/services/ict.webp',
                ],
                [
                    'id' => 'iot-solutions',
                    'name' => 'IoT Solutions & Services',
                    'description' => 'Smart IoT solutions for buildings and industry — automation and analytics for efficiency.',
                    'image' => 'frontend/images/services/iot.webp',
                ],
                [
                    'id' => 'mep-services',
                    'name' => 'MEP Services',
                    'description' => 'Full MEP design and execution — HVAC, electrical, plumbing, and coordination for efficient systems.',
                    'image' => 'frontend/images/services/mep.webp',
                ],
                [
                    'id' => 'solar-solutions',
                    'name' => 'Solar Solutions',
                    'description' => 'End-to-end solar solutions: design, installation, and maintenance for energy independence.',
                    'image' => 'frontend/images/services/solar.webp',
                ],
            ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($services as $service)
                <div class="bg-black rounded-lg overflow-hidden border border-amber-400/20 hover:border-amber-400/40 transition-all duration-300 shadow-lg hover:shadow-amber-400/20 transform hover:-translate-y-1">
                    <div class="relative h-56">
                        <img src="{{ asset($service['image']) }}" alt="{{ $service['name'] }}" class="object-cover w-full h-full">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end">
                            <h3 class="text-2xl font-bold p-4 text-amber-400">{{ $service['name'] }}</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-300 mb-6">{{ $service['description'] }}</p>
                        <a href="{{ url('services/' . $service['id']) }}" class="bg-amber-400 text-black font-semibold px-4 py-2 rounded hover:bg-amber-500 transition">
                            Learn More
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
