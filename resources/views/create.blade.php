<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Todo</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>

    </style>
</head>

<body>
    <div class="container pt-5">
        <h1 class="display-4 text-center mb-5">Add Todo</h1>

        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger w-50 mx-auto" role="alert">
            {{$error}}
        </div>
        @endforeach
        @endif
        <form action="/todos/store" method="POST">
            @csrf
            <div class="card w-50 mx-auto p-3">
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" class="form-control" placeholder="What's in your mind?">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm">Add Todo</button>
                </div>
            </div>
        </form>

    </div>
</body>

</html>
