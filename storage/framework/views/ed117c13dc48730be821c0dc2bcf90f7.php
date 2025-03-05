<?php $__env->startSection('content'); ?>
            <div>
                <?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
     <?php endif; ?>
            </div>
    <div>
        <!-- Button trigger modal -->
        <div>
            <button type="button" class="btn btn-primary mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                ajoute produit
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-light text-dark dark-mode">
                    <div class="modal-header border-0">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="registerForm" method="POST" action="/admin/produits/create"  enctype="multipart/form-data" novalidate>
                            <?php echo csrf_field(); ?>
                            <div class="input-group mb-3 border-2">
                                <label class="input-group-text" for="inputGroupFile01">Upload Image</label>
                                <input type="file" name="image" class="form-control" id="inputGroupFile01">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control" name="description" id="description" required>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">$Prix</label>
                                <input type="number" class="form-control" name="prix" id="prix" required>
                            </div>
                            <div class="mb-3">
                                <label for="quantitue" class="form-label">quantitue</label>
                                <input type="number" class="form-control" name="quantitue" id="quantitue" required>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Categorie</label>
                                <select class="form-select" name="categorie" id="categorie">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($categorie->id); ?>" ><?php echo e($categorie->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <input type="hidden" class="form-control" name="user" id="user" value="<?php echo e(Auth::user()->id); ?>" required>
                            <button type="submit" class="btn btn-primary w-100">Create</button>
                        </form>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-wrap justify-content-xl-center d-flex" style="width: 100%; gap: 20px">
            <table class="table table-hover table-bordered text-center align-middle">
                <thead class="table-dark">
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">name</th>
                    <th scope="col">Prix</th>
                    <th scope="col">quantitue</th>
                    <th scope="col">Categorie</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody class="table-light">
                <?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td style="width: 10%"><img src="<?php echo e(url('/storage/' . $produit->image)); ?>"></td>
                        <td><strong><?php echo e($produit->name); ?></strong></td>
                        <td>$<?php echo e($produit->prix); ?></td>
                        <td><span class="badge bg-primary"><?php echo e($produit->quantitue); ?></span></td>
                        
                        <td><span class="badge bg-primary"><?php echo e($produit->categorie->name); ?></span></td>
                        <td>
                            <form action="<?php echo e(url('/admin/produit/get')); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i> Update
                                </button>
                                <input type="hidden" name="product" value="<?php echo e($produit->id); ?>">
                            </form>

                            <form action="<?php echo e(url('/admin/produit/delete')); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                                <input type="hidden" name="produit" value="<?php echo e($produit->id); ?>">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.bootstrap', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Youcode\Desktop\YouShope\resources\views/admin/produits.blade.php ENDPATH**/ ?>