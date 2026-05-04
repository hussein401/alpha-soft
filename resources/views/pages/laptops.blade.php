@extends('layouts.app')

@section('title', 'Laptops Inventory')
@section('meta_description', 'Browse our large inventory of laptops. From student laptops to gaming machines, we have the perfect fit for you.')

@section('content')

@push('styles')
<style>
/* Mag-Lev Styles */
.mag-lev-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 50px;
    padding-top: 40px;
    padding-bottom: 20px;
}
.mag-lev-group {
    position: relative;
    width: 140px;
    height: 220px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-end;
    text-decoration: none;
    cursor: pointer;
}

/* Floating Product */
.mag-lev-product {
    position: absolute;
    top: 0;
    width: 130px;
    height: 130px;
    z-index: 10;
    transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    animation: float-bob 4s ease-in-out infinite;
}

.mag-lev-product img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    mix-blend-mode: multiply; /* Removes white background perfectly on light BG */
    filter: drop-shadow(0 20px 15px rgba(0,0,0,0.15));
    transition: all 0.5s ease;
}

/* 3D Hover Effect */
.mag-lev-group:hover .mag-lev-product {
    transform: translateY(-25px) scale(1.15) rotate(2deg);
}
.mag-lev-group:hover .mag-lev-product img {
    filter: drop-shadow(-10px 25px 20px rgba(0, 209, 255, 0.3));
}

@keyframes float-bob {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-12px); }
}

/* Anti-Gravity Energy Rings */
.energy-ring {
    position: absolute;
    bottom: 60px;
    border-radius: 50%;
    border: 2px solid rgba(0, 209, 255, 0.5);
    box-shadow: 0 0 10px rgba(0, 209, 255, 0.5), inset 0 0 10px rgba(0, 209, 255, 0.5);
    animation: ripple 2s linear infinite;
    transform: rotateX(75deg);
    opacity: 0;
    z-index: 5;
}
.mag-lev-group:hover .energy-ring {
    opacity: 1;
}
.ring-1 { width: 50px; height: 50px; animation-delay: 0s; }
.ring-2 { width: 80px; height: 80px; animation-delay: 0.6s; }
.ring-3 { width: 110px; height: 110px; animation-delay: 1.2s; }

@keyframes ripple {
    0% { transform: rotateX(75deg) scale(0.2); opacity: 1; }
    100% { transform: rotateX(75deg) scale(1.5); opacity: 0; }
}

