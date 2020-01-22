<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Albums</title>
</head>
<body>
<div>
<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">Author</th>
        <th scope="col">Name</th>
    </tr>
    </thead>
    <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tbody>
    <tr>
        <td><a href="albums/<?php echo e($album->id); ?>"><?php echo e($album->author); ?></a></td>
        <td><a href="albums/<?php echo e($album->id); ?>"><?php echo e($album->name); ?></a></td>

    </tr>
    </tbody>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

</div>
</body>
</html>
