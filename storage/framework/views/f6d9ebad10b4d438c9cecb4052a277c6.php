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


<section class="section bg-darker min-h-screen relative overflow-hidden">
    
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-primary/10 blur-[120px] rounded-full"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-primary/5 blur-[120px] rounded-full"></div>

    <div class="container relative">
        
        <div class="mb-16">
            <div class="max-w-5xl mx-auto">
                <div class="bg-slate-900/60 backdrop-blur-xl border border-slate-800 rounded-[2.5rem] p-3 md:p-4 shadow-2xl">
                    <div class="flex flex-wrap md:flex-nowrap items-center justify-center gap-2 overflow-x-auto pb-2 md:pb-0 scrollbar-hide">
                        
                        <a href="<?php echo e(route('laptops')); ?>" 
                           class="flex-shrink-0 flex items-center gap-3 px-6 py-4 rounded-[1.8rem] transition-all duration-300 <?php echo e(!request()->has('category') ? 'bg-primary text-white shadow-lg' : 'text-gray-400 hover:bg-slate-800/50 hover:text-white'); ?>">
                            <i class="fa-solid fa-border-all text-sm"></i>
                            <span class="font-bold whitespace-nowrap">All Brands</span>
                        </a>

                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="hidden md:block w-px h-8 bg-slate-800 mx-1"></div>
                            <a href="<?php echo e(route('laptops', ['category' => $cat->slug])); ?>" 
                               class="flex-shrink-0 flex items-center gap-3 px-6 py-4 rounded-[1.8rem] transition-all duration-300 <?php echo e(request('category') == $cat->slug ? 'bg-primary text-white shadow-lg' : 'text-gray-400 hover:bg-slate-800/50 hover:text-white'); ?>">
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
                                <i class="fa-solid <?php echo e($icon); ?> text-sm"></i>
                                <span class="font-bold whitespace-nowrap"><?php echo e($cat->name); ?></span>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            <?php $__currentLoopData = $laptops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $laptop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="group relative bg-slate-900/40 border border-slate-800 rounded-[2rem] overflow-hidden hover:border-primary/50 transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(0,0,0,0.4)]">
                    
                    <div class="absolute inset-0 backdrop-blur-[2px] opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    
                    
                    <div class="absolute top-6 left-6 z-10">
                        <span class="px-4 py-1.5 rounded-full bg-slate-950/80 border border-slate-800 text-[10px] font-bold text-primary uppercase tracking-widest backdrop-blur-md">
                            <?php echo e($laptop->brand); ?>

                        </span>
                    </div>

                    
                    <div class="relative aspect-[4/3] bg-white overflow-hidden p-8 flex items-center justify-center">
                        <img src="<?php echo e(asset($laptop->image)); ?>" alt="<?php echo e($laptop->brand); ?> <?php echo e($laptop->model); ?>" 
                             class="w-full h-full object-contain transition-transform duration-700 group-hover:scale-110 group-hover:rotate-2">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/5 to-transparent"></div>
                    </div>

                    
                    <div class="p-8 relative">
                        <h3 class="text-lg font-bold text-white mb-6 line-clamp-1 group-hover:text-primary transition-colors">
                            <?php echo e($laptop->model); ?>

                        </h3>

                        <div class="grid grid-cols-2 gap-4 mb-8">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                                    <i class="fa-solid fa-microchip text-xs"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] text-gray-500 uppercase font-bold">RAM</p>
                                    <p class="text-sm font-bold text-gray-200"><?php echo e($laptop->ram); ?></p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                                    <i class="fa-solid fa-hard-drive text-xs"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] text-gray-500 uppercase font-bold">SSD</p>
                                    <p class="text-sm font-bold text-gray-200"><?php echo e($laptop->storage); ?></p>
                                </div>
                            </div>
                        </div>

                        
                        <a href="https://wa.me/9613243504?text=Hello%2C%20I%20am%20interested%20in%20the%20<?php echo e(urlencode($laptop->brand . ' ' . $laptop->model)); ?>%20laptop." 
                           target="_blank"
                           class="flex items-center justify-center gap-3 w-full py-4 rounded-2xl bg-slate-800 border border-slate-700 text-white font-bold hover:bg-primary hover:border-primary hover:shadow-[0_10px_20px_rgba(6,182,212,0.3)] transition-all duration-300">
                            <i class="fa-brands fa-whatsapp text-xl"></i>
                            <span>Order via WhatsApp</span>
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php if($laptops->isEmpty()): ?>
            <div class="text-center py-32">
                <div class="w-24 h-24 bg-slate-900/50 rounded-full flex items-center justify-center mx-auto mb-6 border border-slate-800">
                    <i class="fa-solid fa-laptop-slash text-4xl text-gray-700"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">No Models Found</h3>
                <p class="text-gray-400 mb-10 max-w-md mx-auto">We're currently updating our stock for this brand. Please check back soon or browse other brands.</p>
                <a href="<?php echo e(route('laptops')); ?>" class="btn-primary">View All Laptops</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\alpha-soft\resources\views/pages/laptops.blade.php ENDPATH**/ ?>