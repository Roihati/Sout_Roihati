<?php $__env->startSection('meta'); ?>
<meta name="description" content="about for website">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('tittle'); ?>
<title>register</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<!-- Inclure Font Awesome pour les icônes -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha384-oS3vJWv+0UjzB1q6iZ6ztE1xzu4w5Oq3T1ZC1Rv8nGx5iykK0sE7O6ChwdP2K5jK" crossorigin="anonymous">
<style>
    /* Styles pour attirer l'attention */
    body {
        background-color: #f7fafc;
        font-family: 'Arial', sans-serif;
    }

    form {
        max-width: 500px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    x-input-label {
        font-weight: bold;
        color: #333;
    }

    x-text-input {
        width: 100%;
        padding: 10px;
        margin-top: 8px;
        margin-bottom: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        transition: border-color 0.3s;
    }

    x-text-input:focus {
        border-color: #3182ce;
        outline: none;
    }

    .mt-4 {
        margin-top: 16px;
    }

    .flex {
        display: flex;
    }

    .items-center {
        align-items: center;
    }

    .justify-center {
        justify-content: center;
    }

    .justify-end {
        justify-content: flex-end;
    }

    .mt-1 {
        margin-top: 8px;
    }

    .text-gray-600 {
        color: #718096;
    }

    .text-gray-900 {
        color: #1a202c;
    }

    .hover\:text-gray-900:hover {
        color: #1a202c;
    }

    .rounded-md {
        border-radius: 4px;
    }

    .focus\:outline-none:focus {
        outline: none;
    }

    .focus\:ring-2:focus {
        box-shadow: 0 0 0 2px rgba(66, 153, 225, 0.5);
    }

    .focus\:ring-offset-2:focus {
        box-shadow: 0 0 0 4px rgba(66, 153, 225, 0.5);
    }

    .focus\:ring-indigo-500:focus {
        box-shadow: 0 0 0 2px #5a67d8;
    }

    .dark\:text-gray-400 {
        color: #a0aec0;
    }

    .dark\:hover\:text-gray-100:hover {
        color: #f7fafc;
    }

    .dark\:focus\:ring-offset-gray-800:focus {
        box-shadow: 0 0 0 4px rgba(45, 55, 72, 0.5);
    }

    .ms-4 {
        margin-left: 16px;
    }

    x-primary-button {
        background-color: #3182ce;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    x-primary-button:hover {
        background-color: #2c5282;
    }

    /* Icônes des réseaux sociaux */
    .fab {
        transition: color 0.3s;
    }

    .fab:hover {
        color: #3182ce;
    }

    .flex.items-center.justify-center.mt-4 a {
        margin: 0 8px;
        color: #718096;
    }

    .flex.items-center.justify-center.mt-4 a:hover {
        color: #1a202c;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if (isset($component)) {
    $__componentOriginal69dc84650370d1d4dc1b42d016d7226b = $component;
} ?>
<?php if (isset($attributes)) {
    $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b = $attributes;
} ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
    <?php $__env->startComponent($component->resolveView(), $component->data()); ?>
    <?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
        <?php $attributes = $attributes->except(\App\View\Components\GuestLayout::ignoredParameterNames()); ?>
    <?php endif; ?>
    <?php $component->withAttributes([]); ?>
    <form method="POST" action="<?php echo e(route('register')); ?>">
        <?php echo csrf_field(); ?>

        <!-- Name -->
        <div>
            <?php if (isset($component)) {
                $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $component;
            } ?>
            <?php if (isset($attributes)) {
                $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $attributes;
            } ?>
            <?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label', 'data' => ['for' => 'name', 'value' => __('Name')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
            <?php $component->withName('input-label'); ?>
            <?php if ($component->shouldRender()): ?>
                <?php $__env->startComponent($component->resolveView(), $component->data()); ?>
                <?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
                    <?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
                <?php endif; ?>
                <?php $component->withAttributes(['for' => 'name', 'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Name'))]); ?>
                <?php echo $__env->renderComponent(); ?>
            <?php endif; ?>
            <?php if (isset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
                <?php $attributes = $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
                <?php unset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
            <?php endif; ?>
            <?php if (isset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
                <?php $component = $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
                <?php unset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
            <?php endif; ?>
            <?php if (isset($component)) {
                $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component;
            } ?>
            <?php if (isset($attributes)) {
                $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes;
            } ?>
            <?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input', 'data' => ['id' => 'name', 'class' => 'block mt-1 w-full', 'type' => 'text', 'name' => 'name', 'value' => old('name'), 'required' => true, 'autofocus' => true, 'autocomplete' => 'name']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
            <?php $component->withName('text-input'); ?>
            <?php if ($component->shouldRender()): ?>
                <?php $__env->startComponent($component->resolveView(), $component->data()); ?>
                <?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
                    <?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
                <?php endif; ?>
                <?php $component->withAttributes(['id' => 'name', 'class' => 'block mt-1 w-full', 'type' => 'text', 'name' => 'name', 'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('name')), 'required' => true, 'autofocus' => true, 'autocomplete' => 'name']); ?>
                <?php echo $__env->renderComponent(); ?>
            <?php endif; ?>
            <?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
                <?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
                <?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
            <?php endif; ?>
            <?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
                <?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
                <?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
            <?php endif; ?>
            <?php if (isset($component)) {
                $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component;
            } ?>
            <?php if (isset($attributes)) {
                $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes;
            } ?>
            <?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error', 'data' => ['messages' => $errors->get('name'), 'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
            <?php $component->withName('input-error'); ?>
            <?php if ($component->shouldRender()): ?>
                <?php $__env->startComponent($component->resolveView(), $component->data()); ?>
                <?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
                    <?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
                <?php endif; ?>
                <?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('name')), 'class' => 'mt-2']); ?>
                <?php echo $__env->renderComponent(); ?>
            <?php endif; ?>
            <?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
                <?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
                <?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
            <?php endif; ?>
            <?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
                <?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
                <?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
            <?php endif; ?>
        </div>
        <!-- phone-->
        <div>
            <?php if (isset($component)) {
                $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $component;
            } ?>
            <?php if (isset($attributes)) {
                $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $attributes;
            } ?>
            <?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label', 'data' => ['for' => 'phone', 'value' => __('Phone')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
            <?php $component->withName('input-label'); ?>
            <?php if ($component->shouldRender()): ?>
                <?php $__env->startComponent($component->resolveView(), $component->data()); ?>
                <?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
                    <?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
                <?php endif; ?>
                <?php $component->withAttributes(['for' => 'phone', 'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Phone'))]); ?>
                <?php echo $__env->renderComponent(); ?>
            <?php endif; ?>
            <?php if (isset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
                <?php $attributes = $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
                <?php unset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
            <?php endif; ?>
            <?php if (isset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
                <?php $component = $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
                <?php unset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
            <?php endif; ?>
            <?php if (isset($component)) {
                $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component;
            } ?>
            <?php if (isset($attributes)) {
                $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes;
            } ?>
            <?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input', 'data' => ['id' => 'phone', 'class' => 'block mt-1 w-full', 'type' => 'text', 'name' => 'phone', 'value' => old('phone'), 'required' => true, 'autofocus' => true, 'autocomplete' => 'phone']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
            <?php $component->withName('text-input'); ?>
            <?php if ($component->shouldRender()): ?>
                <?php $__env->startComponent($component->resolveView(), $component->data()); ?>
                <?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
                    <?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
                <?php endif; ?>
                <?php $component->withAttributes(['id' => 'phone', 'class' => 'block mt-1 w-full', 'type' => 'text', 'name' => 'phone', 'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('phone')), 'required' => true, 'autofocus' => true, 'autocomplete' => 'phone']); ?>
                <?php echo $__env->renderComponent(); ?>
            <?php endif; ?>
            <?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
                <?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
                <?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
            <?php endif; ?>
            <?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
                <?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
                <?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
            <?php endif; ?>
            <?php if (isset($component)) {
                $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component;
            } ?>
            <?php if (isset($attributes)) {
                $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes;
            } ?>
            <?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error', 'data' => ['messages' => $errors->get('phone'), 'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
            <?php $component->withName('input-error'); ?>
            <?php if ($component->shouldRender()): ?>
                <?php $__env->startComponent($component->resolveView(), $component->data()); ?>
                <?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
                    <?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
                <?php endif; ?>
                <?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('phone')), 'class' => 'mt-2']); ?>
                <?php echo $__env->renderComponent(); ?>
            <?php endif; ?>
            <?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
                <?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
                <?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
            <?php endif; ?>
            <?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
                <?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
                <?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
            <?php endif; ?>
        </div>
        <!-- address -->
        <div>
            <?php if (isset($component)) {
                $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $component;
            } ?>
            <?php if (isset($attributes)) {
                $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $attributes;
            } ?>
            <?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label', 'data' => ['for' => 'address', 'value' => __('Address')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
            <?php $component->withName('input-label'); ?>
            <?php if ($component->shouldRender()): ?>
                <?php $__env->startComponent($component->resolveView(), $component->data()); ?>
                <?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
                    <?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
                <?php endif; ?>
                <?php $component->withAttributes(['for' => 'address', 'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Address'))]); ?>
                <?php echo $__env->renderComponent(); ?>
            <?php endif; ?>
            <?php if (isset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
                <?php $attributes = $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
                <?php unset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
            <?php endif; ?>
            <?php if (isset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
                <?php $component = $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
                <?php unset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
            <?php endif; ?>
            <?php if (isset($component)) {
                $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component;
            } ?>
            <?php if (isset($attributes)) {
                $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes;
            } ?>
            <?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input', 'data' => ['id' => 'address', 'class' => 'block mt-1 w-full', 'type' => 'text', 'name' => 'address', 'value' => old('address'), 'required' => true, 'autofocus' => true, 'autocomplete' => 'address']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
            <?php $component->withName('text-input'); ?>
            <?php if ($component->shouldRender()): ?>
                <?php $__env->startComponent($component->resolveView(), $component->data()); ?>
                <?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
                    <?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
                <?php endif; ?>
                <?php $component->withAttributes(['id' => 'address', 'class' => 'block mt-1 w-full', 'type' => 'text', 'name' => 'address', 'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('address')), 'required' => true, 'autofocus' => true, 'autocomplete' => 'address']); ?>
                <?php echo $__env->renderComponent(); ?>
            <?php endif; ?>
            <?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
                <?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
                <?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
            <?php endif; ?>
            <?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
                <?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
                <?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
            <?php endif; ?>
            <?php if (isset($component)) {
                $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component;
            } ?>
            <?php if (isset($attributes)) {
                $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes;
            } ?>
            <?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error', 'data' => ['messages' => $errors->get('address'), 'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
            <?php $component->withName('input-error'); ?>
            <?php if ($component->shouldRender()): ?>
                <?php $__env->startComponent($component->resolveView(), $component->data()); ?>
                <?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
                    <?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
                <?php endif; ?>
                <?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('address')), 'class' => 'mt-2']); ?>
                <?php echo $__env->renderComponent(); ?>
            <?php endif; ?>
            <?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
                <?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
                <?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
            <?php endif; ?>
            <?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
                <?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
                <?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
            <?php endif; ?>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <?php if (isset($component)) {
                $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $component;
            } ?>
            <?php if (isset($attributes)) {
                $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $attributes;
            } ?>
            <?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label', 'data' => ['for' => 'email', 'value' => __('Email')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
            <?php $component->withName('input-label'); ?>
            <?php if ($component->shouldRender()): ?>
                <?php $__env->startComponent($component->resolveView(), $component->data()); ?>
                <?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
                    <?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
                <?php endif; ?>
                <?php $component->withAttributes(['for' => 'email', 'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Email'))]); ?>
                <?php echo $__env->renderComponent(); ?>
            <?php endif; ?>
            <?php if (isset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
                <?php $attributes = $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
                <?php unset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
            <?php endif; ?>
            <?php if (isset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
                <?php $component = $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
                <?php unset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
            <?php endif; ?>
            <?php if (isset($component)) {
                $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component;
            } ?>
            <?php if (isset($attributes)) {
                $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes;
            } ?>
            <?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input', 'data' => ['id' => 'email', 'class' => 'block mt-1 w-full', 'type' => 'email', 'name' => 'email', 'value' => old('email'), 'required' => true, 'autocomplete' => 'username']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
            <?php $component->withName('text-input'); ?>
            <?php if ($component->shouldRender()): ?>
                <?php $__env->startComponent($component->resolveView(), $component->data()); ?>
                <?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
                    <?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
                <?php endif; ?>
                <?php $component->withAttributes(['id' => 'email', 'class' => 'block mt-1 w-full', 'type' => 'email', 'name' => 'email', 'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('email')), 'required' => true, 'autocomplete' => 'username']); ?>
                <?php echo $__env->renderComponent(); ?>
            <?php endif; ?>
            <?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
                <?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
                <?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
            <?php endif; ?>
            <?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
                <?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
                <?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
            <?php endif; ?>
            <?php if (isset($component)) {
                $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component;
            } ?>
            <?php if (isset($attributes)) {
                $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes;
            } ?>
            <?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error', 'data' => ['messages' => $errors->get('email'), 'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
            <?php $component->withName('input-error'); ?>
            <?php if ($component->shouldRender()): ?>
                <?php $__env->startComponent($component->resolveView(), $component->data()); ?>
                <?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
                    <?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
                <?php endif; ?>
                <?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('email')), 'class' => 'mt-2']); ?>
                <?php echo $__env->renderComponent(); ?>
            <?php endif; ?>
            <?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
                <?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
                <?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
            <?php endif; ?>
            <?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
                <?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
                <?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
            <?php endif; ?>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <?php if (isset($component)) {
                $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $component;
            } ?>
            <?php if (isset($attributes)) {
                $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $attributes;
            } ?>
            <?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label', 'data' => ['for' => 'password', 'value' => __('Password')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
            <?php $component->withName('input-label'); ?>
            <?php if ($component->shouldRender()): ?>
                <?php $__env->startComponent($component->resolveView(), $component->data()); ?>
                <?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
                    <?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
                <?php endif; ?>
                <?php $component->withAttributes(['for' => 'password', 'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Password'))]); ?>
                <?php echo $__env->renderComponent(); ?>
            <?php endif; ?>
            <?php if (isset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
                <?php $attributes = $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
                <?php unset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
            <?php endif; ?>
            <?php if (isset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
                <?php $component = $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
                <?php unset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
            <?php endif; ?>

            <?php if (isset($component)) {
                $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component;
            } ?>
            <?php if (isset($attributes)) {
                $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes;
            } ?>
            <?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input', 'data' => ['id' => 'password', 'class' => 'block mt-1 w-full', 'type' => 'password', 'name' => 'password', 'required' => true, 'autocomplete' => 'new-password']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
            <?php $component->withName('text-input'); ?>
            <?php if ($component->shouldRender()): ?>
                <?php $__env->startComponent($component->resolveView(), $component->data()); ?>
                <?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
                    <?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
                <?php endif; ?>
                <?php $component->withAttributes(['id' => 'password', 'class' => 'block mt-1 w-full', 'type' => 'password', 'name' => 'password', 'required' => true, 'autocomplete' => 'new-password']); ?>
                <?php echo $__env->renderComponent(); ?>
            <?php endif; ?>
            <?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
                <?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
                <?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
            <?php endif; ?>
            <?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
                <?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
                <?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
            <?php endif; ?>

            <?php if (isset($component)) {
                $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component;
            } ?>
            <?php if (isset($attributes)) {
                $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes;
            } ?>
            <?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error', 'data' => ['messages' => $errors->get('password'), 'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
            <?php $component->withName('input-error'); ?>
            <?php if ($component->shouldRender()): ?>
                <?php $__env->startComponent($component->resolveView(), $component->data()); ?>
                <?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
                    <?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
                <?php endif; ?>
                <?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('password')), 'class' => 'mt-2']); ?>
                <?php echo $__env->renderComponent(); ?>
            <?php endif; ?>
            <?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
                <?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
                <?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
            <?php endif; ?>
            <?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
                <?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
                <?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
            <?php endif; ?>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <?php if (isset($component)) {
                $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $component;
            } ?>
            <?php if (isset($attributes)) {
                $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $attributes;
            } ?>
            <?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label', 'data' => ['for' => 'password_confirmation', 'value' => __('Confirm Password')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
            <?php $component->withName('input-label'); ?>
            <?php if ($component->shouldRender()): ?>
                <?php $__env->startComponent($component->resolveView(), $component->data()); ?>
                <?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
                    <?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
                <?php endif; ?>
                <?php $component->withAttributes(['for' => 'password_confirmation', 'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Confirm Password'))]); ?>
                <?php echo $__env->renderComponent(); ?>
            <?php endif; ?>
            <?php if (isset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
                <?php $attributes = $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
                <?php unset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
            <?php endif; ?>
            <?php if (isset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
                <?php $component = $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
                <?php unset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
            <?php endif; ?>

            <?php if (isset($component)) {
                $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component;
            } ?>
            <?php if (isset($attributes)) {
                $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes;
            } ?>
            <?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input', 'data' => ['id' => 'password_confirmation', 'class' => 'block mt-1 w-full', 'type' => 'password', 'name' => 'password_confirmation', 'required' => true, 'autocomplete' => 'new-password']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
            <?php $component->withName('text-input'); ?>
            <?php if ($component->shouldRender()): ?>
                <?php $__env->startComponent($component->resolveView(), $component->data()); ?>
                <?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
                    <?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
                <?php endif; ?>
                <?php $component->withAttributes(['id' => 'password_confirmation', 'class' => 'block mt-1 w-full', 'type' => 'password', 'name' => 'password_confirmation', 'required' => true, 'autocomplete' => 'new-password']); ?>
                <?php echo $__env->renderComponent(); ?>
            <?php endif; ?>
            <?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
                <?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
                <?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
            <?php endif; ?>
            <?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
                <?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
                <?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
            <?php endif; ?>

            <?php if (isset($component)) {
                $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component;
            } ?>
            <?php if (isset($attributes)) {
                $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes;
            } ?>
            <?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error', 'data' => ['messages' => $errors->get('password_confirmation'), 'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
            <?php $component->withName('input-error'); ?>
            <?php if ($component->shouldRender()): ?>
                <?php $__env->startComponent($component->resolveView(), $component->data()); ?>
                <?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
                    <?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
                <?php endif; ?>
                <?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('password_confirmation')), 'class' => 'mt-2']); ?>
                <?php echo $__env->renderComponent(); ?>
            <?php endif; ?>
            <?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
                <?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
                <?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
            <?php endif; ?>
            <?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
                <?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
                <?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
            <?php endif; ?>
        </div>

        <!-- Role -->
        <div class="mt-4">
            <?php if (isset($component)) {
                $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $component;
            } ?>
            <?php if (isset($attributes)) {
                $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $attributes;
            } ?>
            <?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label', 'data' => ['for' => 'role_id']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
            <?php $component->withName('input-label'); ?>
            <?php if ($component->shouldRender()): ?>
                <?php $__env->startComponent($component->resolveView(), $component->data()); ?>
                <?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
                    <?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
                <?php endif; ?>
                <?php $component->withAttributes(['for' => 'role_id']); ?>
                <?php echo $__env->renderComponent(); ?>
            <?php endif; ?>
            <?php if (isset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
                <?php $attributes = $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
                <?php unset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
            <?php endif; ?>
            <?php if (isset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
                <?php $component = $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
                <?php unset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
                <?php endif; ?>Role <?php echo $__env->renderComponent(); ?>
            <?php endif; ?>
            <?php if (isset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
                <?php $attributes = $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
                <?php unset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
            <?php endif; ?>
            <?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
                <?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
                <?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
            <?php endif; ?>
            <select id="role_id" class="block mt-1 w-full" name="role_id">
                <?php $__currentLoopData = App\Models\Role::all();
                $__env->addLoop($__currentLoopData);
                foreach ($__currentLoopData as $row): $__env->incrementLoopIndices();
                    $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($row->id); ?>"><?php echo e($row->libele_role); ?></option>
                <?php endforeach;
                $__env->popLoop();
                $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="<?php echo e(route('login')); ?>">
                <?php echo e(__('Already registered?')); ?>

            </a>

            <?php if (isset($component)) {
                $__componentOriginald411d1792bd6cc877d687758b753742c = $component;
            } ?>
            <?php if (isset($attributes)) {
                $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes;
            } ?>
            <?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button', 'data' => ['class' => 'ms-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
            <?php $component->withName('primary-button'); ?>
            <?php if ($component->shouldRender()): ?>
                <?php $__env->startComponent($component->resolveView(), $component->data()); ?>
                <?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
                    <?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
                <?php endif; ?>
                <?php $component->withAttributes(['class' => 'ms-4']); ?>
                <?php echo e(__('Register')); ?>

                <?php echo $__env->renderComponent(); ?>
            <?php endif; ?>
            <?php if (isset($__attributesOriginald411d1792bd6cc877d687758b753742c)): ?>
                <?php $attributes = $__attributesOriginald411d1792bd6cc877d687758b753742c; ?>
                <?php unset($__attributesOriginald411d1792bd6cc877d687758b753742c); ?>
            <?php endif; ?>
            <?php if (isset($__componentOriginald411d1792bd6cc877d687758b753742c)): ?>
                <?php $component = $__componentOriginald411d1792bd6cc877d687758b753742c; ?>
                <?php unset($__componentOriginald411d1792bd6cc877d687758b753742c); ?>
            <?php endif; ?>
        </div>

        <!-- Icônes des réseaux sociaux -->
        <div class="flex items-center justify-center mt-4">
            <a href="https://www.facebook.com" target="_blank" class="mx-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                <i class="fab fa-facebook fa-2x"></i>
            </a>
            <a href="https://www.whatsapp.com" target="_blank" class="mx-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                <i class="fab fa-whatsapp fa-2x"></i>
            </a>
            <a href="https://www.twitter.com" target="_blank" class="mx-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                <i class="fab fa-twitter fa-2x"></i>
            </a>
            <a href="https://www.linkedin.com" target="_blank" class="mx-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                <i class="fab fa-linkedin fa-2x"></i>
            </a>
        </div>
    </form>
    <?php echo $__env->renderComponent(); ?>

    // il y a une erreur d'une condition
    <?php if (isset($__attributesOriginal)): ?>
        <?php $attributes = $__attributesOriginal; ?>
        <?php unset($__attributesOriginal); ?>
    <?php endif; ?>
    <?php if (isset($__componentOriginal)): ?>
        <?php $component = $__componentOriginal; ?>
        <?php unset($__componentOriginal); ?>
    <?php endif; ?>

    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('script'); ?>
    <script>
        /* Ajoutez vos scripts personnalisés ici */
    </script>
    <?php $__env->stopSection(); ?>
    <?php echo $__env->make('layouts.app_acceil', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\resources\views/auth/register.blade.php ENDPATH**/ ?>