<?php $__env->startSection('title', 'About Us'); ?>
<?php $__env->startSection('meta_description', 'Computronix SARL — Technology company founded in 1993 in Zahlé, Lebanon. Creators of Alpha Soft POS system.'); ?>

<?php $__env->startSection('content'); ?>

<section class="page-hero" id="about-hero">
    <div class="page-hero-bg"></div>
    <div class="container page-hero-content">
        <span class="section-tag"><?php echo e(__('Our Story')); ?></span>
        <h1><?php echo e(__('About Computronix SARL')); ?></h1>
        <p><?php echo e(__('Over 30 years of revolutionizing digital business in Lebanon — from a local shop in Zahlé to a trusted technology partner for hundreds of businesses.')); ?></p>
    </div>
</section>

<section class="section" id="about-story">
    <div class="container">
        <div class="about-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:4rem;align-items:center;">
            <div>
                <span class="section-tag"><?php echo e(__('Who We Are')); ?></span>
                <h2 style="font-family:var(--font-head);font-size:2rem;font-weight:700;color:var(--white);margin:.75rem 0 1rem;"><?php echo e(__('We Revolutionize Your Digital World')); ?></h2>
                <p style="color:var(--muted);line-height:1.8;margin-bottom:1rem;">Computronix SARL was founded in 1993 in Zahlé, Lebanon — with a mission to bring cutting-edge technology solutions to local businesses. From hardware sales to custom software, we've grown into a full-service technology company.</p>
                <p style="color:var(--muted);line-height:1.8;margin-bottom:1.5rem;">Our flagship product, <strong style="color:var(--purple2);">Alpha Soft</strong>, is a complete POS and business management system trusted by hundreds of businesses across Lebanon. We combine software expertise with hands-on technical support to ensure our clients always get the most from their technology investments.</p>
                <div style="display:flex;gap:2rem;flex-wrap:wrap;">
                    <div>
                        <div style="font-family:var(--font-head);font-size:2rem;font-weight:800;background:linear-gradient(135deg,var(--blue2),var(--purple2));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">30+</div>
                        <div style="font-size:.85rem;color:var(--muted);">Years Experience</div>
                    </div>
                    <div>
                        <div style="font-family:var(--font-head);font-size:2rem;font-weight:800;background:linear-gradient(135deg,var(--blue2),var(--purple2));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">500+</div>
                        <div style="font-size:.85rem;color:var(--muted);">Happy Clients</div>
                    </div>
                    <div>
                        <div style="font-family:var(--font-head);font-size:2rem;font-weight:800;background:linear-gradient(135deg,var(--blue2),var(--purple2));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">1993</div>
                        <div style="font-size:.85rem;color:var(--muted);">Founded</div>
                    </div>
                </div>
            </div>
            <div>
                <div style="background:var(--glass);border:1px solid var(--border);border-radius:var(--radius);padding:2rem;">
                    <h3 style="font-family:var(--font-head);font-size:1.1rem;font-weight:700;color:var(--white);margin-bottom:1.5rem;display:flex;align-items:center;gap:.5rem;"><i class="fa-solid fa-location-dot" style="color:var(--purple2)"></i> Visit Us</h3>
                    <div style="background:rgba(124,58,237,.08);border-radius:12px;padding:1.25rem;margin-bottom:1rem;">
                        <p style="font-size:.9rem;color:var(--muted);line-height:1.6;"><strong style="color:var(--white);">Computronix SARL</strong><br>Ksara, Hrawi Buildings<br>Zahlé, Lebanon</p>
                    </div>
                    <ul style="list-style:none;">
                        <li style="display:flex;align-items:center;gap:.75rem;padding:.6rem 0;border-bottom:1px solid var(--border);font-size:.88rem;color:var(--muted);"><i class="fa-solid fa-phone" style="color:var(--purple2);width:16px;"></i> 08 812 964</li>
                        <li style="display:flex;align-items:center;gap:.75rem;padding:.6rem 0;border-bottom:1px solid var(--border);font-size:.88rem;color:var(--muted);"><i class="fa-brands fa-whatsapp" style="color:#25D366;width:16px;"></i> +961 3 243 504</li>
                        <li style="display:flex;align-items:center;gap:.75rem;padding:.6rem 0;font-size:.88rem;color:var(--muted);"><i class="fa-solid fa-envelope" style="color:var(--blue2);width:16px;"></i> ctx2002@hotmail.com</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-alt" id="timeline">
    <div class="container">
        <div class="section-header">
            <span class="section-tag"><?php echo e(__('Our Journey')); ?></span>
            <h2><?php echo e(__('30 Years of Innovation')); ?></h2>
        </div>
        <div style="max-width:600px;margin:0 auto;">
            <div class="timeline">
                <?php $__currentLoopData = $milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="timeline-item">
                    <div class="timeline-year"><?php echo e($m['year']); ?></div>
                    <div class="timeline-event"><?php echo e(__($m['event'])); ?></div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\alpha-soft\resources\views/pages/about.blade.php ENDPATH**/ ?>