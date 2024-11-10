<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Ligne de Commande</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
<div class="container mx-auto px-4 py-8">

    <?php if(session()->has('success')): ?>
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(session()->has('error')): ?>
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <h1 class="text-xl font-semibold mb-4">Ajouter une Ligne de Commande</h1>

    <form method="POST" action="<?php echo e(route('fournisseur.lignes.store')); ?>">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="commande_id" value="<?php echo e($commandeId); ?>">

        <div class="mb-4">
            <label for="produit_id" class="block text-sm font-medium text-gray-700">Produit</label>
            <select id="produit_id" name="produit_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                <?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($produit->id); ?>"><?php echo e($produit->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-4">
            <label for="quantite" class="block text-sm font-medium text-gray-700">Quantité</label>
            <input type="number" id="quantite" name="quantite" min="1" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>

        <div class="mb-4">
            <label for="prix_unitaire" class="block text-sm font-medium text-gray-700">Prix Unitaire</label>
            <input type="number" id="prix_unitaire" name="prix_unitaire" step="0.01" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>

        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Ajouter Ligne</button>
    </form>

    <!-- Affichage des lignes de commande -->
    <h2 class="text-lg font-semibold mt-8 mb-4">Lignes de Commande</h2>
    
    <?php if(isset($lignesCommandes) && $lignesCommandes->count() > 0): ?>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Produit</th>
                    <th class="py-2 px-4 border-b">Quantité</th>
                    <th class="py-2 px-4 border-b">Prix Unitaire</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm">
                <?php $__currentLoopData = $lignesCommandes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $ligne): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="<?php echo e(($index % 2 == 0) ? 'bg-gray-100' : 'bg-white'); ?>">
                        <td class="py-3 px-6"><?php echo e($ligne->produit->name); ?></td> <!-- Assurez-vous que la relation est définie -->
                        <td class="py-3 px-6"><?php echo e($ligne->quantite); ?></td>
                        <td class="py-3 px-6"><?php echo e(number_format($ligne->prix_unitaire, 2, ',', ' ')); ?> €</td> <!-- Formatage du prix -->
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucune ligne de commande trouvée.</p>
    <?php endif; ?>

</div>
</body>
</html><?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\resources\views/fournisseur/lignes.blade.php ENDPATH**/ ?>