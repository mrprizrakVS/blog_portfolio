<form method="POST" action="<?php echo e($categorie != null ? route('categories.update', $categorie->id) : route('categories.store')); ?>">
    <?php echo csrf_field(); ?>

    <?php echo e($categorie != null ? method_field('PATCH') : null); ?>

    <div class="mb-3">
        <label for="name">Name </label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Name"
               value="<?php echo e($categorie != null ? $categorie->name : old('name')); ?>" required>

    </div>

    <div class="mb-3">
        <label for="content">Description</label>
        <input type="text" class="form-control" name="description" id="description" placeholder="Description"
               value="<?php echo e($categorie != null ? $categorie->description : old('description')); ?>">
    </div>
    <button class="btn btn-primary"><?php echo e($categorie != null ? 'Update' : 'Create'); ?></button>
</form>



