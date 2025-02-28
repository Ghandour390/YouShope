<?php $__env->startSection('title', 'Catalogue'); ?>
<?php $__env->startSection('content'); ?>
    <?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="bg-white shadow-lg rounded-lg p-6">
            <img src="<?php echo e(url('storage/'. $produit->image)); ?>" alt="<?php echo e($produit->title); ?>" class="w-full h-48 object-cover rounded-md mb-4">
            <h2 class="text-xl font-semibold text-gray-800"><?php echo e($produit->title); ?></h2>
            <p class="text-gray-600"><?php echo e(Str::limit($produit->description, 120)); ?></p>
            <p class="text-lg font-bold text-blue-600 mt-2"><?php echo e($produit->price); ?> €</p>
            <div class="flex gap-2">
                <form action="<?php echo e(url('/products/view')); ?>" method="POST" class="mt-4">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 p-8" >View</button>
                    <input type="hidden" name="product" value="<?php echo e($produit->id); ?>">
                </form>
                <form action="" method="POST" class="mt-4">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-md hover:bg-green-700 p-8">Add to Cart</button>
                    <input type="hidden" name="product" value="<?php echo e($produit->id); ?>">
                </form>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Youcode\Desktop\YouShope\resources\views/client/produits.blade.php ENDPATH**/ ?>