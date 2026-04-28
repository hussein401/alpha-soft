<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Alpha Soft — Professional POS & Business Management System by Computronix SARL, Lebanon.')">
    <meta name="keywords" content="Alpha Soft, POS, Point of Sale, Computronix, SARL, Lebanon, Zahlé, business software">
    <meta name="author" content="Computronix SARL">
    <meta property="og:title" content="@yield('title', 'Alpha Soft') | Computronix SARL">
    <meta property="og:description" content="@yield('meta_description', 'Professional POS & Business Management System')">
    <meta property="og:type" content="website">
    <title>@yield('title', 'Home') | Alpha Soft — Computronix SARL</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- Main Stylesheet --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @stack('styles')
</head>
<body>

{{-- ========== NAVBAR ========== --}}
<nav class="navbar" id="navbar">
    <div class="container nav-container">
        <a href="{{ route('home') }}" class="nav-brand" id="nav-brand-logo">
            <img src="{{ asset('images/logo.png') }}" alt="Computronix Logo" class="nav-logo">
            <div class="nav-brand-text">
                <span class="brand-name">Alpha Soft</span>
                <span class="brand-sub">by Computronix SARL</span>
            </div>
        </a>

        <ul class="nav-links" id="nav-links">
            <li><a href="{{ route('home') }}"       class="nav-link {{ request()->routeIs('home')       ? 'active' : '' }}" id="nav-home">Home</a></li>
            <li><a href="{{ route('alpha-soft') }}" class="nav-link {{ request()->routeIs('alpha-soft') ? 'active' : '' }}" id="nav-alphasoft">Alpha Soft</a></li>
            <li><a href="{{ route('services') }}"   class="nav-link {{ request()->routeIs('services')   ? 'active' : '' }}" id="nav-services">Services</a></li>
            <li><a href="{{ route('about') }}"      class="nav-link {{ request()->routeIs('about')      ? 'active' : '' }}" id="nav-about">About</a></li>
            <li><a href="{{ route('contact') }}"    class="nav-link nav-cta {{ request()->routeIs('contact') ? 'active' : '' }}" id="nav-contact">Contact Us</a></li>
        </ul>

        <button class="theme-toggle" id="theme-toggle" aria-label="Toggle Theme">
            <i class="fa-solid fa-moon"></i>
        </button>

        <button class="nav-toggle" id="nav-toggle" aria-label="Toggle navigation">
            <span></span><span></span><span></span>
        </button>
    </div>
</nav>

{{-- ========== MAIN CONTENT ========== --}}
<main id="main-content">
    @yield('content')
</main>

{{-- ========== FOOTER ========== --}}
<footer class="footer" id="site-footer">
    <div class="footer-glow"></div>
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand">
                <img src="{{ asset('images/logo.png') }}" alt="Computronix Logo" class="footer-logo">
                <h3>Alpha Soft</h3>
                <p>We revolutionize your digital world with our services. Trusted by businesses across Lebanon since 1993.</p>
                <div class="footer-social">
                    <a href="https://www.instagram.com/computronix_sarl/" target="_blank" rel="noopener" class="social-link" id="footer-instagram" aria-label="Instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://wa.me/9613243504" target="_blank" rel="noopener" class="social-link" id="footer-whatsapp" aria-label="WhatsApp">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                    <a href="mailto:ctx2002@hotmail.com" class="social-link" id="footer-email" aria-label="Email">
                        <i class="fa-solid fa-envelope"></i>
                    </a>
                </div>
            </div>

            <div class="footer-links">
                <h4>Navigation</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('alpha-soft') }}">Alpha Soft POS</a></li>
                    <li><a href="{{ route('services') }}">Our Services</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>

            <div class="footer-links">
                <h4>Alpha Soft Modules</h4>
                <ul>
                    <li><a href="{{ route('alpha-soft') }}#pos">Point of Sale</a></li>
                    <li><a href="{{ route('alpha-soft') }}#inventory">Inventory Control</a></li>
                    <li><a href="{{ route('alpha-soft') }}#accounting">Accounting</a></li>
                    <li><a href="{{ route('alpha-soft') }}#reports">Reports & Analytics</a></li>
                    <li><a href="{{ route('alpha-soft') }}#hr">HR Management</a></li>
                </ul>
            </div>

            <div class="footer-contact">
                <h4>Get In Touch</h4>
                <ul class="contact-list">
                    <li>
                        <i class="fa-solid fa-location-dot"></i>
                        <span>Ksara, Hrawi Buildings, Zahlé, Lebanon</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-phone"></i>
                        <span>08 812 964 | +961 3 243 504</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-envelope"></i>
                        <span>ctx2002@hotmail.com</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-clock"></i>
                        <span>Mon–Sat: 8:00 AM – 7:00 PM</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Computronix SARL. All rights reserved.</p>
            <p>Crafted with <i class="fa-solid fa-heart" style="color:#7C3AED"></i> in Zahlé, Lebanon</p>
        </div>
    </div>
</footer>

{{-- ========== FLOATING WHATSAPP ========== --}}
<a href="https://wa.me/9613243504" target="_blank" rel="noopener" class="whatsapp-float" id="whatsapp-float" aria-label="Chat on WhatsApp">
    <i class="fa-brands fa-whatsapp"></i>
</a>

{{-- ========== BACK TO TOP ========== --}}
<button class="back-to-top" id="back-to-top" aria-label="Back to top">
    <i class="fa-solid fa-chevron-up"></i>
</button>

<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
