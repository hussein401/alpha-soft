@extends('layouts.app')

@section('title', 'Home')
@section('meta_description', 'Alpha Soft — The complete POS & business management system by Computronix SARL. Trusted in Lebanon since 1993.')

@section('content')

{{-- HERO --}}
<section class="hero" id="hero">
    <div class="hero-bg"></div>
    <div class="hero-grid"></div>
    <div class="container">
        <div class="hero-content">
            <div class="hero-badge">
                <i class="fa-solid fa-circle-check"></i> Trusted Since 1993 · Zahlé, Lebanon
            </div>
            <h1>The Smart Way to<br><span>Run Your Business</span></h1>
            <p>Alpha Soft is Computronix SARL's flagship POS and business management system — built for Lebanese businesses with powerful sales, inventory, accounting and reporting tools.</p>
            <div class="hero-btns">
                <a href="{{ route('alpha-soft') }}" class="btn btn-primary" id="hero-discover-btn">
                    <i class="fa-solid fa-rocket"></i> Discover Alpha Soft
                </a>
                <a href="{{ route('contact') }}" class="btn btn-outline" id="hero-contact-btn">
                    <i class="fa-solid fa-phone"></i> Get a Demo
                </a>
            </div>
        </div>
    </div>
    {{-- decorative circuit SVG --}}
    <div class="hero-visual">
        <svg viewBox="0 0 500 500" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="250" cy="250" r="200" stroke="rgba(124,58,237,0.3)" stroke-width="1"/>
            <circle cx="250" cy="250" r="150" stroke="rgba(59,130,246,0.2)" stroke-width="1"/>
            <circle cx="250" cy="250" r="100" stroke="rgba(124,58,237,0.15)" stroke-width="1"/>
            <line x1="50" y1="250" x2="450" y2="250" stroke="rgba(59,130,246,0.2)" stroke-width="1"/>
            <line x1="250" y1="50" x2="250" y2="450" stroke="rgba(59,130,246,0.2)" stroke-width="1"/>
            <circle cx="250" cy="250" r="10" fill="rgba(124,58,237,0.5)"/>
        </svg>
    </div>
</section>

{{-- STATS --}}
<section class="stats-bar" id="stats">
    <div class="container">
        <div class="stats-grid">
            @foreach($stats as $s)
            <div class="stat-item">
                <div class="stat-value">{{ $s['value'] }}</div>
                <div class="stat-label">{{ $s['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FEATURES --}}
<section class="section" id="features">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">What Alpha Soft Offers</span>
            <h2>Everything Your Business Needs</h2>
            <p>One integrated system to manage sales, inventory, accounting, and your whole team — all in one place.</p>
        </div>
        <div class="features-grid">
            @foreach($features as $f)
            <div class="feature-card">
                <div class="feature-icon"><i class="fa-solid {{ $f['icon'] }}"></i></div>
                <h3>{{ $f['title'] }}</h3>
                <p>{{ $f['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="cta-section section-alt" id="cta">
    <div class="container">
        <div class="cta-box">
            <h2>Ready to Upgrade Your Business?</h2>
            <p>Join hundreds of Lebanese businesses already using Alpha Soft. Contact us today for a free demo and installation quote.</p>
            <div class="cta-btns">
                <a href="{{ route('contact') }}" class="btn btn-primary" id="cta-contact-btn">
                    <i class="fa-solid fa-envelope"></i> Contact Us
                </a>
                <a href="https://wa.me/9613243504" target="_blank" class="btn btn-outline" id="cta-whatsapp-btn">
                    <i class="fa-brands fa-whatsapp"></i> WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
