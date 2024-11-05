<header class="<?php echo e(backpack_theme_config('classes.header')); ?>">
    <div class="container-fluid d-flex justify-content-between">
        <button style="margin-inline-start: -14px" class="header-toggler" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()"  aria-label="<?php echo e(trans('backpack::base.toggle_navigation')); ?>">
            <svg class="icon icon-lg" viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'>
                <path stroke='#869AB8' stroke-width='2.25' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22' />
            </svg>
        </button>

        <?php echo $__env->make(backpack_view('inc.menu'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</header>
<?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\vendor/backpack/theme-coreuiv4/resources/views/inc/main_header.blade.php ENDPATH**/ ?>