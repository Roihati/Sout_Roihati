<?php echo $__env->make('fournisseur.deconnexion', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container">
    <h2>Passer une Commande</h2>
    <form action="<?php echo e(route('fournisseur.orders.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="supplier_id">Fournisseur</label>
            <select name="supplier_id" id="supplier_id" class="form-control" required>
                <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($supplier->id); ?>"><?php echo e($supplier->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="product_name">Nom du Produit</label>
            <input type="text" name="product_name" id="product_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="quantity">Quantité</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required min="1">
        </div>

        <input type="hidden" name="supermarket_id" value="<?php echo e(auth()->user()->supermarket_id); ?>">

        <button type="submit" class="btn btn-primary">Passer la Commande</button>
    </form>
</div>
<?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\resources\views/fournisseur/orders/create.blade.php ENDPATH**/ ?>