<?php $__env->startSection('content'); ?>
<div class="d-flex align-items-center" style="height: calc(100vh - 7rem)">
  <div class="container">
    <div class="col-md-6 m-auto">
      <div class="d-flex justify-content-center">
        <h1 class="display-2 mb-0 me-4"><?php echo e($error_number); ?></h1>
        <div>
          <h4 class="pt-3"><?php echo $__env->yieldContent('title'); ?></h4>
          <p class="text-medium-emphasis"><?php echo $__env->yieldContent('description'); ?></p>
          <div class="empty-action">
            <a href="./." class="btn btn-primary">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l14 0"></path><path d="M5 12l6 6"></path><path d="M5 12l6 -6"></path></svg>
              <?php echo e(trans('backpack::base.error_page.button')); ?>

            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make(backpack_view(backpack_user() && backpack_theme_config('layout') ? 'layouts.'.backpack_theme_config('layout') : 'errors.blank'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\vendor/backpack/theme-coreuiv4/resources/views/errors/layout.blade.php ENDPATH**/ ?>