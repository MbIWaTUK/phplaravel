<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Albums</title>
    </head>
    <body>

        <ul>
            <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>Автор: <?php echo e($album->author); ?></li>
                <li>Название альбома: <?php echo e($album->name); ?></li></br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>

    </body>
</html>
