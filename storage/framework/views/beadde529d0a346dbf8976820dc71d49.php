<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouShop - Accueil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-gray-100">
<!-- Navbar -->
<nav class="bg-gray-900 text-white shadow-md py-4">
    <div class="container mx-auto flex justify-between items-center px-6">
        <!-- Logo -->
        <a href="/" class="text-xl font-bold text-blue-400">YouShop</a>

        <!-- Section centrale -->
        <div class="flex space-x-6">
            <a href="/products" class="hover:text-blue-400 transition">Catalogue</a>
            <a href="#" class="hover:text-blue-400 transition">Panier</a>
        </div>

        <!-- Section utilisateur -->
        <div class="flex items-center space-x-4">
            <?php if(auth()->guard()->check()): ?>
                <div class="relative">
                    <button id="userMenuButton" class="text-white font-semibold focus:outline-none">Hello, <?php echo e(Auth::user()->name ?? 'Guest'); ?></button>
                    <div id="userMenu" class="hidden absolute right-0 mt-2 w-48 bg-gray-700 rounded-lg shadow-lg py-2">
                        <a href="/profile" class="block px-4 py-2 text-white hover:bg-gray-600">Profile</a>
                        <form method="POST" action="<?php echo e(route('logout')); ?>" class="nav-link">
                            <?php echo csrf_field(); ?>
                            <?php if (isset($component)) { $__componentOriginald69b52d99510f1e7cd3d80070b28ca18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.responsive-nav-link','data' => ['href' => route('logout'),'onclick' => 'event.preventDefault();
                                        this.closest(\'form\').submit();']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('logout')),'onclick' => 'event.preventDefault();
                                        this.closest(\'form\').submit();']); ?>
                                <?php echo e(__('Log Out')); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $attributes = $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $component = $__componentOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
                        </form>
                    </div>
                </div>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">Connexion</a>
                <a href="<?php echo e(route('register')); ?>" class="px-4 py-2 border border-blue-400 text-blue-400 rounded-lg hover:bg-blue-500 hover:text-white transition">Inscription</a>
            <?php endif; ?>
        </div>
    </div>
</nav>


<!-- Catalogue de produits -->
<div class="container mx-auto px-6 py-12">
    <h1 class="text-3xl font-bold text-gray-800 mb-6"><?php echo $__env->yieldContent('title'); ?></h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <div>
        <?php echo $__env->yieldContent('view'); ?>
    </div>
</div>

<script>
    document.getElementById("userMenuButton").addEventListener("click", function (event) {
        event.stopPropagation();
        document.getElementById("userMenu").classList.toggle("hidden");
    });

    document.addEventListener("click", function (event) {
        let menu = document.getElementById("userMenu");
        let button = document.getElementById("userMenuButton");
        if (!button.contains(event.target) && !menu.contains(event.target)) {
            menu.classList.add("hidden");
        }
    });
</script>
</body>
</html>
<?php /**PATH C:\Users\Youcode\Desktop\YouShope\resources\views/welcome.blade.php ENDPATH**/ ?>