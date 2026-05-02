@extends('layouts.app')

@section('title', 'Laptops Inventory')
@section('meta_description', 'Browse our large inventory of laptops. From student laptops to gaming machines, we have the perfect fit for you.')

@section('content')

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

{{-- CATEGORY STRIP SECTION --}}
<section style="background-color: #ffffff; padding: 60px 0; border-bottom: 1px solid #e2e8f0; position: relative; z-index: 10;">
    <div class="container">
        {{-- CIRCULAR BRAND CATEGORIES (LAPTOPSKING STYLE) --}}
        <div style="text-align: center; margin-bottom: 50px;">
            <h2 style="font-size: 2.5rem; font-weight: 800; color: #0f172a; margin-bottom: 10px;">Shop By <span style="color: #06b6d4;">Brand</span></h2>
            <p style="color: #64748b; font-size: 1rem; font-weight: 500;">The best offers on your favorite brands, right here.</p>
        </div>

        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 30px;">
            {{-- All Brands Circle --}}
            <a href="{{ route('laptops') }}" style="display: flex; flex-direction: column; align-items: center; gap: 15px; text-decoration: none;">
                <div style="width: 100px; height: 100px; border-radius: 50%; background-color: {{ !request()->has('category') ? '#06b6d4' : '#f1f5f9' }}; display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); border: 1px solid #e2e8f0; {{ !request()->has('category') ? 'box-shadow: 0 0 20px rgba(6,182,212,0.4);' : '' }}">
                    <i class="fa-solid fa-border-all" style="font-size: 2rem; color: {{ !request()->has('category') ? '#ffffff' : '#06b6d4' }};"></i>
                </div>
                <span style="font-size: 10px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1em; color: {{ !request()->has('category') ? '#06b6d4' : '#94a3b8' }}; text-align: center;">All Brands</span>
            </a>

            @foreach($categories as $cat)
                @php
                    $repLaptop = $cat->laptops->first();
                    $thumbImage = $repLaptop ? asset($repLaptop->image) : asset('img/laptops/default.png');
                    $isActive = request('category') == $cat->slug;
                @endphp
                <a href="{{ route('laptops', ['category' => $cat->slug]) }}" style="display: flex; flex-direction: column; align-items: center; gap: 15px; text-decoration: none;">
                    <div style="width: 100px; height: 100px; border-radius: 50%; background-color: #FEF0E0; display: flex; align-items: center; justify-content: center; padding: 15px; overflow: hidden; border: {{ $isActive ? '4px solid #06b6d4' : '1px solid #fef0e0' }}; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); {{ $isActive ? 'transform: scale(1.1);' : '' }}">
                        <img src="{{ $thumbImage }}" alt="{{ $cat->name }}" style="width: 100%; height: 100%; object-fit: contain;">
                    </div>
                    <span style="font-size: 10px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1em; color: {{ $isActive ? '#06b6d4' : '#94a3b8' }}; text-align: center;">{{ $cat->name }}</span>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- LAPTOPS INVENTORY --}}
<section style="background-color: #020617; min-height: 100vh; padding: 60px 0; position: relative; overflow: hidden;">
    {{-- Ambient Background Glows --}}
    <div style="position: absolute; top: 0; left: 25%; width: 400px; height: 400px; background-color: rgba(6,182,212,0.1); filter: blur(120px); border-radius: 50%;"></div>
    <div style="position: absolute; bottom: 0; right: 25%; width: 400px; height: 400px; background-color: rgba(6,182,212,0.05); filter: blur(120px); border-radius: 50%;"></div>

    <div class="container" style="position: relative; z-index: 1;">
        {{-- LAPTOPS GRID --}}
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 30px;">
            @foreach($laptops as $laptop)
                <div style="background-color: rgba(15,23,42,0.6); border: 1px solid #1e293b; border-radius: 2rem; overflow: hidden; transition: all 0.3s ease; max-width: 350px; margin: 0 auto; width: 100%;">
                    {{-- Badge --}}
                    <div style="position: absolute; top: 20px; left: 20px; z-index: 10;">
                        <span style="padding: 6px 16px; border-radius: 9999px; background-color: rgba(2,6,23,0.8); border: 1px solid #1e293b; font-size: 10px; font-weight: 700; color: #06b6d4; text-transform: uppercase; letter-spacing: 0.1em;">
                            {{ $laptop->brand }}
                        </span>
                    </div>

                    {{-- Image Container --}}
                    <div style="position: relative; background-color: #ffffff; height: 220px; display: flex; align-items: center; justify-content: center; padding: 30px;">
                        <img src="{{ asset($laptop->image) }}" alt="{{ $laptop->brand }} {{ $laptop->model }}" 
                             style="width: 100%; height: 100%; object-fit: contain;">
                    </div>

                    {{-- Content --}}
                    <div style="padding: 30px;">
                        <h3 style="font-size: 1.1rem; font-weight: 700; color: #ffffff; margin-bottom: 25px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            {{ $laptop->model }}
                        </h3>

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
                                    <p style="font-size: 12px; font-weight: 700; color: #e2e8f0; margin: 0;">{{ $laptop->ssd }}</p>
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
                            <a href="https://wa.me/96176507040?text=I'm%20interested%20in%20the%20{{ urlencode($laptop->brand . ' ' . $laptop->model) }}" 
                               style="width: 48px; height: 48px; border-radius: 12px; background-color: #1e293b; display: flex; align-items: center; justify-content: center; color: #06b6d4; text-decoration: none; transition: all 0.3s ease;">
                                <i class="fa-brands fa-whatsapp" style="font-size: 20px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if($laptops->isEmpty())
            <div style="text-align: center; padding: 80px 0;">
                <i class="fa-solid fa-laptop-slash" style="font-size: 60px; color: #1e293b; margin-bottom: 25px; display: block;"></i>
                <h3 style="font-size: 1.5rem; font-weight: 700; color: #ffffff; margin-bottom: 10px;">No Laptops Found</h3>
                <p style="color: #64748b;">Try selecting a different brand or clearing the filters.</p>
                <a href="{{ route('laptops') }}" style="display: inline-block; margin-top: 25px; color: #06b6d4; font-weight: 700; text-decoration: none;">
                    View All Brands
                </a>
            </div>
        @endif
    </div>
</section>

@endsection
