<?php $__env->startSection('content'); ?>

    <div class="container">
        <br/>
        <div class="col-md-12">
            <a class="btn btn-primary btn-lg" href="<?php echo e(route('article.edit', $article->id)); ?>" role="button">Update
                article</a>
        </div>
        <div class="col-md-12">
            <h2><?php echo e($article->name); ?></h2>
            <?php $__currentLoopData = $article->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <small><a href="<?php echo e(route('categories.show', $category->id)); ?>"><?php echo e($category->name); ?></a></small>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <br/>
            <small><b><?php echo e($article->user->name); ?></b></small>
            <br/>
            <h7><?php echo e($article->created_at->format('d-m-Y')); ?></h7>
            <p><?php echo e($article->content); ?></p>


        </div>


        <hr>

        <div class="col-md-12">
            <form method="POST" action="javascript:send();">
                <?php echo csrf_field(); ?>

                <input name="author" id="author" placeholder="Author" class="form-control"><br/>
                <textarea name="content" id="content" placeholder="Content" class="form-control"></textarea><br/>
                <input hidden name="article_id" id="article_id" value="<?php echo e($article->id); ?>">
                <button class="btn btn-primary" id="add_comment">Add Comment</button>
            </form>

            <script>
                $(function () {
                    $('#add_comment').click(function () {
                        //Считываем сообщение из поля ввода с id mess_to_add
                        var author = $("#author").val();
                        var content = $("#content").val();
                        var article_id = "<?php echo e($article->id); ?>";
                        var token = "<?php echo e(csrf_token()); ?>";
                        var date = new Date();
                        // Отсылаем паметры
                        $.ajax({
                            type: "POST",
                            url: "<?php echo e(route('commentary.store')); ?>",
                            data: {"author": author,
                                "content": content,
                                "article_id": article_id,
                                "_token": token},
                            success: function (data) {
                                $("#commentaries").append(' <h3>'+author+'</h3>\n' +
                                    '                    <small><b>'+date.getDate()+'-'+(date.getMonth()+1)+'-'+date.getFullYear()+'</b></small>\n' +
                                    '                    <p>'+content+'</p>');
                                console.log(data);
                                $("#author").val('');
                                $("#content").val('');
                            }
                        });

                    });
                });
            </script>
        </div>
        <div class="clearfix"></div>

        <div class="col-md-12">
            <div id="commentaries">
                <?php $__currentLoopData = $commentaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commentary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h3><?php echo e($commentary->author); ?></h3>
                    <small><b><?php echo e($commentary->created_at->format('d-m-Y')); ?></b></small>
                    <p><?php echo e($commentary->content); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="clearfix"></div>

    </div> <!-- /container -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>