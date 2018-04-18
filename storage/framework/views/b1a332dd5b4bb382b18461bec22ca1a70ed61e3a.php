<?php $__env->startSection('content'); ?>

    <div class="container">
        <br/>
        <div class="row">
                <div class="col-md-4">
                    <h2><?php echo e($category->name); ?></h2>
                    <h6><?php echo e($category->created_at->format('d-m-Y')); ?></h6>
                    <p><?php echo e(!empty($category->description) ? $category->description  : null); ?></p>

                </div>

            <hr>
        </div>

        <h1>Articles</h1> <br />
        <div class="row">
        <?php $__empty_1 = true; $__currentLoopData = $articles->articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-md-4">
                    <a href="<?php echo e(route('article.show', $article->id)); ?>"><h2><?php echo e($article->name); ?></h2></a>
                    <h6><?php echo e($article->created_at->format('d-m-Y')); ?></h6>
                    <p><?php echo e($article->content); ?></p>

                </div>

                <hr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <h2>Empty</h2>
            <?php endif; ?>

        </div>


    </div> <!-- /container -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>