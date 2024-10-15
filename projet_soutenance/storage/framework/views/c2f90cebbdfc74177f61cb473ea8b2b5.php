<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        
        <?php echo $__env->yieldContent('meta'); ?>

        
        <?php echo $__env->yieldContent('tittle'); ?>

        
        <?php echo $__env->yieldContent('style'); ?>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- bootstrap core css -->
       <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/bootstrap.css')); ?>" />

        <!-- Custom styles for this template -->
       <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet" />
       <!-- responsive style -->
       <link href="<?php echo e(asset('assets/css/responsive.css')); ?>" rel="stylesheet" />


        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>
    <body class="font-sans antialiased">

        
 

        
        <?php echo $__env->yieldContent('content'); ?>

        
        <?php echo $__env->yieldContent('script'); ?>

       <?php echo $__env->make('fournisseur.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


       <script src="<?php echo e(asset('assets/js/jquery-3.4.1.min.js')); ?>"></script>
       <script src="<?php echo e(asset('assets/js/bootstrap.js')); ?>"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
       </script>
       <script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>

    </body>
</html>

<?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\resources\views/client/app_client.blade.php ENDPATH**/ ?>