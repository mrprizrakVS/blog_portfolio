<?php $__env->startSection('content'); ?>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
        <a class="btn btn-primary btn-lg" href="<?php echo e(route('categories.create')); ?>" role="button">Create category</a>
        <a class="btn btn-primary btn-lg" href="<?php echo e(route('article.create')); ?>" role="button">Create article</a>
        </div>
        <br/>
        <div class="row">
            <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-md-4">
                    <h2><?php echo e($article->name); ?></h2>
                    <p><?php echo e(!empty($article->content) ? $article->content  : null); ?></p>
                    <p><a class="btn btn-secondary" href="<?php echo e(route('article.show', $article->id)); ?>" role="button">View
                            details &raquo;</a></p>
                    <p><a class="btn btn-secondary" href="<?php echo e(route('article.edit', $article->id)); ?>" role="button">Edit article &raquo;</a></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-md-4">
                    <h2>Empty</h2>

                </div>
            <?php endif; ?>

        </div>

        <hr>

    </div> <!-- /container -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>