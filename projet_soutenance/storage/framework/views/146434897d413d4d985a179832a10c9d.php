
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Détails des Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <!-- Bouton de retour -->
        <div class="mb-4">
            <button onclick="history.back()" class="bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg">
                &larr; Retour
            </button>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Détails des Produits</h2>
            <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Nom</th>
                        <th class="py-3 px-6 text-left">Description</th>
                        <th class="py-3 px-6 text-left">Prix</th>
                        <th class="py-3 px-6 text-left">Stock</th>
                        <th class="py-3 px-6 text-left">Catégorie</th>
                        <th class="py-3 px-6 text-left">Image</th>   
                        <th class="py-3 px-6 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-3 px-6"><?php echo e($product->id); ?></td>
                        <td class="py-3 px-6"><?php echo e($product->name); ?></td>
                        <td class="py-3 px-6"><?php echo e($product->description); ?></td>
                        <td class="py-3 px-6"><?php echo e($product->price); ?> €</td>
                        <td class="py-3 px-6"><?php echo e($product->stock); ?></td>
                        <td class="py-3 px-6"><?php echo e($product->category); ?></td>
                        <td class="py-3 px-6">
                            <?php if($product->image): ?>
                                <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="Image du produit" width="100" class="rounded">
                            <?php else: ?>
                                Aucune image
                            <?php endif; ?>
                        </td>
                        <td class="py-3 px-6">
                            <form action="<?php echo e(route('fournisseur.show', $product->id)); ?>" method="">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded">Lire Plus</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <!-- Liens de pagination -->
            <div class="mt-4">
                <?php echo e($products->links()); ?>

            </div> 
        </div>   
    </div>   
</body>
</html>

<?php echo $__env->make('fournisseur.Style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\resources\views/fournisseur/show.blade.php ENDPATH**/ ?>