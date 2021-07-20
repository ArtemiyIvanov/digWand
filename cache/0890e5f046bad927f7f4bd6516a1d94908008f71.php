<?php
      namespace config;
  ?>


<?php $__env->startSection('title', 'Оформление заказа'); ?>

<?php $__env->startSection('content'); ?>
<form action="" method = "GET">
    
    <?php for($i=0; $i < count($arItems);$i++): ?>
        <p>Название: <?php echo e($arItems[$i]['name']); ?></p>
        
        
    <?php endfor; ?>
    <p>сумма: <?php echo e($sum); ?></p>
    <p>Введите номер телефона для подтверждения заказа:</p>
    <p><input type="tel" name="phone-number" placeholder="+7 (900) 123-45-67" pattern="\+7\s?[\(]{0,1}9[0-9]{2}[\)]"></p>
    <button class="order-btn">Заказать</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\digWand\views/order.blade.php ENDPATH**/ ?>