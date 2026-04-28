// ===== NAVBAR SCROLL =====
const navbar = document.getElementById('navbar');
window.addEventListener('scroll', () => {
    navbar.classList.toggle('scrolled', window.scrollY > 50);
    document.getElementById('back-to-top').classList.toggle('visible', window.scrollY > 400);
});

// ===== MOBILE MENU =====
const toggle = document.getElementById('nav-toggle');
const links  = document.getElementById('nav-links');
toggle.addEventListener('click', () => {
    links.classList.toggle('open');
    toggle.classList.toggle('active');
});
document.querySelectorAll('.nav-link').forEach(l => {
    l.addEventListener('click', () => { links.classList.remove('open'); toggle.classList.remove('active'); });
});

// ===== BACK TO TOP =====
document.getElementById('back-to-top').addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

// ===== ANIMATE ON SCROLL =====
const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => {
        if (e.isIntersecting) {
            e.target.style.opacity = '1';
            e.target.style.transform = 'translateY(0)';
        }
    });
}, { threshold: 0.1 });

document.querySelectorAll('.feature-card, .module-card, .service-card, .timeline-item, .stat-item').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(30px)';
    el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    observer.observe(el);
});

// ===== THEME TOGGLE =====
const themeToggle = document.getElementById('theme-toggle');
if (themeToggle) {
    const icon = themeToggle.querySelector('i');
    
    // Check local storage or system preference
    const savedTheme = localStorage.getItem('theme');
    const prefersLight = window.matchMedia('(prefers-color-scheme: light)').matches;
    
    if (savedTheme === 'light' || (!savedTheme && prefersLight)) {
        document.documentElement.classList.add('light-mode');
        icon.classList.remove('fa-moon');
        icon.classList.add('fa-sun');
    }
    
    themeToggle.addEventListener('click', () => {
        // Add transition class
        document.documentElement.classList.add('theme-transition');
        
        // Toggle theme
        const isLight = document.documentElement.classList.toggle('light-mode');
        
        // Update icon
        if (isLight) {
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
            localStorage.setItem('theme', 'light');
        } else {
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
            localStorage.setItem('theme', 'dark');
        }
        
        // Remove transition class after animation ends to not slow down hover states later
        setTimeout(() => {
            document.documentElement.classList.remove('theme-transition');
        }, 400); // matches the 0.4s in CSS
    });
}
