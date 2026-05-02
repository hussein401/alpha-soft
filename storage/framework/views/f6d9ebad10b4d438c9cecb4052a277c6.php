<?php $__env->startSection('title', 'Laptops Inventory'); ?>
<?php $__env->startSection('meta_description', 'Browse our large inventory of laptops. From student laptops to gaming machines, we have the perfect fit for you.'); ?>

<?php $__env->startSection('content'); ?>


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


<section class="section bg-darker">
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php $__currentLoopData = $laptops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $laptop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="service-card group shadow-elegant" style="padding: 2rem; position: relative; overflow: hidden; border: 1px solid var(--glass-border); transition: var(--transition);">
                    
                    <a href="https://wa.me/9613243504?text=Hello%2C%20I%20am%20interested%20in%20the%20<?php echo e(urlencode($laptop['brand'] . ' ' . $laptop['model'])); ?>%20laptop." target="_blank" style="position: absolute; top: 1rem; right: 1rem; z-index: 10; background: #25D366; color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 15px rgba(0,0,0,0.3); transition: var(--transition); text-decoration: none;" class="hover:scale-110">
                        <i class="fa-brands fa-whatsapp" style="font-size: 1.2rem;"></i>
                    </a>

                    <div style="font-size: 0.8rem; font-weight: 800; color: var(--primary-cyan); text-transform: uppercase; margin-bottom: 0.5rem; letter-spacing: 1px;">
                        <?php echo e($laptop['brand']); ?>

                    </div>
                    
                    <h3 style="font-size: 1.4rem; font-weight: 700; color: var(--text-white); margin-bottom: 1rem; line-height: 1.3;">
                        <?php echo e($laptop['model']); ?>

                    </h3>

                    <ul style="list-style: none; padding: 0; margin: 0; color: var(--text-muted); font-size: 0.95rem; line-height: 1.8;">
                        <li><i class="fa-solid fa-microchip text-primary" style="width: 20px;"></i> <strong>RAM:</strong> <?php echo e($laptop['ram']); ?></li>
                        <li><i class="fa-solid fa-hard-drive text-primary" style="width: 20px;"></i> <strong>Storage:</strong> <?php echo e($laptop['storage']); ?></li>
                        <?php if($laptop['details']): ?>
                            <li><i class="fa-solid fa-gamepad text-primary" style="width: 20px;"></i> <strong>Extra:</strong> <?php echo e($laptop['details']); ?></li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
        <div class="mt-16 text-center">
            <p class="text-gray-400 mb-6">Didn't find what you're looking for? Our stock updates frequently.</p>
            <a href="https://wa.me/9613243504" target="_blank" class="btn-primary shadow-elegant">
                <i class="fa-brands fa-whatsapp mr-2"></i> Contact us for more models
            </a>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\alpha-soft\resources\views/pages/laptops.blade.php ENDPATH**/ ?>