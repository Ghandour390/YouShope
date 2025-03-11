;

<?php $__env->startSection('content'); ?>

    

<div class="row">

    <?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="col-xs-18 col-sm-6 col-md-3">

            <div class="thumbnail">

                <img src="<?php echo e($produit->image); ?>" alt="">

                <div class="caption">

                    <h4><?php echo e($produit->name); ?></h4>

                    <p><?php echo e($produit->description); ?></p>

                    <p><strong>Prix: </strong> <?php echo e($produit->prix); ?>$</p>

                    <p class="btn-holder"><a href="<?php echo e(route('add.to.cart', $produit->id)); ?>" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>

                </div>

            </div>

        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>

    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Youcode\Desktop\YouShope\resources\views/client/produits.blade.php ENDPATH**/ ?>