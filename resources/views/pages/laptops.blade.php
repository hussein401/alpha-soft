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
<section class="bg-white py-16 shadow-inner relative z-10">
    <div class="container">
        {{-- CIRCULAR BRAND CATEGORIES (LAPTOPSKING STYLE) --}}
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 text-slate-900">Shop By <span class="text-primary">Brand</span></h2>
            <p class="text-slate-500 text-sm md:text-base font-medium">The best offers on your favorite brands, right here.</p>
        </div>

        <div class="flex flex-wrap justify-center gap-6 md:gap-12 lg:gap-16">
            {{-- All Brands Circle --}}
            <a href="{{ route('laptops') }}" class="group flex flex-col items-center gap-4 transition-all">
                <div class="w-24 h-24 md:w-36 md:h-36 rounded-full flex items-center justify-center transition-all duration-500 shadow-xl {{ !request()->has('category') ? 'bg-primary ring-4 ring-primary ring-offset-4 ring-offset-white scale-110' : 'bg-slate-100 border border-slate-200 hover:border-primary/50 hover:scale-105' }}">
                    <i class="fa-solid fa-border-all text-2xl md:text-4xl {{ !request()->has('category') ? 'text-white' : 'text-primary' }}"></i>
                </div>
                <span class="text-[10px] md:text-xs font-black uppercase tracking-widest text-center {{ !request()->has('category') ? 'text-primary' : 'text-slate-400 group-hover:text-primary' }}">All Brands</span>
            </a>

            @foreach($categories as $cat)
                @php
                    $repLaptop = $cat->laptops->first();
                    $thumbImage = $repLaptop ? asset($repLaptop->image) : asset('img/laptops/default.png');
                    $isActive = request('category') == $cat->slug;
                @endphp
                <a href="{{ route('laptops', ['category' => $cat->slug]) }}" class="group flex flex-col items-center gap-4 transition-all">
                    <div class="w-24 h-24 md:w-36 md:h-36 rounded-full overflow-hidden bg-[#FEF0E0] flex items-center justify-center p-4 transition-all duration-500 shadow-xl {{ $isActive ? 'ring-4 ring-primary ring-offset-4 ring-offset-white scale-110' : 'hover:scale-105' }}">
                        <img src="{{ $thumbImage }}" alt="{{ $cat->name }}" class="w-full h-full object-contain transition-transform duration-700 group-hover:scale-110">
                    </div>
                    <span class="text-[10px] md:text-xs font-black uppercase tracking-widest text-center {{ $isActive ? 'text-primary' : 'text-slate-400 group-hover:text-primary' }}">{{ $cat->name }}</span>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- LAPTOPS INVENTORY --}}
<section class="section bg-darker min-h-screen relative overflow-hidden pt-10">
    {{-- Ambient Background Glows --}}
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-primary/10 blur-[120px] rounded-full"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-primary/5 blur-[120px] rounded-full"></div>

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
                                    <p class="text-xs font-bold text-gray-200">{{ $laptop->ram }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                                    <i class="fa-solid fa-hard-drive text-xs"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] text-gray-500 uppercase font-bold">Storage</p>
                                    <p class="text-xs font-bold text-gray-200">{{ $laptop->ssd }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-6 border-t border-slate-800">
                            <div>
                                <p class="text-[10px] text-gray-500 uppercase font-bold mb-1">Our Price</p>
                                <p class="text-2xl font-black text-white">
                                    <span class="text-primary text-sm">$</span>{{ number_format($laptop->price) }}
                                </p>
                            </div>
                            <a href="https://wa.me/96176507040?text=I'm%20interested%20in%20the%20{{ urlencode($laptop->brand . ' ' . $laptop->model) }}" 
                               class="w-12 h-12 rounded-xl bg-slate-800 flex items-center justify-center text-primary hover:bg-primary hover:text-white transition-all duration-300 shadow-lg">
                                <i class="fa-brands fa-whatsapp text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if($laptops->isEmpty())
            <div class="text-center py-20">
                <i class="fa-solid fa-laptop-slash text-6xl text-slate-800 mb-6"></i>
                <h3 class="text-2xl font-bold text-white mb-2">No Laptops Found</h3>
                <p class="text-gray-500">Try selecting a different brand or clearing the filters.</p>
                <a href="{{ route('laptops') }}" class="inline-block mt-6 text-primary hover:underline font-bold">
                    View All Brands
                </a>
            </div>
        @endif
    </div>
</section>

@endsection
