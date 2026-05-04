@extends('layouts.app')

@section('title', ($laptop->category?->name ?? '') . ' ' . ($laptop->laptopModel?->name ?? '') . ' ' . $laptop->model . ' - Alpha Soft')
@section('meta_description', 'Buy ' . ($laptop->category?->name ?? '') . ' ' . ($laptop->laptopModel?->name ?? '') . ' ' . $laptop->model . ' at Alpha Soft. Check specifications and order via WhatsApp.')

@section('content')

{{-- PRODUCT SECTION --}}
<section style="background-color: #020617; min-height: 100vh; padding: 120px 0 80px; position: relative; overflow: hidden;">
    {{-- Ambient Background Glows --}}
    <div style="position: absolute; top: -100px; right: 10%; width: 500px; height: 500px; background-color: rgba(6,182,212,0.15); filter: blur(150px); border-radius: 50%;"></div>
    
    <div class="container" style="position: relative; z-index: 1;">
        
        {{-- BACK BUTTON --}}
        <a href="{{ route('laptops') }}" style="display: inline-flex; align-items: center; gap: 8px; color: #94a3b8; text-decoration: none; font-weight: 600; margin-bottom: 40px; transition: color 0.3s ease;"
           onmouseover="this.style.color='#06b6d4';" onmouseout="this.style.color='#94a3b8';">
            <i class="fa-solid fa-arrow-left"></i> Back to Laptops
        </a>

        <div style="display: flex; flex-wrap: wrap; gap: 60px; align-items: center;">
            {{-- IMAGE COLUMN --}}
            <div style="flex: 1; min-width: 300px;">
                <div style="background-color: #ffffff; border-radius: 2rem; padding: 40px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(255,255,255,0.1); position: relative;">
                    <img src="{{ asset($laptop->image) }}" alt="{{ $laptop->model }}" style="width: 100%; height: auto; object-fit: contain; max-height: 500px;">
                    <div style="position: absolute; top: 30px; left: 30px;">
                        <span style="padding: 8px 20px; border-radius: 9999px; background-color: #020617; border: 1px solid #1e293b; font-size: 12px; font-weight: 800; color: #06b6d4; text-transform: uppercase; letter-spacing: 0.1em; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.3);">
                            {{ $laptop->category?->name }}
                        </span>
                    </div>
                </div>
            </div>

            {{-- DETAILS COLUMN --}}
            <div style="flex: 1; min-width: 300px;">
                <h1 style="font-size: 2.5rem; font-weight: 800; color: #ffffff; margin-bottom: 20px; line-height: 1.2;">
                    {{ $laptop->laptopModel?->name }} {{ $laptop->model }}
                </h1>
                
                <div style="margin-bottom: 40px;">
                    <p style="font-size: 14px; color: #64748b; text-transform: uppercase; font-weight: 700; margin-bottom: 5px;">Our Price</p>
                    <p style="font-size: 3rem; font-weight: 900; color: #06b6d4; margin: 0; line-height: 1;">
                        <span style="font-size: 1.5rem; vertical-align: super;">$</span>{{ number_format($laptop->price ?? 0) }}
                    </p>
                </div>

                {{-- SPECS GRID --}}
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 20px; margin-bottom: 40px;">
                    <div style="background-color: rgba(15,23,42,0.6); border: 1px solid #1e293b; padding: 20px; border-radius: 1rem;">
                        <i class="fa-solid fa-microchip" style="color: #06b6d4; font-size: 24px; margin-bottom: 15px; display: block;"></i>
                        <p style="font-size: 11px; color: #64748b; text-transform: uppercase; font-weight: 800; margin: 0 0 5px;">RAM</p>
                        <p style="font-size: 16px; font-weight: 700; color: #e2e8f0; margin: 0;">{{ $laptop->ram ?? 'N/A' }}</p>
                    </div>
                    
                    <div style="background-color: rgba(15,23,42,0.6); border: 1px solid #1e293b; padding: 20px; border-radius: 1rem;">
                        <i class="fa-solid fa-hard-drive" style="color: #06b6d4; font-size: 24px; margin-bottom: 15px; display: block;"></i>
                        <p style="font-size: 11px; color: #64748b; text-transform: uppercase; font-weight: 800; margin: 0 0 5px;">Storage</p>
                        <p style="font-size: 16px; font-weight: 700; color: #e2e8f0; margin: 0;">{{ $laptop->storage ?? $laptop->ssd ?? 'N/A' }}</p>
                    </div>

                    @if($laptop->processor)
                    <div style="background-color: rgba(15,23,42,0.6); border: 1px solid #1e293b; padding: 20px; border-radius: 1rem;">
                        <i class="fa-solid fa-bolt" style="color: #06b6d4; font-size: 24px; margin-bottom: 15px; display: block;"></i>
                        <p style="font-size: 11px; color: #64748b; text-transform: uppercase; font-weight: 800; margin: 0 0 5px;">Processor</p>
                        <p style="font-size: 16px; font-weight: 700; color: #e2e8f0; margin: 0;">{{ $laptop->processor }}</p>
                    </div>
                    @endif
                </div>

                {{-- DESCRIPTION --}}
                @if($laptop->details)
                <div style="margin-bottom: 40px;">
                    <h3 style="font-size: 18px; font-weight: 700; color: #ffffff; margin-bottom: 15px;">About this laptop</h3>
                    <p style="color: #94a3b8; line-height: 1.6; font-size: 15px;">
                        {{ $laptop->details }}
                    </p>
                </div>
                @endif

                {{-- CALL TO ACTION --}}
                <div style="padding-top: 30px; border-top: 1px solid #1e293b;">
                    <a href="https://wa.me/96176507040?text=I'm%20interested%20in%20the%20{{ urlencode(($laptop->category?->name ?? '') . ' ' . ($laptop->laptopModel?->name ?? '') . ' ' . $laptop->model) }}" 
                       style="display: flex; align-items: center; justify-content: center; gap: 15px; width: 100%; padding: 20px; border-radius: 1rem; background: linear-gradient(135deg, #25D366, #128C7E); color: #ffffff; font-size: 1.2rem; font-weight: 800; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 10px 25px rgba(37, 211, 102, 0.3);"
                       onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 15px 30px rgba(37, 211, 102, 0.4)';"
                       onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 25px rgba(37, 211, 102, 0.3)';">
                        <i class="fa-brands fa-whatsapp" style="font-size: 1.5rem;"></i> Order on WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- RELATED LAPTOPS --}}
