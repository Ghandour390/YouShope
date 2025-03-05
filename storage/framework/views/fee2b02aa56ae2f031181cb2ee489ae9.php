<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Update Category</h4>
            </div>
            <div class="card-body">
                <form id="registerForm" method="POST" action="/admin/categories/update" novalidate>
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="mb-3">
                        <label for="name" class="form-label">Categorie Name</label>
                        <input type="text" class="form-control" value="<?php echo e($categorie->name); ?>" name="name" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Category Description</label>
                        <input type="text" class="form-control" value="<?php echo e($categorie->description); ?>" name="description" id="description" required>
                    </div>
                    <input type="hidden" name="category" value="<?php echo e($categorie->id); ?>">
                    <button type="submit" class="btn btn-warning w-100"><i class="bi bi-pencil"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.bootstrap', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Youcode\Desktop\YouShope\resources\views/admin/categorie_edit.blade.php ENDPATH**/ ?>