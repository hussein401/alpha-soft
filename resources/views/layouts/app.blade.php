<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>@yield('title', 'Home') | Computronix SARL</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- Main Stylesheet --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v={{ time() }}">

    @stack('styles')
</head>
<body class="{{ app()->getLocale() == 'ar' ? 'rtl' : '' }}">

{{-- ========== NAVBAR ========== --}}
<nav class="navbar">
    <div class="container nav-container">
        <a href="{{ route('home') }}" class="nav-brand">
            <div class="nav-logo" style="background: transparent; overflow: hidden;">
                <img src="{{ asset('images/logo.png') }}" alt="Computronix Logo" style="width: 100%; height: 100%; object-fit: contain;">
            </div>
            <div class="brand-text">
                <span class="brand-name">Computronix <span>SARL</span></span>
            </div>
        </a>

        <div class="nav-links">
            <a href="{{ Request::is('alpha-soft') ? '#services-section' : route('alpha-soft').'#services-section' }}" class="nav-link">Services</a>
            <a href="{{ Request::is('alpha-soft') ? '#products-section' : route('alpha-soft').'#products-section' }}" class="nav-link">Products</a>
            <a href="{{ Request::is('alpha-soft') ? '#about' : route('alpha-soft').'#about' }}" class="nav-link">About</a>
            <a href="{{ Request::is('alpha-soft') ? '#contact-section' : route('alpha-soft').'#contact-section' }}" class="nav-link">Contact</a>
            
            <a href="{{ Request::is('alpha-soft') ? '#chat-section' : route('alpha-soft').'#chat-section' }}" class="nav-btn">Ask AI</a>
        </div>
    </div>
</nav>

{{-- ========== MAIN CONTENT ========== --}}
<main>
    @yield('content')
    </main>


{{-- Scripts --}}
<script>
    // Global Scripts
</script>

@stack('scripts')
</body>
</html>
