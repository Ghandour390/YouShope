;

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Update SubCategory</h4>
            </div>
            <div class="card-body">
                <form id="registerForm" method="POST" action="/admin/sucategories/update" novalidate>
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="mb-3">
                        <label for="name" class="form-label">SuCategorie Name</label>
                        <input type="text" class="form-control" value="<?php echo e($sucategorie->name); ?>" name="name" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">SuCategorie Description</label>
                        <input type="text" class="form-control" value="<?php echo e($sucategorie->description); ?>" name="description" id="description" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Categorie</label>
                        <select class="form-select" name="categorie_id">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catigorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($catigorie->id); ?>" <?php if($catigorie->id === $sucategorie->categorie->id): ?> selected <?php endif; ?>><?php echo e($catigorie->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <input type="hidden" name="sucategorie" value="<?php echo e($sucategorie->id); ?>">
                    <button type="submit" class="btn btn-warning w-100"><i class="bi bi-pencil"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.bootstrap', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Youcode\Desktop\YouShope\resources\views/admin/sucategorie_edit.blade.php ENDPATH**/ ?>