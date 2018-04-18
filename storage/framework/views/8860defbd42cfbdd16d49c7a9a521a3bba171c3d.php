<form method="POST" action="<?php echo e($article != null ? route('article.update', $article->id) : route('article.store')); ?>">
    <?php echo csrf_field(); ?>

    <?php echo e($article != null ? method_field('PATCH') : null); ?>

    <div class="mb-3">
        <label for="name">Categories </label>
        <select name="categories[]" class="custom-select" multiple>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($category->id); ?>" <?php echo e($article != null ? (in_array($category->id, $array) ? 'selected' : null) : null); ?>><?php echo e($category->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="name">Name </label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Name"
               value="<?php echo e($article != null ? $article->name : old('name')); ?>" required>
    </div>

    <div class="mb-3">
        <label for="content">Content</label>
        <textarea type="text" class="form-control" name="content" id="content" placeholder="Content"><?php echo e($article != null ? $article->content : old('content')); ?></textarea>
    </div>
    <button class="btn btn-primary"><?php echo e($article != null ? 'Update' : 'Create'); ?></button>
</form>