/* High-Tech Podium Base */
.mag-lev-podium {
    position: relative;
    width: 110px;
    height: 30px;
    margin-bottom: 25px;
    z-index: 2;
    transition: all 0.3s ease;
}
.podium-top {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 20px;
    background: radial-gradient(circle at center, #ffffff, #e2e8f0);
    border-radius: 50%;
    border: 1px solid #cbd5e1;
    z-index: 3;
    box-shadow: inset 0 0 10px #ffffff;
}
.podium-body {
    position: absolute;
    top: 10px;
    left: 0;
    width: 100%;
    height: 20px;
    background: linear-gradient(to right, #94a3b8, #f8fafc, #94a3b8);
    border-radius: 0 0 50px 50px;
    z-index: 2;
    box-shadow: 0 15px 25px rgba(0,0,0,0.1);
}
.podium-glow {
    position: absolute;
    top: 0px;
    left: 15%;
    width: 70%;
    height: 15px;
    background: #00D1FF;
    border-radius: 50%;
    z-index: 4;
    filter: blur(8px);
    opacity: 0;
    transition: all 0.4s ease;
}
.mag-lev-group:hover .podium-glow {
    opacity: 0.8;
    filter: blur(12px);
    transform: scale(1.2);
}

/* Active State styling */
.mag-lev-group.active .energy-ring {
    border-color: rgba(6, 182, 212, 0.8);
    box-shadow: 0 0 15px rgba(6, 182, 212, 0.8);
    opacity: 1;
}
.mag-lev-group.active .podium-glow {
    background: #06b6d4;
    opacity: 0.6;
}

/* Label */
.mag-lev-title {
    font-size: 13px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: #475569;
    text-align: center;
    background: #ffffff;
    padding: 6px 18px;
    border-radius: 20px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
    border: 1px solid #e2e8f0;
    z-index: 20;
}
.mag-lev-group:hover .mag-lev-title, .mag-lev-group.active .mag-lev-title {
    color: #ffffff;
    background: #00D1FF;
    border-color: #00D1FF;
    box-shadow: 0 8px 20px rgba(0, 209, 255, 0.3);
    transform: translateY(-5px);
}

/* Laser Scanner */
.laser-scanner {
    position: absolute;
    top: -10%;
    left: -10%;
    width: 120%;
    height: 3px;
    background: #00D1FF;
    box-shadow: 0 0 15px #00D1FF, 0 0 30px #00D1FF;
    opacity: 0;
    z-index: 20;
    pointer-events: none;
    border-radius: 50%;
}
.mag-lev-group:hover .laser-scanner {
    opacity: 1;
    animation: scan 2s cubic-bezier(0.4, 0, 0.2, 1) infinite;
}
@keyframes scan {
    0% { transform: translateY(0) scaleX(0.8); }
    50% { transform: translateY(140px) scaleX(1.1); }
    100% { transform: translateY(0) scaleX(0.8); }
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .mag-lev-container {
        gap: 15px;
        padding-top: 20px;
    }
    .mag-lev-group {
        width: 105px;
        height: 170px;
    }
    .mag-lev-product {
        width: 90px;
        height: 90px;
    }
    .mag-lev-podium {
        width: 90px;
        height: 25px;
        margin-bottom: 15px;
    }
    .podium-top {
        height: 16px;
    }
    .podium-body {
        top: 8px;
        height: 16px;
    }
    .energy-ring {
        bottom: 45px;
    }
    .ring-1 { width: 35px; height: 35px; }
    .ring-2 { width: 60px; height: 60px; }
    .ring-3 { width: 85px; height: 85px; }
    .mag-lev-title {
        font-size: 11px;
        padding: 4px 12px;
    }
    /* Mute hover transform on mobile to prevent jumpy taps */
    .mag-lev-group:hover .mag-lev-product,
    .mag-lev-group:active .mag-lev-product {
        transform: translateY(-15px) scale(1.1) rotate(0deg);
    }
}
</style>
@endpush

@if(!request()->has('category') && !request()->has('search'))
{{-- HERO SECTION --}}
<section class="relative pt-32 pb-20 overflow-hidden bg-hero">
    <div class="absolute inset-0 grid-bg opacity-30"></div>
    <div class="container relative text-center">
        <div class="hero-tag mx-auto mb-6">
            <i class="fa-solid fa-laptop"></i> Laptop Inventory
        </div>
        <h1 class="text-4xl md:text-6xl font-bold mb-6">
            Find Your <span class="text-gradient">Perfect Laptop</span>
        </h1>
        <p class="text-xl text-gray-400 max-w-2xl mx-auto mb-10">
            We offer a wide selection of new and refurbished laptops tailored for students, professionals, and gamers. Check our stock below.
        </p>
    </div>
</section>
@endif

{{-- CATEGORY STRIP: only show when NO brand/search filter is active --}}
@if(!request('category') && !request('search'))
<section style="background-color: #ffffff; padding: 60px 0; border-bottom: 1px solid #e2e8f0; position: relative; z-index: 10;">
    <div class="container">
        <div style="text-align: center; margin-bottom: 50px;">
            <h2 style="font-size: 2.5rem; font-weight: 800; color: #0f172a; margin-bottom: 10px;">Shop By <span style="color: #06b6d4;">Brand</span></h2>
            <p style="color: #64748b; font-size: 1rem; font-weight: 500;">The best offers on your favorite brands, right here.</p>
        </div>

        <nav class="mag-lev-container" style="display: flex;">
            <a href="{{ route('laptops') }}" class="mag-lev-group active">
                <figure class="mag-lev-product" style="animation-delay: 0s; margin: 0;">
                    <div style="width:100px; height:100px; margin:15px auto; display:flex; align-items:center; justify-content:center; background: linear-gradient(135deg, #00D1FF, #3B82F6); border-radius:50%; box-shadow: 0 15px 30px rgba(0,209,255,0.3); color:white;">
                        <i class="fa-solid fa-border-all" style="font-size:3rem;"></i>
                    </div>
                    <i class="laser-scanner"></i>
                </figure>
                <i class="energy-ring ring-1"></i>
                <i class="energy-ring ring-2"></i>
                <i class="energy-ring ring-3"></i>
                <figure class="mag-lev-podium" style="margin: 0 0 25px 0;">
                    <i class="podium-glow"></i>
                    <i class="podium-top"></i>
                    <i class="podium-body"></i>
                </figure>
                <span class="mag-lev-title">All Brands</span>
            </a>

            @foreach($categories as $index => $cat)
                @php
                    $repLaptop = $cat->laptops->first();
                    $thumbImage = $repLaptop ? asset($repLaptop->image) : asset('img/laptops/default.png');
                    $delay = -($index % 4) * 0.8;
                @endphp
                <a href="{{ route('laptops', ['category' => $cat->slug]) }}" class="mag-lev-group">
                    <figure class="mag-lev-product" style="animation-delay: {{ $delay }}s; margin: 0;">
                        <img src="{{ $thumbImage }}" alt="{{ $cat->name }}">
                        <i class="laser-scanner"></i>
                    </figure>
                    <i class="energy-ring ring-1"></i>
                    <i class="energy-ring ring-2"></i>
                    <i class="energy-ring ring-3"></i>
                    <figure class="mag-lev-podium" style="margin: 0 0 25px 0;">
                        <i class="podium-glow"></i>
                        <i class="podium-top"></i>
                        <i class="podium-body"></i>
                    </figure>
                    <span class="mag-lev-title">{{ $cat->name }}</span>
                </a>
            @endforeach
        </nav>
    </div>
</section>
@else
{{-- BRAND PAGE HEADER: appears instead of the category strip when a brand is selected --}}
<section style="background: linear-gradient(135deg, #020617 0%, #0f172a 100%); padding: 100px 0 40px; border-bottom: 1px solid #1e293b; position: relative; overflow: hidden;">
    <div style="position: absolute; top: -50px; right: 10%; width: 300px; height: 300px; background: rgba(6,182,212,0.15); border-radius: 50%; filter: blur(100px);"></div>
    <div class="container" style="position: relative; z-index: 1;">
        <a href="{{ route('laptops') }}" style="display: inline-flex; align-items: center; gap: 8px; color: #64748b; text-decoration: none; font-weight: 600; margin-bottom: 30px; font-size: 14px; transition: color 0.3s;"
           onmouseover="this.style.color='#06b6d4';" onmouseout="this.style.color='#64748b';">
            <i class="fa-solid fa-arrow-left"></i> All Brands
        </a>
        <div style="display: flex; align-items: center; gap: 25px; flex-wrap: wrap;">
            @if(request('category'))
                @php $activeCat = $categories->firstWhere('slug', request('category')); @endphp
                @if($activeCat && $activeCat->laptops->first())
                    <div style="width: 80px; height: 80px; background: #ffffff; border-radius: 16px; padding: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.3); display: flex; align-items: center; justify-content: center;">
                        <img src="{{ asset($activeCat->laptops->first()->image) }}" alt="{{ $activeCat->name }}" style="width:100%; height:100%; object-fit:contain; mix-blend-mode: multiply;">
                    </div>
                @endif
            @endif
            <div>
                <p style="color: #06b6d4; font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.15em; margin: 0 0 8px;">Brand Collection</p>
                <h1 style="font-size: 3rem; font-weight: 900; color: #ffffff; margin: 0; line-height: 1;">
                    @if(request('category'))
                        {{ strtoupper(request('category')) }}
                    @else
                        Search Results
                    @endif
                    <span style="color: #06b6d4;"> Laptops</span>
                </h1>
                <p style="color: #64748b; margin: 10px 0 0; font-size: 15px;">{{ $laptops->count() }} laptop{{ $laptops->count() != 1 ? 's' : '' }} found</p>
            </div>
        </div>
    </div>
</section>
@endif

{{-- LAPTOPS INVENTORY --}}
<section id="inventory" style="background-color: #020617; min-height: 100vh; padding: 60px 0; position: relative; overflow: hidden;">
    {{-- Ambient Background Glows --}}
    <div style="position: absolute; top: 0; left: 25%; width: 400px; height: 400px; background-color: rgba(6,182,212,0.1); filter: blur(120px); border-radius: 50%;"></div>
    <div style="position: absolute; bottom: 0; right: 25%; width: 400px; height: 400px; background-color: rgba(6,182,212,0.05); filter: blur(120px); border-radius: 50%;"></div>

    <div class="container" style="position: relative; z-index: 1;">
        
        {{-- SEARCH & FILTER BAR --}}
        <div style="margin-bottom: 40px; display: flex; flex-direction: column; align-items: center; gap: 15px;">
            <form action="{{ route('laptops') }}" method="GET" style="width: 100%; max-width: 600px; position: relative;">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search models, specs, or details..." 
                       style="width: 100%; padding: 16px 24px; padding-right: 60px; border-radius: 50px; background-color: rgba(15,23,42,0.8); border: 1px solid #1e293b; color: #ffffff; font-size: 1.1rem; outline: none; box-shadow: 0 10px 25px rgba(0,0,0,0.5); backdrop-filter: blur(10px); transition: all 0.3s ease;"
                       onfocus="this.style.borderColor='#06b6d4'; this.style.boxShadow='0 10px 25px rgba(6,182,212,0.2)';"
                       onblur="this.style.borderColor='#1e293b'; this.style.boxShadow='0 10px 25px rgba(0,0,0,0.5)';">
                <button type="submit" style="position: absolute; right: 8px; top: 8px; bottom: 8px; width: 44px; border-radius: 50%; background: linear-gradient(135deg, #06b6d4, #3b82f6); border: none; color: white; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 10px rgba(6,182,212,0.3);"
                        onmouseover="this.style.transform='scale(1.05)';"
                        onmouseout="this.style.transform='scale(1)';"
                        title="Search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>

            @if(request('search') || request('category'))
                <div style="display: flex; gap: 10px; flex-wrap: wrap; justify-content: center;">
                    @if(request('category'))
                        <span style="padding: 6px 16px; border-radius: 20px; background-color: rgba(6,182,212,0.1); border: 1px solid #06b6d4; color: #06b6d4; font-size: 12px; font-weight: 700; display: flex; align-items: center; gap: 8px;">
                            Brand: {{ ucfirst(request('category')) }}
                            <a href="{{ route('laptops', ['search' => request('search')]) }}" style="color: #06b6d4; text-decoration: none;"><i class="fa-solid fa-xmark"></i></a>
                        </span>
                    @endif
                    @if(request('search'))
                        <span style="padding: 6px 16px; border-radius: 20px; background-color: rgba(59,130,246,0.1); border: 1px solid #3b82f6; color: #3b82f6; font-size: 12px; font-weight: 700; display: flex; align-items: center; gap: 8px;">
                            Search: "{{ request('search') }}"
                            <a href="{{ route('laptops', ['category' => request('category')]) }}" style="color: #3b82f6; text-decoration: none;"><i class="fa-solid fa-xmark"></i></a>
                        </span>
                    @endif
                    <a href="{{ route('laptops') }}" style="padding: 6px 16px; border-radius: 20px; background-color: #1e293b; color: #94a3b8; font-size: 12px; font-weight: 700; text-decoration: none; transition: all 0.3s ease;"
                       onmouseover="this.style.color='#ffffff';" onmouseout="this.style.color='#94a3b8';">
                        Clear All
                    </a>
                </div>
            @endif
        </div>

        @if($laptops->isEmpty())
            <div style="text-align: center; padding: 60px 0; background-color: rgba(15,23,42,0.4); border: 1px dashed #1e293b; border-radius: 2rem;">
                <i class="fa-solid fa-laptop-code" style="font-size: 4rem; color: #334155; margin-bottom: 20px;"></i>
                <h3 style="font-size: 1.5rem; color: #e2e8f0; font-weight: 700;">No laptops found</h3>
                <p style="color: #94a3b8; margin-top: 10px;">Try adjusting your search or category filters.</p>
                <a href="{{ route('laptops') }}" class="btn-primary shadow-elegant" style="margin-top: 20px; display: inline-block;">View All Laptops</a>
            </div>
        @else
            {{-- LAPTOPS GRID --}}
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 30px;">
                @foreach($laptops as $laptop)
                <div style="background-color: rgba(15,23,42,0.6); border: 1px solid #1e293b; border-radius: 2rem; overflow: hidden; transition: all 0.3s ease; max-width: 350px; margin: 0 auto; width: 100%;">
                    {{-- Badge --}}
                    <div style="position: absolute; top: 20px; left: 20px; z-index: 10;">
                        <span style="padding: 6px 16px; border-radius: 9999px; background-color: rgba(2,6,23,0.8); border: 1px solid #1e293b; font-size: 10px; font-weight: 700; color: #06b6d4; text-transform: uppercase; letter-spacing: 0.1em;">
                            {{ $laptop->category?->name }}
                        </span>
                    </div>

                    {{-- Image Container --}}
                    <a href="{{ route('laptop.show', $laptop->id) }}" style="position: relative; background-color: #ffffff; height: 220px; display: flex; align-items: center; justify-content: center; padding: 30px; text-decoration: none; display: block;">
                        <img src="{{ asset($laptop->image) }}" alt="{{ $laptop->category?->name }} {{ $laptop->laptopModel?->name }} {{ $laptop->model }}" 
                             style="width: 100%; height: 100%; object-fit: contain; transition: transform 0.3s ease;"
                             onmouseover="this.style.transform='scale(1.1)';" onmouseout="this.style.transform='scale(1)';">
                    </a>

                    {{-- Content --}}
                    <div style="padding: 30px;">
                        <a href="{{ route('laptop.show', $laptop->id) }}" style="text-decoration: none; display: block; margin-bottom: 25px;">
                            <h3 style="font-size: 1.1rem; font-weight: 700; color: #ffffff; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; transition: color 0.3s ease;"
                                onmouseover="this.style.color='#06b6d4';" onmouseout="this.style.color='#ffffff';">
                                {{ $laptop->laptopModel?->name }} {{ $laptop->model }}
                            </h3>
                        </a>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 30px;">
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <div style="width: 32px; height: 32px; border-radius: 8px; background-color: #1e293b; display: flex; align-items: center; justify-content: center; color: #06b6d4;">
                                    <i class="fa-solid fa-microchip" style="font-size: 12px;"></i>
                                </div>
                                <div>
                                    <p style="font-size: 9px; color: #64748b; text-transform: uppercase; font-weight: 700; margin: 0;">RAM</p>
                                    <p style="font-size: 12px; font-weight: 700; color: #e2e8f0; margin: 0;">{{ $laptop->ram }}</p>
                                </div>
                            </div>
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <div style="width: 32px; height: 32px; border-radius: 8px; background-color: #1e293b; display: flex; align-items: center; justify-content: center; color: #06b6d4;">
                                    <i class="fa-solid fa-hard-drive" style="font-size: 12px;"></i>
                                </div>
                                <div>
                                    <p style="font-size: 9px; color: #64748b; text-transform: uppercase; font-weight: 700; margin: 0;">Storage</p>
                                    <p style="font-size: 12px; font-weight: 700; color: #e2e8f0; margin: 0;">{{ $laptop->storage }}</p>
                                </div>
                            </div>
                        </div>

                        <div style="display: flex; align-items: center; justify-content: space-between; padding-top: 25px; border-top: 1px solid #1e293b;">
                            <div>
                                <p style="font-size: 9px; color: #64748b; text-transform: uppercase; font-weight: 700; margin-bottom: 5px;">Our Price</p>
                                <p style="font-size: 1.5rem; font-weight: 900; color: #ffffff; margin: 0;">
                                    <span style="color: #06b6d4; font-size: 14px;">$</span>{{ number_format($laptop->price) }}
                                </p>
                            </div>
                            <a href="https://wa.me/96176507040?text=I'm%20interested%20in%20the%20{{ urlencode(($laptop->category?->name ?? '') . ' ' . ($laptop->laptopModel?->name ?? '') . ' ' . $laptop->model) }}" 
                               style="width: 48px; height: 48px; border-radius: 12px; background-color: #1e293b; display: flex; align-items: center; justify-content: center; color: #06b6d4; text-decoration: none; transition: all 0.3s ease;">
                                <i class="fa-brands fa-whatsapp" style="font-size: 20px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

@endsection
