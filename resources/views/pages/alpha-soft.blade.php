@extends('layouts.app')

@section('title', 'Alpha Soft POS System')
@section('meta_description', 'Explore all modules of Alpha Soft: POS, Inventory, Accounting, HR, Reports and Security — by Computronix SARL Lebanon.')

@section('content')

<section class="page-hero" id="alphasoft-hero">
    <div class="page-hero-bg"></div>
    <div class="container page-hero-content">
        <span class="section-tag">Our Flagship Product</span>
        <h1>Alpha Soft POS System</h1>
        <p>A complete, all-in-one business management solution built for Lebanese businesses — covering every aspect of your operations.</p>
    </div>
</section>

<section class="section" id="modules">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">System Modules</span>
            <h2>Powerful Features, One Platform</h2>
            <p>Alpha Soft is structured into fully integrated modules — each powerful on its own, even better together.</p>
        </div>
        <div class="modules-grid">
            @foreach($modules as $m)
            <div class="module-card" id="module-{{ Str::slug($m['title']) }}">
                <div class="module-header">
                    <div class="module-icon icon-{{ $m['color'] }}">
                        <i class="fa-solid {{ $m['icon'] }}"></i>
                    </div>
                    <h3>{{ $m['title'] }}</h3>
                </div>
                <ul class="module-list">
                    @foreach($m['items'] as $item)
                    <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="cta-section section-alt">
    <div class="container">
        <div class="cta-box">
            <h2>Get Alpha Soft for Your Business</h2>
            <p>Contact Computronix SARL today for pricing, installation, and a free live demo at your location in Lebanon.</p>
            <div class="cta-btns">
                <a href="{{ route('contact') }}" class="btn btn-primary" id="alphasoft-cta-btn"><i class="fa-solid fa-envelope"></i> Request a Demo</a>
                <a href="tel:+9613243504" class="btn btn-outline" id="alphasoft-call-btn"><i class="fa-solid fa-phone"></i> Call Now</a>
            </div>
        </div>
    </div>
</section>

@endsection
