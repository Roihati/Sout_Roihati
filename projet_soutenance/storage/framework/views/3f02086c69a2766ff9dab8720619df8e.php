<li class="nav-item">
    <a <?php echo e($attributes->merge(['class' => 'nav-link', 'href' => $link])); ?>>
        <?php if($icon != null): ?><i class="nav-icon <?php echo e($icon); ?>"></i><?php endif; ?>
        <?php if($title != null): ?> <span><?php echo e($title); ?></span><?php endif; ?>
    </a>
</li>
<?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\vendor/backpack/theme-coreuiv4/resources/views/components/menu-dropdown-item.blade.php ENDPATH**/ ?>