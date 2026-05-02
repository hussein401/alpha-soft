@extends('layouts.app')

@section('title', 'Track Your Repair')

@section('content')
<div class="page-hero">
    <div class="page-hero-bg"></div>
    <div class="container page-hero-content">
        <div class="section-tag animate-in">{{ __('Support Center') }}</div>
        <h1>Track Your <span class="text-gradient">Repair</span></h1>
        <p>{{ __('Enter your Repair ID to see the real-time status of your device in our workshop.') }}</p>
    </div>
</div>

<section class="section">
    <div class="container max-w-4xl">
        <div class="contact-form-card glass p-8 rounded-3xl mb-12 shadow-elegant">
            <form id="repair-track-form" class="flex gap-3 flex-wrap md:flex-nowrap">
                <input 
                    type="text" 
                    id="tracking-id" 
                    placeholder="Enter Repair ID (e.g., CTX-12345)" 
                    class="form-control h-14 bg-background/40 border-primary/20 focus:border-primary/50"
                    required
                >
                <button type="submit" class="btn btn-primary h-14 px-10 shadow-glow whitespace-nowrap">
                    {{ __('Track Status') }}
                </button>
            </form>
            <p class="text-center text-xs text-muted mt-4">
                Try tracking with <span class="text-purple2 font-mono cursor-pointer" onclick="document.getElementById('tracking-id').value='CTX-12345'">CTX-12345</span> for a demo.
            </p>
        </div>

        <div id="repair-status-container" style="display: none;">
            <div class="tracking-timeline animate-in">
                <div class="tracking-line">
                    <div id="tracking-progress-bar" class="tracking-progress" style="width: 0%"></div>
                </div>
                <div class="tracking-steps">
                    <div class="step-item" id="step-received">
                        <div class="step-icon"><i class="fa-solid fa-clock"></i></div>
                        <span class="step-label">{{ __('Received') }}</span>
                    </div>
                    <div class="step-item" id="step-diagnosis">
                        <div class="step-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
                        <span class="step-label">{{ __('Diagnosis') }}</span>
                    </div>
                    <div class="step-item" id="step-repairing">
                        <div class="step-icon"><i class="fa-solid fa-screwdriver-wrench"></i></div>
                        <span class="step-label">{{ __('Repairing') }}</span>
                    </div>
                    <div class="step-item" id="step-testing">
                        <div class="step-icon"><i class="fa-solid fa-check-double"></i></div>
                        <span class="step-label">{{ __('Testing') }}</span>
                    </div>
                    <div class="step-item" id="step-ready">
                        <div class="step-icon"><i class="fa-solid fa-truck-fast"></i></div>
                        <span class="step-label">{{ __('Ready') }}</span>
                    </div>
                </div>
            </div>

            <div class="contact-form-card glass p-6 rounded-2xl border-primary/10 mt-12">
                <h3 class="text-xl font-semibold mb-4 flex items-center gap-2" style="color: var(--white);">
                    <i class="fa-solid fa-shield-check text-blue2"></i>
                    {{ __('Service Details') }}
                </h3>
                <div class="grid md:grid-cols-2 gap-6" style="font-size: 0.9rem;">
                    <div class="space-y-4">
                        <div class="flex justify-between border-b border-white/5 pb-2">
                            <span class="text-muted">{{ __('Device') }}</span>
                            <span style="color: var(--white);">MacBook Pro 14" (M2 Pro)</span>
                        </div>
                        <div class="flex justify-between border-b border-white/5 pb-2">
                            <span class="text-muted">{{ __('Reported Issue') }}</span>
                            <span style="color: var(--white);">Battery not charging</span>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between border-b border-white/5 pb-2">
                            <span class="text-muted">{{ __('Estimated Ready Date') }}</span>
                            <span style="color: var(--white);">Tomorrow, 2:00 PM</span>
                        </div>
                        <div class="flex justify-between border-b border-white/5 pb-2">
                            <span class="text-muted">{{ __('Service Fee') }}</span>
                            <span class="text-gradient font-bold">$45.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    document.getElementById('repair-track-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const id = document.getElementById('tracking-id').value;
        const container = document.getElementById('repair-status-container');
        const progress = document.getElementById('tracking-progress-bar');
        
        if (id === 'CTX-12345') {
            container.style.display = 'block';
            
            // Reset steps
            document.querySelectorAll('.step-item').forEach(s => s.classList.remove('active', 'completed'));
            
            // Animate progress
            setTimeout(() => {
                document.getElementById('step-received').classList.add('completed');
                document.getElementById('step-diagnosis').classList.add('completed');
                document.getElementById('step-repairing').classList.add('active');
                progress.style.width = '50%';
            }, 100);
            
        } else {
            alert('Repair ID not found. Please check your receipt.');
            container.style.display = 'none';
        }
    });
</script>
@endpush

<style>
    .max-w-4xl { max-width: 900px; margin: 0 auto; }
    .mt-12 { margin-top: 3rem; }
    .space-y-4 > * + * { margin-top: 1rem; }
    .flex { display: flex; }
    .justify-between { justify-content: space-between; }
    .items-center { align-items: center; }
    .gap-2 { gap: 0.5rem; }
</style>
@endsection
