<?php echo $__env->make('fournisseur.deconnexion', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="mt-6 flex justify-start">
        <a href="<?php echo e(route('fournisseur.product')); ?>" class="flex items-center text-indigo-600 hover:text-indigo-800 px-4 py-2 rounded-md bg-white shadow-sm">
            <i class="fas fa-plus mr-2"></i> Ajouter un produit
        </a>
        <div style="text-align: center;">
            <a href="<?php echo e(route('fournisseur.accueil')); ?>" class="flex items-center text-indigo-600 hover:text-indigo-800 px-4 py-2 rounded-md bg-white shadow-sm">
                <i class="fas fa-home"></i> Accueil
            </a>
        </div>
    </div>
    <br>
    <div class="col-md-12">
    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div  class="btn btn-info">
                            Détails des produits
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Description</th>
                                        <th>Prix</th>
                                        <th>Stock</th>
                                        <th>Catégorie</th>
                                        <th>Image</th>   
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($product->id); ?></td>
                                            <td><?php echo e($product->name); ?></td>
                                            <td><?php echo e($product->description); ?></td>
                                            <td><?php echo e($product->price); ?></td>
                                            <td><?php echo e($product->stock); ?></td>
                                            <td><?php echo e($product->category); ?></td>
                                            <td>
                                                <?php if($product->image): ?>
                                                    <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="Image du produit" width="100">
                                                <?php else: ?>
                                                    Aucune image
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                </tbody>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
    
                                    <form action="<?php echo e(route('fournisseur.show', $product->id)); ?>" method="">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-info">Read More</button>
                                    </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>   
</body>
</html>


<?php echo $__env->make('fournisseur.Style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\resources\views/fournisseur/show.blade.php ENDPATH**/ ?>