@if($relatedLaptops && $relatedLaptops->count() > 0)
<section style="background-color: #0f172a; padding: 80px 0; border-top: 1px solid #1e293b;">
    <div class="container">
        <h2 style="font-size: 2rem; font-weight: 800; color: #ffffff; margin-bottom: 40px; text-align: center;">More from <span style="color: #06b6d4;">{{ $laptop->category?->name }}</span></h2>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 30px;">
            @foreach($relatedLaptops as $related)
                <div style="background-color: rgba(2,6,23,0.6); border: 1px solid #1e293b; border-radius: 2rem; overflow: hidden; transition: all 0.3s ease; max-width: 350px; margin: 0 auto; width: 100%;">
                    <a href="{{ route('laptop.show', $related->id) }}" style="position: relative; background-color: #ffffff; height: 200px; display: flex; align-items: center; justify-content: center; padding: 30px; text-decoration: none; display: block;">
                        <img src="{{ asset($related->image) }}" alt="{{ $related->brand }} {{ $related->model }}" 
                             style="width: 100%; height: 100%; object-fit: contain; transition: transform 0.3s ease;"
                             onmouseover="this.style.transform='scale(1.1)';" onmouseout="this.style.transform='scale(1)';">
                    </a>
                    <div style="padding: 25px;">
                        <a href="{{ route('laptop.show', $related->id) }}" style="text-decoration: none; display: block; margin-bottom: 15px;">
                            <h3 style="font-size: 1rem; font-weight: 700; color: #ffffff; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; transition: color 0.3s ease;"
                                onmouseover="this.style.color='#06b6d4';" onmouseout="this.style.color='#ffffff';">
                                {{ $related->laptopModel?->name }} {{ $related->model }}
                            </h3>
                        </a>
                        <div style="display: flex; align-items: center; justify-content: space-between; padding-top: 15px; border-top: 1px solid #1e293b;">
                            <p style="font-size: 1.25rem; font-weight: 900; color: #ffffff; margin: 0;">
                                <span style="color: #06b6d4; font-size: 12px;">$</span>{{ number_format($related->price ?? 0) }}
                            </p>
                            <a href="https://wa.me/96176507040?text=I'm%20interested%20in%20the%20{{ urlencode(($related->category?->name ?? '') . ' ' . ($related->laptopModel?->name ?? '') . ' ' . $related->model) }}" 
                               style="width: 40px; height: 40px; border-radius: 10px; background-color: #1e293b; display: flex; align-items: center; justify-content: center; color: #06b6d4; text-decoration: none; transition: all 0.3s ease;">
                                <i class="fa-brands fa-whatsapp" style="font-size: 18px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
