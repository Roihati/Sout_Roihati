<?php echo $__env->make('fournisseur.deconnexion', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('fournisseur.Style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('title', 'Confirmation'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-2xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg border border-gray-300">
        <h1 class="text-3xl font-semibold text-center text-indigo-700 mb-4">Confirmation</h1>
        <p class="text-gray-600 text-center text-lg"><?php echo e(session('success')); ?></p>

        <div class="mt-6 flex justify-between">
            <a href="<?php echo e(route('fournisseur.product')); ?>" class="flex items-center bg-indigo-600 text-white hover:bg-indigo-700 transition duration-300 px-4 py-2 rounded-md shadow-md">
                <i class="fas fa-plus mr-2"></i> Ajouter un autre produit
            </a>

            <a href="<?php echo e(route('fournisseur.list_product')); ?>" class="flex items-center text-indigo-600 hover:text-indigo-800 transition duration-300">
                <i class="fas fa-list mr-1"></i> Détails
            </a>

            <!-- Bouton de retour à la page précédente -->
            <button onclick="history.back()" class="flex items-center bg-gray-300 hover:bg-gray-400 transition duration-300 px-4 py-2 rounded-md shadow-md">
                <i class="fas fa-arrow-left mr-2"></i> Retour
            </button>
        </div>
    </div>
</body>
</html><?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\resources\views/fournisseur/confirmation.blade.php ENDPATH**/ ?>