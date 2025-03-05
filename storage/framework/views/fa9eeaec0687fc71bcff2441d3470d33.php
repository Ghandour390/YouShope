;

<?php $__env->startSection('content'); ?>
    <div>
        <!-- Button trigger modal -->
        <div>
            <button type="button" class="btn btn-primary mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                ajoute categorie
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-light text-dark dark-mode">
                    <div class="modal-header border-0">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Categorie</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="registerForm" method="POST" action="categories/create" novalidate>
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <label for="name" class="form-label">Categorie Name</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Category Description</label>
                                <input type="text" class="form-control" name="description" id="description" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Create</button>
                        </form>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
            
        <div class="flex-wrap justify-content-xl-center  d-flex" style="width: 100%; gap: 20px">
            <table class="table table-hover table-bordered text-center align-middle">
                <thead class="table-dark">
                <tr>
                    <th scope="col">Categorie Name</th>
                    <th scope="col">Categorie Description</th>
                    <th scope="col">suCategories</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody class="table-light">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><strong><?php echo e($categorie->name); ?></strong></td>
                        <td><?php echo e($categorie->description); ?></td>
                        <td>
                            <?php if($categorie->sucategories->isNotEmpty()): ?>
                                <span class="badge bg-success"><?php echo e($categorie->sucategories->count()); ?> SuCategories</span>
                                <ul class="list-unstyled m-0 p-0">
                                    <?php $__currentLoopData = $categorie->sucategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sucategorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td> <?php echo e($sucategorie->name); ?></td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php else: ?>
                                <span class="badge bg-secondary">No SubCategories</span>
                            <?php endif; ?>
                        </td> 
                         <td>
                            <form action="/admin/categories/edit/<?php echo e($categorie->id); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i> Update
                                </button>
                               
                            </form>

                            

                            <form action="<?php echo e(route('admin.categories.destroy')); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                
                                 <input type="hidden" name="id" value="<?php echo e($categorie->id); ?>">
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                                
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
<?php echo $__env->make('dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Youcode\Desktop\YouShope\resources\views/admin/categories.blade.php ENDPATH**/ ?>