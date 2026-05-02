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

{{-- LAPTOPS INVENTORY --}}
<section class="section bg-darker min-h-screen relative overflow-hidden">
    {{-- Ambient Background Glows --}}
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-primary/10 blur-[120px] rounded-full"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-primary/5 blur-[120px] rounded-full"></div>

    <div class="container relative">
    {{-- WHITE STRIP FOR CATEGORIES --}}
    <div style="background-color: #ffffff; padding: 4rem 0; margin-bottom: 5rem; box-shadow: inset 0 2px 4px rgba(0,0,0,0.05); width: 100vw; position: relative; left: 50%; right: 50%; margin-left: -50vw; margin-right: -50vw;">
        <div class="container">
            {{-- CIRCULAR BRAND CATEGORIES (LAPTOPSKING STYLE) --}}
            <div style="text-align: center; margin-bottom: 3rem;">
                <h2 style="font-size: 2rem; font-weight: 800; color: #0f172a; margin-bottom: 0.5rem;">Shop By <span style="color: var(--primary-cyan);">Brand</span></h2>
                <p style="color: #64748b; font-size: 0.9rem; font-weight: 500;">The best offers on your favorite brands, right here.</p>
            </div>

            <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 2rem;">
                {{-- All Brands Circle --}}
                <a href="{{ route('laptops') }}" style="display: flex; flex-direction: column; items-center; gap: 1rem; text-decoration: none; transition: transform 0.3s ease;" class="hover:scale-105">
                    <div style="width: 100px; height: 100px; border-radius: 50%; background-color: {{ !request()->has('category') ? 'var(--primary-cyan)' : '#f1f5f9' }}; display: flex; align-items: center; justify-content: center; border: 1px solid #e2e8f0; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); {{ !request()->has('category') ? 'box-shadow: 0 0 20px rgba(6,182,212,0.4);' : '' }}">
                        <i class="fa-solid fa-border-all" style="font-size: 1.5rem; color: {{ !request()->has('category') ? '#ffffff' : 'var(--primary-cyan)' }};"></i>
                    </div>
                    <span style="font-size: 0.75rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1em; color: {{ !request()->has('category') ? 'var(--primary-cyan)' : '#94a3b8' }}; text-align: center;">All Brands</span>
                </a>

                @foreach($categories as $cat)
                    @php
                        $repLaptop = $cat->laptops->first();
                        $thumbImage = $repLaptop ? asset($repLaptop->image) : asset('img/laptops/default.png');
                        $isActive = request('category') == $cat->slug;
                    @endphp
                    <a href="{{ route('laptops', ['category' => $cat->slug]) }}" style="display: flex; flex-direction: column; items-center; gap: 1rem; text-decoration: none; transition: transform 0.3s ease;" class="hover:scale-105">
                        <div style="width: 100px; height: 100px; border-radius: 50%; background-color: #FEF0E0; display: flex; align-items: center; justify-content: center; padding: 15px; overflow: hidden; border: {{ $isActive ? '3px solid var(--primary-cyan)' : '1px solid #fef0e0' }}; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); {{ $isActive ? 'transform: scale(1.1);' : '' }}">
                            <img src="{{ $thumbImage }}" alt="{{ $cat->name }}" style="width: 100%; height: 100%; object-fit: contain;">
                        </div>
                        <span style="font-size: 0.75rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1em; color: {{ $isActive ? 'var(--primary-cyan)' : '#94a3b8' }}; text-align: center;">{{ $cat->name }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container relative">
        {{-- LAPTOPS GRID --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($laptops as $laptop)
                <div class="group relative bg-slate-900/40 border border-slate-800 rounded-[2rem] overflow-hidden hover:border-primary/50 transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(0,0,0,0.4)] mx-auto w-full max-w-[350px]">
                    {{-- Glass Effect Overlay --}}
                    <div class="absolute inset-0 backdrop-blur-[2px] opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    
                    {{-- Badge --}}
                    <div class="absolute top-6 left-6 z-10">
                        <span class="px-4 py-1.5 rounded-full bg-slate-950/80 border border-slate-800 text-[10px] font-bold text-primary uppercase tracking-widest backdrop-blur-md">
                            {{ $laptop->brand }}
                        </span>
                    </div>

                    {{-- Image Container --}}
                    <div class="relative aspect-[4/3] bg-white overflow-hidden p-8 flex items-center justify-center">
                        <img src="{{ asset($laptop->image) }}" alt="{{ $laptop->brand }} {{ $laptop->model }}" 
                             class="w-full h-full object-contain transition-transform duration-700 group-hover:scale-110 group-hover:rotate-2">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/5 to-transparent"></div>
                    </div>

                    {{-- Content --}}
                    <div class="p-8 relative">
                        <h3 class="text-lg font-bold text-white mb-6 line-clamp-1 group-hover:text-primary transition-colors">
                            {{ $laptop->model }}
                        </h3>

                        <div class="grid grid-cols-2 gap-4 mb-8">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                                    <i class="fa-solid fa-microchip text-xs"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] text-gray-500 uppercase font-bold">RAM</p>
                                    <p class="text-sm font-bold text-gray-200">{{ $laptop->ram }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                                    <i class="fa-solid fa-hard-drive text-xs"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] text-gray-500 uppercase font-bold">SSD</p>
                                    <p class="text-sm font-bold text-gray-200">{{ $laptop->storage }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- Action Button --}}
                        <a href="https://wa.me/9613243504?text=Hello%2C%20I%20am%20interested%20in%20the%20{{ urlencode($laptop->brand . ' ' . $laptop->model) }}%20laptop." 
                           target="_blank"
                           class="flex items-center justify-center gap-3 w-full py-4 rounded-2xl bg-slate-800 border border-slate-700 text-white font-bold hover:bg-primary hover:border-primary hover:shadow-[0_10px_20px_rgba(6,182,212,0.3)] transition-all duration-300">
                            <i class="fa-brands fa-whatsapp text-xl"></i>
                            <span>Order via WhatsApp</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        @if($laptops->isEmpty())
            <div class="text-center py-32">
                <div class="w-24 h-24 bg-slate-900/50 rounded-full flex items-center justify-center mx-auto mb-6 border border-slate-800">
                    <i class="fa-solid fa-laptop-slash text-4xl text-gray-700"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">No Models Found</h3>
                <p class="text-gray-400 mb-10 max-w-md mx-auto">We're currently updating our stock for this brand. Please check back soon or browse other brands.</p>
                <a href="{{ route('laptops') }}" class="btn-primary">View All Laptops</a>
            </div>
        @endif
    </div>
</section>

@endsection
