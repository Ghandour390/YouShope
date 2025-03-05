<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Edit Product</h4>
            </div>
            <div class="card-body">
                <form id="registerForm" method="POST" action="/admin/product/update"  enctype="multipart/form-data" novalidate>
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="input-group mb-3 border-2">
                        <label class="input-group-text" for="inputGroupFile01">Upload Image</label>
                        <input type="file" name="image" class="form-control" id="inputGroupFile01">
                        <div style="width: 10%"><img src="<?php echo e(url('storage/'. $produit->image)); ?>"></div>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" value="<?php echo e($product->name); ?>" name="title" id="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" value="<?php echo e($product->description); ?>" name="description" id="description" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">$Price</label>
                        <input type="number" class="form-control" value="<?php echo e($produit->prix); ?>" name="price" id="price" required>
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" value="<?php echo e($produit->quantitiue); ?>" name="stock" id="stock" required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" name="category" id="category">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($categorie->id); ?>" ><?php echo e($categorie->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <input type="hidden" class="form-control" name="user" id="user" value="<?php echo e(Auth::user()->id); ?>" required>
                    <input type="hidden" class="form-control" name="product" id="product" value="<?php echo e($product->id); ?>" required>
                    <button type="submit" class="btn btn-primary w-100">Update</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.bootstrap', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Youcode\Desktop\YouShope\resources\views/admin/produit_edit.blade.php ENDPATH**/ ?>