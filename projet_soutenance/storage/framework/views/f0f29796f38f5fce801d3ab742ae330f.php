<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" dir="<?php echo e(backpack_theme_config('html_direction')); ?>">
<head>
    <?php echo $__env->make(backpack_view('inc.head'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body class="app flex-row align-items-center">

  <?php echo $__env->yieldContent('header'); ?>

  <div class="container">
  <?php echo $__env->yieldContent('content'); ?>
  </div>

  <footer class="app-footer sticky-footer">
    <?php echo $__env->make(backpack_view('inc.footer'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </footer>

  <?php echo $__env->yieldContent('before_scripts'); ?>
  <?php echo $__env->yieldPushContent('before_scripts'); ?>

  <?php echo $__env->make(backpack_view('inc.scripts'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make(backpack_view('inc.theme_scripts'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php echo $__env->yieldContent('after_scripts'); ?>
  <?php echo $__env->yieldPushContent('after_scripts'); ?>

</body>
</html>
<?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\vendor/backpack/theme-coreuiv4/resources/views/layouts/plain.blade.php ENDPATH**/ ?>