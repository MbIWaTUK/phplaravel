<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Albums</title>
</head>
<body>
<textarea rows="4" class="form-control" name="body" id="body"><?php echo e($album->author); ?></textarea>
<textarea rows="4" class="form-control" name="body" id="body"><?php echo e($album->name); ?></textarea>
<button class="btn btn-success">Сохранить</button>
</body>
</html>