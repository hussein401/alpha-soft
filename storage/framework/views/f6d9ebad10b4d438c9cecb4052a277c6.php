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
        
        <div class="mb-12">
            <h2 class="text-center text-gray-400 text-sm font-bold uppercase tracking-widest mb-6">Filter by Brand</h2>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="<?php echo e(route('laptops')); ?>" 
                   class="group flex items-center gap-3 px-6 py-3 rounded-2xl border transition-all duration-300 <?php echo e(!request()->has('category') ? 'bg-primary border-primary text-white shadow-[0_0_20px_rgba(6,182,212,0.4)]' : 'bg-slate-900/50 border-slate-800 text-gray-400 hover:border-primary/50 hover:text-white'); ?>">
                    <div class="w-8 h-8 rounded-lg flex items-center justify-center <?php echo e(!request()->has('category') ? 'bg-white/20' : 'bg-slate-800 group-hover:bg-primary/20'); ?>">
                        <i class="fa-solid fa-border-all text-sm"></i>
                    </div>
                    <span class="font-bold tracking-wide">All Brands</span>
                </a>

                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('laptops', ['category' => $cat->slug])); ?>" 
                       class="group flex items-center gap-3 px-6 py-3 rounded-2xl border transition-all duration-300 <?php echo e(request('category') == $cat->slug ? 'bg-primary border-primary text-white shadow-[0_0_20px_rgba(6,182,212,0.4)]' : 'bg-slate-900/50 border-slate-800 text-gray-400 hover:border-primary/50 hover:text-white'); ?>">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center <?php echo e(request('category') == $cat->slug ? 'bg-white/20' : 'bg-slate-800 group-hover:bg-primary/20'); ?>">
                            <?php
                                $icon = 'fa-laptop';
                                if($cat->slug == 'hp') $icon = 'fa-h';
                                if($cat->slug == 'dell') $icon = 'fa-d';
                                if($cat->slug == 'lenovo') $icon = 'fa-l';
                                if($cat->slug == 'asus') $icon = 'fa-a';
                                if($cat->slug == 'sony') $icon = 'fa-s';
                                if($cat->slug == 'toshiba') $icon = 'fa-t';
                                if($cat->slug == 'surface') $icon = 'fa-window-maximize';
                            ?>
                            <i class="fa-solid <?php echo e($icon); ?> text-sm uppercase"></i>
                        </div>
                        <span class="font-bold tracking-wide"><?php echo e($cat->name); ?></span>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            <?php $__currentLoopData = $laptops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $laptop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="service-card group shadow-elegant" style="padding: 0; position: relative; overflow: hidden; border: 1px solid var(--glass-border); transition: var(--transition); display: flex; flex-direction: column; height: 100%; border-radius: 16px; background: rgba(30, 41, 59, 0.4); backdrop-filter: blur(10px);">
                    
                    <a href="https://wa.me/9613243504?text=Hello%2C%20I%20am%20interested%20in%20the%20<?php echo e(urlencode($laptop->brand . ' ' . $laptop->model)); ?>%20laptop." target="_blank" style="position: absolute; top: 1rem; right: 1rem; z-index: 10; background: #25D366; color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 15px rgba(0,0,0,0.3); transition: var(--transition); text-decoration: none;" class="hover:scale-110 hover:bg-green-500">
                        <i class="fa-brands fa-whatsapp" style="font-size: 1.2rem;"></i>
                    </a>

                    
                    <div style="aspect-ratio: 16/10; overflow: hidden; width: 100%; position: relative; background: #ffffff; display: flex; align-items: center; justify-content: center; padding: 1rem;">
                        <img src="<?php echo e(asset($laptop->image)); ?>" alt="<?php echo e($laptop->brand); ?> <?php echo e($laptop->model); ?>" style="width: 100%; height: 100%; object-fit: contain; transition: transform 0.5s ease; filter: drop-shadow(0 5px 10px rgba(0,0,0,0.05));" class="group-hover:scale-105">
                    </div>

                    <div style="padding: 1.5rem; flex-grow: 1; display: flex; flex-direction: column; position: relative; z-index: 2; background: rgba(15, 23, 42, 0.2);">
                        <div style="margin-bottom: 0.75rem;">
                            <span style="font-size: 0.7rem; font-weight: 800; color: var(--primary-cyan); text-transform: uppercase; letter-spacing: 1.5px; background: rgba(6, 182, 212, 0.1); padding: 4px 10px; border-radius: 20px;">
                                <?php echo e($laptop->brand); ?>

                            </span>
                        </div>
                        
                        <h3 style="font-size: 1.2rem; font-weight: 700; color: var(--text-white); margin-bottom: 1.2rem; line-height: 1.4;" class="group-hover:text-primary transition-colors">
                            <?php echo e($laptop->model); ?>

                        </h3>

                        <ul style="list-style: none; padding: 0; margin: 0; color: var(--text-muted); font-size: 0.9rem; line-height: 2; flex-grow: 1;">
                            <li style="display: flex; align-items: center;"><i class="fa-solid fa-microchip" style="width: 25px; font-size: 1rem; opacity: 0.7; color: var(--primary-cyan);"></i> <strong style="color: #ccc; margin-right: 5px;">RAM:</strong> <?php echo e($laptop->ram); ?></li>
                            <li style="display: flex; align-items: center;"><i class="fa-solid fa-hard-drive" style="width: 25px; font-size: 1rem; opacity: 0.7; color: var(--primary-cyan);"></i> <strong style="color: #ccc; margin-right: 5px;">Storage:</strong> <?php echo e($laptop->storage); ?></li>
                            <?php if($laptop->details): ?>
                                <li style="display: flex; align-items: flex-start; margin-top: 5px;"><i class="fa-solid fa-gamepad" style="width: 25px; font-size: 1rem; margin-top: 6px; opacity: 0.7; color: var(--primary-cyan);"></i> <span style="line-height: 1.4;"><strong style="color: #ccc; margin-right: 5px;">Extra:</strong> <?php echo e($laptop->details); ?></span></li>
                            <?php endif; ?>
                        </ul>
                    </div>
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