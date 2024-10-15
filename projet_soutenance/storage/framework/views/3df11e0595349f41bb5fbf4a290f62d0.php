


<?php $__env->startSection('content'); ?>


<link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<div class="container">
    <h1>User Feedback</h1>

    <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title"><?php echo e($feedback->user->name); ?></h5>
                <p class="card-text"><?php echo e($feedback->comment); ?></p>
                <p class="card-text"><small class="text-muted">Rating: <?php echo e($feedback->rating); ?></small></p>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('client.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('client.deconnexion', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\resources\views/client/index.blade.php ENDPATH**/ ?>