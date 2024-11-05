<?php $__env->startSection('meta'); ?>
<meta name="description" content="Contact page for website">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
<title>Contact</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<!-- Inclure Tailwind CSS -->

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="contact-form-section p-6 bg-gray-100 rounded-lg shadow-md">
    <h2 class="text-xl font-bold mb-4 text-center">Formulaire de Contact</h2>
    <p class="text-center text-gray-600 mb-4">Envoyez-nous un message et nous vous répondrons dès que possible.</p>

    <?php if(session('success')): ?>
        <div class="alert alert-success bg-green-200 text-green-800 p-3 rounded mb-4">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('contact.submit')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div>
            <input type="text" name="firstname" placeholder="Prénom" value="<?php echo e(old('firstname', $details['firstname'])); ?>" class="w-full p-3 border border-gray-300 rounded mb-2" />
            <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-red-500"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div>
            <input type="text" name="lastname" placeholder="Nom" value="<?php echo e(old('lastname', $details['lastname'])); ?>" class="w-full p-3 border border-gray-300 rounded mb-2" />
            <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-red-500"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div>
            <input type="email" name="email" placeholder="Email" value="<?php echo e(old('email', $details['email'])); ?>" class="w-full p-3 border border-gray-300 rounded mb-2" />
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-red-500"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div>
            <input type="text" name="phone" placeholder="Téléphone" value="<?php echo e(old('phone', $details['phone'])); ?>" class="w-full p-3 border border-gray-300 rounded mb-2" />
            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-red-500"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div>
            <textarea name="message" placeholder="Message" class="w-full p-3 border border-gray-300 rounded mb-2"><?php echo e(old('message', $details['message'])); ?></textarea>
            <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-red-500"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            ENVOYER
        </button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Contact page loaded');
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_acceil', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\resources\views/contact.blade.php ENDPATH**/ ?>