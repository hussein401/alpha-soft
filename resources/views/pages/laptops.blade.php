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
        {{-- BRAND DISCOVERY SECTION --}}
        <div class="mb-16">
            <div class="text-center mb-10">
                <span class="text-primary font-bold tracking-[0.2em] uppercase text-xs mb-4 block">Select a Brand</span>
                <h2 class="text-3xl md:text-4xl font-bold">Explore Our <span class="text-gradient">Catalog</span></h2>
            </div>

            <div class="flex flex-wrap justify-center gap-4 md:gap-6">
                {{-- All Laptops Tile --}}
                <a href="{{ route('laptops') }}" 
                   class="relative group overflow-hidden flex flex-col items-center justify-center w-28 h-28 md:w-36 md:h-36 rounded-3xl border-2 transition-all duration-500 {{ !request()->has('category') ? 'bg-primary border-primary shadow-[0_0_30px_rgba(6,182,212,0.3)] scale-105' : 'bg-slate-900/40 border-slate-800 hover:border-primary/50 hover:bg-slate-800/80' }}">
                    <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <i class="fa-solid fa-border-all text-2xl md:text-3xl mb-3 {{ !request()->has('category') ? 'text-white' : 'text-primary' }}"></i>
                    <span class="font-bold text-xs md:text-sm {{ !request()->has('category') ? 'text-white' : 'text-gray-400' }}">All</span>
                </a>

                @foreach($categories as $cat)
                    <a href="{{ route('laptops', ['category' => $cat->slug]) }}" 
                       class="relative group overflow-hidden flex flex-col items-center justify-center w-28 h-28 md:w-36 md:h-36 rounded-3xl border-2 transition-all duration-500 {{ request('category') == $cat->slug ? 'bg-primary border-primary shadow-[0_0_30px_rgba(6,182,212,0.3)] scale-105' : 'bg-slate-900/40 border-slate-800 hover:border-primary/50 hover:bg-slate-800/80' }}">
                        <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        
                        {{-- Background Brand Initial --}}
                        <div class="absolute -bottom-2 -right-2 text-6xl font-black opacity-5 group-hover:opacity-10 transition-opacity uppercase pointer-events-none">
                            {{ substr($cat->name, 0, 1) }}
                        </div>

                        @php
                            $icon = 'fa-laptop';
                            if($cat->slug == 'hp') $icon = 'fa-h';
                            if($cat->slug == 'dell') $icon = 'fa-d';
                            if($cat->slug == 'lenovo') $icon = 'fa-l';
                            if($cat->slug == 'asus') $icon = 'fa-a';
                            if($cat->slug == 'sony') $icon = 'fa-s';
                            if($cat->slug == 'toshiba') $icon = 'fa-t';
                            if($cat->slug == 'surface') $icon = 'fa-window-maximize';
                        @endphp
                        <i class="fa-solid {{ $icon }} text-2xl md:text-3xl mb-3 {{ request('category') == $cat->slug ? 'text-white' : 'text-primary' }}"></i>
                        <span class="font-bold text-xs md:text-sm text-center px-2 {{ request('category') == $cat->slug ? 'text-white' : 'text-gray-400' }}">{{ $cat->name }}</span>
                    </a>
                @endforeach
            </div>
        </div>

        {{-- LAPTOPS GRID --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($laptops as $laptop)
                <div class="group relative bg-slate-900/40 border border-slate-800 rounded-[2rem] overflow-hidden hover:border-primary/50 transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(0,0,0,0.4)]">
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
