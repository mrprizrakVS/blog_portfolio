<?php $__env->startSection('content'); ?>

    <div class="container">
        <?php echo $__env->make('categories.form', ['article' => isset($categorie) ? $categorie : null], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div> <!-- /container -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>