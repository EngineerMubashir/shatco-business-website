<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Shabakkat KSA')">
    <meta name="keywords" content="@yield('meta_keywords', 'telecom, power, IT services, consulting')">
    <title>@yield('title', 'Shabakkat KSA')</title>
<!-- Font Awesome (load once globally) -->
<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      as="style" onload="this.onload=null;this.rel='stylesheet'">

<!-- Alpine.js (load once globally) -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="icon" href="{{ asset('images/favicon.ico') }}">

    <!-- Compiled CSS from Vite build -->
    <link rel="stylesheet" href="{{ asset('build/assets/app-Cvvu4iO2.css') }}">

    @stack('styles')
</head>
<body class="bg-black text-white">

    @include('frontend.layouts.header')

    <main>
        @yield('content')
    </main>

    @include('frontend.layouts.footer')

    <!-- Compiled JS from Vite build -->
    <script src="{{ asset('build/assets/app-CvgioS1y.js') }}" ></script>

    @stack('scripts')
</body>
</html>
