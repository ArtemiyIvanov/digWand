
<?php $__env->startSection('script'); ?>
<script>
    var items = <?php echo json_encode($arItems); ?>;
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Интернет-магазин'); ?>

<?php $__env->startSection('headerAdditions'); ?>
<div class="cart">
    <form action="/?a=search" class="search-form">
        <button class="btn-default" type="button">отмена</button>
        <input type="text" class="search-field" name="searchQuery" required="required">
        <button class="btn-search">
            <i class="fas fa-search"></i>
        </button>
    </form>
    <button class="btn-cart" type="button">Корзина</button>
    <div class="cart-block invisible"></div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="products"></div> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('addingJS'); ?>
    <script src="js/search.js"></script>
    <script src="js/main.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\digWand\views/index.blade.php ENDPATH**/ ?>