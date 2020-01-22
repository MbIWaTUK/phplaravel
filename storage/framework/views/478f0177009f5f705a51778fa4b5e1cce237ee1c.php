<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Albums</title>

</head>
<body>
<div class="container">
<form action="<?php echo e(url('album')); ?>" method="POST" class="form-horizontal">
        <?php echo e(csrf_field()); ?>


        <div class="row">
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" value="<?php echo e(old('author')); ?>" name="author"  placeholder="author" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" value="<?php echo e(old('name')); ?>" name="name"  placeholder="name" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-success">Добавить запись</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="container">
    <?php if(Session::has('flash_message_create')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('flash_message_create')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
    <?php endif; ?>
</div>
<div class="container">
    <?php if(Session::has('flash_message_delete')): ?>
        <div class="alert alert-danger"><?php echo e(Session::get('flash_message_delete')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
    <?php endif; ?>
</div>
<div class="container">
    <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
</div>
<div class="container">
<table class="table table-striped table-dark table-bordered">
    <thead>
    <tr>
        <th scope="col">Author</th>
        <th scope="col">Name</th>
        <th scope="col"></th>
        <th scope="col">&nbsp;</th>
    </tr>
    </thead>
    <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tbody>
    <tr>
        <td><?php echo e($album->author); ?></td>
        <td><?php echo e($album->name); ?></td>
        <td><input class="btn btn-primary" value="Редактировать"  type="button" onclick="location.href='<?echo route('update.show',['album' => $album->id]) ?>'" /></td>
        <td><input class="btn btn-danger" value="Удалить"  type="button" onclick="location.href='<?echo route('delete.show',[ 'album' => $album->id])  ?>'" /></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
    <div class="container">
        <?php echo e($albums->links('pagination.default')); ?>

    </div>
</div>
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

