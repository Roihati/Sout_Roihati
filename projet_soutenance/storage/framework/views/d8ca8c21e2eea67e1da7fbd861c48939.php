<!DOCTYPE html>

<html lang="<?php echo e(app()->getLocale()); ?>" dir="<?php echo e(backpack_theme_config('html_direction')); ?>">

<head>
  <?php echo $__env->make(backpack_view('inc.head'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>

<body class="<?php echo e(backpack_theme_config('classes.body')); ?>">

  <?php echo $__env->make(backpack_view('inc.sidebar'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <div class="wrapper d-flex flex-column min-vh-100 bg-light">
    
    <?php echo $__env->make(backpack_view('inc.main_header'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="app-body flex-grow-1 px-2">

    <main class="main">

       <?php echo $__env->yieldContent('before_breadcrumbs_widgets'); ?>

       <?php echo $__env->renderWhen(isset($breadcrumbs), backpack_view('inc.breadcrumbs'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

       <?php echo $__env->yieldContent('after_breadcrumbs_widgets'); ?>

       <?php echo $__env->yieldContent('header'); ?>

        <div class="container-fluid animated fadeIn">

          <?php echo $__env->yieldContent('before_content_widgets'); ?>

          <?php echo $__env->yieldContent('content'); ?>
          
          <?php echo $__env->yieldContent('after_content_widgets'); ?>

        </div>

    </main>

  </div>

  <footer class="<?php echo e(backpack_theme_config('classes.footer')); ?>">
    <?php echo $__env->make(backpack_view('inc.footer'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </footer>
  </div>

  <?php echo $__env->yieldContent('before_scripts'); ?>
  <?php echo $__env->yieldPushContent('before_scripts'); ?>

  <?php echo $__env->make(backpack_view('inc.scripts'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make(backpack_view('inc.theme_scripts'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php echo $__env->yieldContent('after_scripts'); ?>
  <?php echo $__env->yieldPushContent('after_scripts'); ?>
</body>
</html><?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\vendor/backpack/theme-coreuiv4/resources/views/layouts/top_left.blade.php ENDPATH**/ ?>