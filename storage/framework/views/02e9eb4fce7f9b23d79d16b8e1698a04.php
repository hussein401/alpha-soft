<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="<?php echo e(app()->getLocale() == 'ar' ? 'rtl' : 'ltr'); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title><?php echo $__env->yieldContent('title', 'Home'); ?> | Computronix SARL</title>

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>?v=<?php echo e(time()); ?>">

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="<?php echo e(app()->getLocale() == 'ar' ? 'rtl' : ''); ?>">


<nav class="navbar">
    <div class="container nav-container">
        <a href="<?php echo e(route('home')); ?>" class="nav-brand">
            <div class="nav-logo" style="background: transparent; overflow: hidden;">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Computronix Logo" style="width: 100%; height: 100%; object-fit: contain;">
            </div>
            <div class="brand-text">
                <span class="brand-name">Computronix <span>SARL</span></span>
            </div>
        </a>

        <div class="nav-links">
            <a href="<?php echo e(Request::is('alpha-soft') ? '#services-section' : route('alpha-soft').'#services-section'); ?>" class="nav-link">Services</a>
            <a href="<?php echo e(Request::is('alpha-soft') ? '#products-section' : route('alpha-soft').'#products-section'); ?>" class="nav-link">Products</a>
            <a href="<?php echo e(route('laptops')); ?>" class="nav-link">Laptops</a>
            <a href="<?php echo e(Request::is('alpha-soft') ? '#about' : route('alpha-soft').'#about'); ?>" class="nav-link">About</a>
            <a href="<?php echo e(Request::is('alpha-soft') ? '#contact-section' : route('alpha-soft').'#contact-section'); ?>" class="nav-link">Contact</a>
            
            <a href="<?php echo e(Request::is('alpha-soft') ? '#chat-section' : route('alpha-soft').'#chat-section'); ?>" class="nav-btn">Ask AI</a>
        </div>
    </div>
</nav>


<main>
    <?php echo $__env->yieldContent('content'); ?>
    </main>



<script>
    // Global Scripts
</script>

<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\alpha-soft\resources\views\layouts\app.blade.php ENDPATH**/ ?>