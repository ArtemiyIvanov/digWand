<?php echo $__env->yieldContent('script'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <header>
        <div class="logo"><a href="./">E-shop</a></div>
        <?php echo $__env->yieldContent('headerAdditions'); ?>
    </header>
    <main>

        <?php echo $__env->yieldContent('content'); ?>

    </main>
    <?php echo $__env->yieldContent('addingJS'); ?>
</body>

</html><?php /**PATH C:\OpenServer\domains\digWand\views/layouts/default.blade.php ENDPATH**/ ?>