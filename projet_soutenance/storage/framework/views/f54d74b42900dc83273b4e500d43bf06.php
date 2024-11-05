<?php if(backpack_auth()->check()): ?>
<div class="<?php echo e(backpack_theme_config('classes.sidebar')); ?>" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <a class="navbar-brand fs-6 text-decoration-none text-uppercase" href="<?php echo e(url(backpack_theme_config('home_link'))); ?>" title="<?php echo e(backpack_theme_config('project_name')); ?>">
            <?php echo backpack_theme_config('project_logo'); ?>

        </a>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="init">
        <div class="simplebar-mask">
            <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content">
                <div class="simplebar-content">
                    <?php echo $__env->make(backpack_view('inc.sidebar_content'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </ul>
</div>
<?php endif; ?>

<?php $__env->startPush('before_scripts'); ?>
  <script type="text/javascript">
    // Save default sidebar class
    let sidebar = document.querySelector('.sidebar');

    // Recover sidebar state
    sidebar.classList.toggle('hide', sessionStorage.getItem('sidebar-collapsed') === '1');
  </script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('after_scripts'); ?>
  <script>
      // Store sidebar state
      document.querySelector('.header-toggler').addEventListener('click', function() {
        sessionStorage.setItem('sidebar-collapsed', Number(sidebar.classList.contains('hide')));
        crud?.table?.fixedHeader.adjust();
      });
  </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\vendor/backpack/theme-coreuiv4/resources/views/inc/sidebar.blade.php ENDPATH**/ ?>