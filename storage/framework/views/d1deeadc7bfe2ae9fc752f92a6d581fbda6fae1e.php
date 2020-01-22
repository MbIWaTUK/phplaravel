<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Albums</title>
</head>
<div>
<div class="container">
    <?php if(Session::has('flash_message_update')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('flash_message_update')); ?>

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
    <form method="POST" >
        <?php echo e(csrf_field()); ?>



        <div class="col-sm-4">
            <label>Author<input name="author" type="text" class="form-control" value="<?php echo e(old('author') ?: $album->author); ?>"></label>
        </div>
        <div class="col-sm-4">
            <label for="name">Name</label><input id="name" name="name" type="text" class="form-control"  value="<?php echo e(old('name') ?: $album->name); ?>">
        </div>
        <div class="col-sm-4">
            <button type="submit" class="btn btn-success">Сохранить</button>
        </div>
    </form>
    <div class="col-sm-4">
        <a class="btn btn-primary" href="/albums">К списку</a>
    </div>
</div>

</div>
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>