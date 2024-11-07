<!DOCTYPE html>
<html lang="fr">
    <?php echo $__env->make('fournisseur.deconnexion', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <br>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Tableau de Bord</title>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4 text-center text-blue-600">Tableau de Bord des Abonnements</h2>
        <table class="min-w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 p-4 text-left">Nom du Fournisseur</th>
                    <th class="border border-gray-300 p-4 text-left">Prix (€)</th>
                    <th class="border border-gray-300 p-4 text-left">Durée (mois)</th>
                    <th class="border border-gray-300 p-4 text-left">Date de Création</th>
                    <th class="border border-gray-300 p-4 text-left">Actions</th> <!-- Nouvelle colonne -->
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $abonnements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $abonnement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="hover:bg-gray-100 transition duration-200">
                    <td class="border border-gray-300 p-4"><?php echo e($abonnement->nom_fournisseur); ?></td>
                    <td class="border border-gray-300 p-4 text-green-600 font-semibold"><?php echo e(number_format($abonnement->prix, 2, ',', ' ')); ?> €</td>
                    <td class="border border-gray-300 p-4 text-yellow-600 font-semibold"><?php echo e($abonnement->durée); ?> mois</td>
                    <td class="border border-gray-300 p-4"><?php echo e($abonnement->created_at->format('d/m/Y')); ?></td>
                    <td class="border border-gray-300 p-4 flex space-x-2"> <!-- Flex pour aligner les boutons -->
                        <!-- Bouton Activer -->
                        <form action="<?php echo e(route('fournisseur.dashboard.activate', $abonnement->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <button type="submit" class="btn btn-success">Activer</button>
                        </form>
                        <form action="<?php echo e(route('fournisseur.dashboard.activate', $abonnement->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-3 rounded transition duration-200">
                                Activer
                            </button>
                        </form>

                        <!-- Bouton Désactiver -->
                        <form action="<?php echo e(route('fournisseur.dashboard.deactivate', $abonnement->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded transition duration-200">
                                Désactiver
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</body>
</html>
    
</body>
</html><?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\resources\views/fournisseur/dashboard.blade.php ENDPATH**/ ?>