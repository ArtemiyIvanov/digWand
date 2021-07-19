<?php
      namespace config;
  ?>
;

<?php $__env->startSection('title', 'Оформление заказа'); ?>

<?php $__env->startSection('content'); ?>

    <?php for($i=0; $i < count($arItems);$i++): ?>
        Название: <?php echo e($arItems[$i]['name']); ?></br>
        Кол-во: <?php echo e($qty[$i]); ?>

        Цена: <?php echo e($qty[$i]*(float)$arItems[$i]['price']); ?></br>
    <?php endfor; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\digWand\views/order.blade.php ENDPATH**/ ?>