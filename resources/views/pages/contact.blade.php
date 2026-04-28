@extends('layouts.app')

@section('title', 'Contact Us')
@section('meta_description', 'Contact Computronix SARL in Zahlé, Lebanon. Call 08 812 964 or WhatsApp +961 3 243 504 for Alpha Soft demos and support.')

@section('content')

<section class="page-hero" id="contact-hero">
    <div class="page-hero-bg"></div>
    <div class="container page-hero-content">
        <span class="section-tag">Get In Touch</span>
        <h1>Contact Us</h1>
        <p>Have a question or want to request a demo? Reach out to our team — we're based in Zahlé and ready to help.</p>
    </div>
</section>

<section class="section" id="contact-section">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-info">
                <h2>Let's Work Together</h2>
                <p>Whether you need Alpha Soft installed, hardware support, or just have a question — our friendly team is one message away.</p>

                <div class="info-item">
                    <div class="info-icon"><i class="fa-solid fa-location-dot"></i></div>
                    <div class="info-text">
                        <strong>Visit Our Office</strong>
                        <span>Ksara, Hrawi Buildings, Zahlé, Lebanon</span>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon"><i class="fa-solid fa-phone"></i></div>
                    <div class="info-text">
                        <strong>Call Us</strong>
                        <span>08 812 964 &nbsp;|&nbsp; +961 3 243 504</span>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon"><i class="fa-solid fa-envelope"></i></div>
                    <div class="info-text">
                        <strong>Email</strong>
                        <span>ctx2002@hotmail.com</span>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon"><i class="fa-brands fa-instagram"></i></div>
                    <div class="info-text">
                        <strong>Instagram</strong>
                        <span>@computronix_sarl</span>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon"><i class="fa-solid fa-clock"></i></div>
                    <div class="info-text">
                        <strong>Working Hours</strong>
                        <span>Monday – Saturday: 8:00 AM – 7:00 PM</span>
                    </div>
                </div>

                <a href="https://wa.me/9613243504" target="_blank" rel="noopener" class="btn btn-primary" style="margin-top:1.5rem;display:inline-flex;" id="contact-whatsapp-btn">
                    <i class="fa-brands fa-whatsapp"></i> Chat on WhatsApp
                </a>
            </div>

            <div class="contact-form-card">
                @if(session('success'))
                    <div class="alert-success"><i class="fa-solid fa-circle-check"></i> {{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ route('contact.send') }}" id="contact-form">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Your name" value="{{ old('name') }}" required>
                            @error('name')<span style="color:#F87171;font-size:.8rem;">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" class="form-control" placeholder="+961 ..." value="{{ old('phone') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="you@example.com" value="{{ old('email') }}" required>
                        @error('email')<span style="color:#F87171;font-size:.8rem;">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject *</label>
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="e.g. Alpha Soft Demo Request" value="{{ old('subject') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" class="form-control" rows="5" placeholder="Tell us how we can help..." required>{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;" id="contact-submit-btn">
                        <i class="fa-solid fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
