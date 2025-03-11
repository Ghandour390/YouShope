<!DOCTYPE html>

<html>

<head>

    <title>Laravel Add To Cart Function - ItSolutionStuff.com</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  

    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">

</head>

<body>

  

<div class="container">

    <div class="row">

        <div class="col-lg-12 col-sm-12 col-12 main-section">

            <div class="dropdown">

                <button type="button" class="btn btn-info" data-toggle="dropdown">

                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger"><?php echo e(count((array) session('cart'))); ?></span>

                </button>

                <div class="dropdown-menu">

                    <div class="row total-header-section">

                        <div class="col-lg-6 col-sm-6 col-6">

                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger"><?php echo e(count((array) session('cart'))); ?></span>

                        </div>

                        <?php $total = 0 ?>

                        <?php $__currentLoopData = (array) session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php $total += $details['prix'] * $details['quantitue'] ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">

                            <p>Total: <span class="text-info">$ <?php echo e($total); ?></span></p>

                        </div>

                    </div>

                    <?php if(session('cart')): ?>

                        <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="row cart-detail">

                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">

                                    <img src="<?php echo e($details['image']); ?>" />

                                </div>

                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">

                                    <p><?php echo e($details['name']); ?></p>

                                    <span class="price text-info"> $<?php echo e($details['price']); ?></span> <span class="count"> Quantity:<?php echo e($details['quantitue']); ?></span>

                                </div>

                            </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php endif; ?>

                    <div class="row">

                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">

                            <a href="<?php echo e(route('cart')); ?>" class="btn btn-primary btn-block">View all</a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

  

<br/>

<div class="container">

  

    <?php if(session('success')): ?>

        <div class="alert alert-success">

          <?php echo e(session('success')); ?>


        </div> 

    <?php endif; ?>

  

    <?php echo $__env->yieldContent('content'); ?>

</div>

  

<?php echo $__env->yieldContent('scripts'); ?>

     

</body>

</html><?php /**PATH C:\Users\Youcode\Desktop\YouShope\resources\views/layouts/layout.blade.php ENDPATH**/ ?>