@extends('layouts.app')

@section('title', 'Home | Shabakkat KSA')
@section('meta_description', 'Leading Telecom, Power, and IT Solutions provider in Saudi Arabia.')

@section('content')

<!-- Hero Section -->
<section class="hero d-flex align-items-center justify-content-center text-center"
         style="background: url('{{ asset('images/hero-bg.jpg') }}') center/cover no-repeat; height: 90vh;">
  <div class="overlay position-absolute w-100 h-100" style="background-color: rgba(0,0,0,0.5);"></div>
  <div class="container position-relative text-white">
    <h1 class="display-4 fw-bold mb-3">Empowering Innovation Through Technology</h1>
    <p class="lead mb-4">Shabakkat KSA is a trusted provider of Telecom, Power & IT services.</p>
    <a href="/contact" class="btn btn-lg btn-primary px-5">Get in Touch</a>
  </div>
</section>

<!-- About Section -->
<section class="py-5 bg-light text-center">
  <div class="container">
    <h2 class="mb-4">Who We Are</h2>
    <p class="lead mx-auto" style="max-width: 800px;">
      Since 2007, Shabakkat KSA has been delivering reliable Telecom, Power, and IT services across Saudi Arabia.
      We believe in quality, innovation, and customer satisfaction.
    </p>
  </div>
</section>

<!-- Services -->
<section class="py-5">
  <div class="container">
    <h2 class="text-center mb-5">Our Core Services</h2>
    <div class="row g-4">
      @foreach($services as $service)
      <div class="col-md-3">
        <div class="card h-100 border-0 shadow-sm">
          <img src="{{ asset('storage/'.$service->image) }}" class="card-img-top" alt="{{ $service->title }}">
          <div class="card-body text-center">
            <h5>{{ $service->title }}</h5>
            <a href="{{ url('service/'.$service->slug) }}" class="stretched-link">Read More</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- CTA -->
<section class="text-center py-5 text-white" style="background-color: var(--primary-color);">
  <div class="container">
    <h2>Partner with Shabakkat KSA</h2>
    <p class="lead">Join us in building the future of smart infrastructure and technology.</p>
    <a href="/contact" class="btn btn-light btn-lg mt-3">Contact Us</a>
  </div>
</section>

@endsection
