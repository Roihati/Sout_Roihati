<!-- resources/views/fournisseur/product_list.blade.php -->
<?php echo $__env->make('fournisseur.deconnexion', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<br> 

<?php $__env->startSection('title'); ?>
<div class="mt-6 flex justify-start">
    <a href="<?php echo e(route('fournisseur.product')); ?>" class="flex items-center text-indigo-600 hover:text-indigo-800 px-4 py-2 rounded-md bg-white shadow-sm">
        <i class="fas fa-plus mr-2"></i> Ajouter un produit
    </a>
</div>

<div class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div  class="btn btn-info">Liste des produits</div>
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
                                    <th>Actions</th>
                                    
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
                                           <!-- Image du produit -->
                                            <?php if($product->image): ?>
                                            <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="Image du produit" class="max-w-xs rounded-lg shadow-md" width="100">
                                    
                                        <?php else: ?>
                                            Aucune image
                                        <?php endif; ?>
                                        </td>
                                  <!-- Bouton show -->
                                        <td>
                                            <form action="<?php echo e(route('fournisseur.show', $product->id)); ?>" method="get">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-info">show</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="<?php echo e(route('fournisseur.update', $product->id)); ?>" method="GET">
                                                <?php echo csrf_field(); ?>
                                            
                                                <button type="submit" class="btn btn-primary">Modifier</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="<?php echo e(route('fournisseur.delete', $product->id)); ?>" method="POST" onsubmit="return confirmDelete();">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                                        </td>
                                        
                                   
                                          <!-- message de confirmation de suppression-->
                                        <?php if(session('success')): ?>
                                            <div class="alert alert-success">
                                                <?php echo e(session('success')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
     <script>
                                            function confirmDelete() {
                                                return confirm("Êtes-vous sûr de vouloir supprimer ce produit ?");
                                            }
                                        </script>
</html>

<?php echo $__env->make('fournisseur.Style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\resources\views/fournisseur/list_product.blade.php ENDPATH**/ ?>