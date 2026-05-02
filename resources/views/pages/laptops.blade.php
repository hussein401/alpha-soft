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
<section class="section bg-darker min-h-screen">
    <div class="container">
        <div class="flex flex-col lg:flex-row gap-10">
            
            {{-- SIDEBAR FILTERS --}}
            <aside class="lg:w-1/4">
                <div class="sticky top-32">
                    <div class="mb-8">
                        <h2 class="text-xl font-bold mb-2 flex items-center gap-2">
                            <i class="fa-solid fa-filter text-primary"></i>
                            Filter by Brand
                        </h2>
                        <div class="w-12 h-1 bg-primary rounded-full"></div>
                    </div>

                    <div class="flex flex-col gap-3">
                        {{-- All Brands Tile --}}
                        <a href="{{ route('laptops') }}" 
                           class="flex items-center justify-between p-4 rounded-xl border transition-all duration-300 {{ !request()->has('category') ? 'bg-primary border-primary text-white shadow-lg' : 'bg-slate-900/40 border-slate-800 text-gray-400 hover:border-primary/50 hover:bg-slate-800/60' }}">
                            <div class="flex items-center gap-3">
                                <i class="fa-solid fa-border-all text-lg"></i>
                                <span class="font-bold">All Laptops</span>
                            </div>
                            <span class="text-xs opacity-60">View all</span>
                        </a>

                        @foreach($categories as $cat)
                            <a href="{{ route('laptops', ['category' => $cat->slug]) }}" 
                               class="flex items-center justify-between p-4 rounded-xl border transition-all duration-300 {{ request('category') == $cat->slug ? 'bg-primary border-primary text-white shadow-lg' : 'bg-slate-900/40 border-slate-800 text-gray-400 hover:border-primary/50 hover:bg-slate-800/60' }}">
                                <div class="flex items-center gap-3">
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
                                    <i class="fa-solid {{ $icon }} text-lg"></i>
                                    <span class="font-bold">{{ $cat->name }}</span>
                                </div>
                                <i class="fa-solid fa-chevron-right text-xs opacity-40"></i>
                            </a>
                        @endforeach
                    </div>

                    {{-- Help Card --}}
                    <div class="mt-10 p-6 rounded-2xl bg-gradient-to-br from-slate-900 to-slate-800 border border-slate-800 relative overflow-hidden group">
                        <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:scale-110 transition-transform">
                            <i class="fa-brands fa-whatsapp text-6xl"></i>
                        </div>
                        <h4 class="font-bold mb-2">Need help?</h4>
                        <p class="text-sm text-gray-400 mb-4">Can't find a specific model? Chat with our experts.</p>
                        <a href="https://wa.me/9613243504" target="_blank" class="text-primary font-bold flex items-center gap-2 hover:gap-3 transition-all">
                            WhatsApp Us <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </aside>

            {{-- MAIN CONTENT --}}
            <main class="lg:w-3/4">
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-8">
                    @foreach($laptops as $laptop)
                        <div class="service-card group shadow-elegant" style="padding: 0; position: relative; overflow: hidden; border: 1px solid var(--glass-border); transition: var(--transition); display: flex; flex-direction: column; height: 100%; border-radius: 16px; background: rgba(30, 41, 59, 0.4); backdrop-filter: blur(10px);">
                            {{-- Floating WhatsApp button --}}
                            <a href="https://wa.me/9613243504?text=Hello%2C%20I%20am%20interested%20in%20the%20{{ urlencode($laptop->brand . ' ' . $laptop->model) }}%20laptop." target="_blank" style="position: absolute; top: 1rem; right: 1rem; z-index: 10; background: #25D366; color: white; width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 15px rgba(0,0,0,0.3); transition: var(--transition); text-decoration: none;" class="hover:scale-110 hover:bg-green-500">
                                <i class="fa-brands fa-whatsapp" style="font-size: 1rem;"></i>
                            </a>

                            {{-- Laptop Image --}}
                            <div style="aspect-ratio: 16/10; overflow: hidden; width: 100%; position: relative; background: #ffffff; display: flex; align-items: center; justify-content: center; padding: 1rem;">
                                <img src="{{ asset($laptop->image) }}" alt="{{ $laptop->brand }} {{ $laptop->model }}" style="width: 100%; height: 100%; object-fit: contain; transition: transform 0.5s ease; filter: drop-shadow(0 5px 10px rgba(0,0,0,0.05));" class="group-hover:scale-105">
                            </div>

                            <div style="padding: 1.5rem; flex-grow: 1; display: flex; flex-direction: column; position: relative; z-index: 2; background: rgba(15, 23, 42, 0.2);">
                                <div style="margin-bottom: 0.75rem;">
                                    <span style="font-size: 0.7rem; font-weight: 800; color: var(--primary-cyan); text-transform: uppercase; letter-spacing: 1.5px; background: rgba(6, 182, 212, 0.1); padding: 4px 10px; border-radius: 20px;">
                                        {{ $laptop->brand }}
                                    </span>
                                </div>
                                
                                <h3 style="font-size: 1.1rem; font-weight: 700; color: var(--text-white); margin-bottom: 1.2rem; line-height: 1.4;" class="group-hover:text-primary transition-colors">
                                    {{ $laptop->model }}
                                </h3>

                                <ul style="list-style: none; padding: 0; margin: 0; color: var(--text-muted); font-size: 0.85rem; line-height: 2; flex-grow: 1;">
                                    <li style="display: flex; align-items: center;"><i class="fa-solid fa-microchip" style="width: 25px; font-size: 1rem; opacity: 0.7; color: var(--primary-cyan);"></i> <strong style="color: #ccc; margin-right: 5px;">RAM:</strong> {{ $laptop->ram }}</li>
                                    <li style="display: flex; align-items: center;"><i class="fa-solid fa-hard-drive" style="width: 25px; font-size: 1rem; opacity: 0.7; color: var(--primary-cyan);"></i> <strong style="color: #ccc; margin-right: 5px;">Storage:</strong> {{ $laptop->storage }}</li>
                                    @if($laptop->details)
                                        <li style="display: flex; align-items: flex-start; margin-top: 5px;"><i class="fa-solid fa-gamepad" style="width: 25px; font-size: 1rem; margin-top: 6px; opacity: 0.7; color: var(--primary-cyan);"></i> <span style="line-height: 1.4;"><strong style="color: #ccc; margin-right: 5px;">Extra:</strong> {{ $laptop->details }}</span></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($laptops->isEmpty())
                    <div class="text-center py-20 bg-slate-900/20 rounded-3xl border border-dashed border-slate-800">
                        <i class="fa-solid fa-laptop-slash text-6xl text-gray-700 mb-6"></i>
                        <h3 class="text-2xl font-bold mb-2">No laptops found</h3>
                        <p class="text-gray-400">We don't have any models for this brand right now. Please check back soon!</p>
                        <a href="{{ route('laptops') }}" class="btn-primary mt-6">View all laptops</a>
                    </div>
                @endif
            </main>
        </div>
    </div>
</section>

@endsection
