<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Todo</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .todo-item {
            display: flex;
            justify-content: space-between;
        }

        .todo-item p {
            display: inline-block;
            font-size: 1.5rem;
            margin-bottom: 10px;
            width: 80%;
        }

        .flex-center {
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 300px;
        }

        .text-line-through {
            text-decoration: line-through;
        }

    </style>
</head>

<body>
    <div class="container pt-5">
        <h1 class="display-4 text-center mb-5">Todos App</h1>


        @if (session()->has('success'))
        <div class="alert alert-success w-75 mx-auto">
            {{ session()->get('success')}}
        </div>
        @endif
        <div class="card mx-auto w-75">
            <div class="card-header pb-0">
                <a href="/" class="text-dark" style="font-size: 2rem"><i class="fa fa-home"></i></a>
                <a href="/todos/create" class="btn btn-success btn-sm float-right">Add Todo</a>
            </div>
            <div class="card-body">

                @forelse ($todos as $todo)
                <div class="todo-item border-bottom mb-2">

                    <div class="w-75">
                        <a href="/todos/makeCompleted/{{ $todo->id }}" class="mr-2 
                    
                            @if($todo->finished)
                            text-success
                            @else
                            text-secondary
                            @endif
                            "><i class="fa fa-check"></i></a>
                        <p class="
                            @if($todo->finished)
                            text-line-through
                            @endif
                            ">{{ $todo->description }}</p>
                    </div>

                    {{-- <form action="" class="d-inline-block">
                    <button type="submit" class="btn btn-info btn-sm float-right">Edit</button>
                    </form> --}}

                    <div class="actions">
                        <a href="/todos/edit/{{ $todo->id }}" class="btn btn-info btn-sm">Edit</a>
                        <form action="/todos/delete/{{ $todo->id }}" class="d-inline-block" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="d-flex flex-center ">
                    <h3 class="">No Todos</h3>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</body>

</html>
