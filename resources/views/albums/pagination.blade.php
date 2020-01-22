<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Albums</title>

</head>
<body>
<div class="container">
<form action="{{ url('album') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <div class="row">
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" value="{{ old('author') }}" name="author"  placeholder="author" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" value="{{ old('name') }}" name="name"  placeholder="name" class="form-control">
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
    @if (Session::has('flash_message_create'))
        <div class="alert alert-success">{{ Session::get('flash_message_create') }}
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
    @endif
</div>
<div class="container">
    @if (Session::has('flash_message_delete'))
        <div class="alert alert-danger">{{ Session::get('flash_message_delete') }}
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
    @endif
</div>
<div class="container">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
    @foreach($albums as $album)
    <tbody>
    <tr>
        <td>{{ $album->author }}</td>
        <td>{{ $album->name }}</td>
        <td><input class="btn btn-primary" value="Редактировать"  type="button" onclick="location.href='<?echo route('update.show',['album' => $album->id]) ?>'" /></td>
        <td><input class="btn btn-danger" value="Удалить"  type="button" onclick="location.href='<?echo route('delete.show',[ 'album' => $album->id])  ?>'" /></td>
    </tr>
    @endforeach
    </tbody>
</table>
    <div class="container">
        {{ $albums->links('pagination.default')}}
    </div>
</div>
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

