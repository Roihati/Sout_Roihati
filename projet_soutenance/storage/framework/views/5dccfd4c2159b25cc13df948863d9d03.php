<?php if(backpack_theme_config('show_powered_by') || backpack_theme_config('developer_link')): ?>
    <div class="m-auto ml-auto mr-auto text-muted p-2" style="width: fit-content">
      <?php if(backpack_theme_config('developer_link') && backpack_theme_config('developer_name')): ?>
      <?php echo e(trans('backpack::base.handcrafted_by')); ?> <a target="_blank" rel="noopener" href="<?php echo e(backpack_theme_config('developer_link')); ?>"><?php echo e(backpack_theme_config('developer_name')); ?></a>.
      <?php endif; ?>
      <?php if(backpack_theme_config('show_powered_by')): ?>
      <?php echo e(trans('backpack::base.powered_by')); ?> <a target="_blank" rel="noopener" href="http://backpackforlaravel.com?ref=panel_footer_link">Backpack for Laravel</a>.
      <?php endif; ?>
    </div>
<?php endif; ?><?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\vendor/backpack/theme-coreuiv4/resources/views/inc/footer.blade.php ENDPATH**/ ?>