<?php $__env->startSection('title', 'Our Services'); ?>
<?php $__env->startSection('meta_description', 'Computronix SARL offers Alpha Soft installation, laptop sales, computer accessories, repair, networking, and 24/7 support in Lebanon.'); ?>

<?php $__env->startSection('content'); ?>

<section class="page-hero" id="services-hero">
    <div class="page-hero-bg"></div>
    <div class="container page-hero-content">
        <span class="section-tag">What We Offer</span>
        <h1>Our Services</h1>
        <p>From software to hardware — Computronix SARL is your one-stop technology partner in Lebanon.</p>
    </div>
</section>

<section class="section" id="services-list">
    <div class="container">
        <div class="services-grid">
            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="service-card">
                <div class="service-icon"><i class="fa-solid <?php echo e($s['icon']); ?>"></i></div>
                <h3><?php echo e($s['title']); ?></h3>
                <p><?php echo e($s['desc']); ?></p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<section class="cta-section section-alt">
    <div class="container">
        <div class="cta-box">
            <h2>Need a Service? Let's Talk.</h2>
            <p>Visit us in Zahlé or reach out by phone and WhatsApp — we're ready to help you today.</p>
            <div class="cta-btns">
                <a href="<?php echo e(route('contact')); ?>" class="btn btn-primary" id="services-contact-btn"><i class="fa-solid fa-envelope"></i> Contact Us</a>
                <a href="https://wa.me/9613243504" target="_blank" class="btn btn-outline" id="services-wa-btn"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\alpha-soft\resources\views\pages\services.blade.php ENDPATH**/ ?>