<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo e(trans('backpack::base.error_page.title', ['error' => $error_number])); ?></title>

        <?php echo $__env->make(backpack_view('inc.theme_styles'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make(backpack_view('inc.styles'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </head>
    <body>
      <?php echo $__env->yieldContent('content'); ?>
    </body>
</html>
<?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\vendor/backpack/theme-coreuiv4/resources/views/errors/blank.blade.php ENDPATH**/ ?>