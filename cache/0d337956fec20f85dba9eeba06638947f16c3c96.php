
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>
    <script src="js/search.js"></script>
    <script src="js/main.js"></script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\digWand\views/index.blade.php ENDPATH**/ ?>