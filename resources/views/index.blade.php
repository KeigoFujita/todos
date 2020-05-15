<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="icons/icon.png" type="image/x-icon">


    <title>Todo</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">

    <style>
        .todo-upper {
            display: flex;
            justify-content: space-between;
        }

        .todo-upper p {
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

        .font-size-1p5 {
            font-size: 1.5rem;
        }

        .font-size-2 {
            font-size: 2rem;
        }

        .font-size-2p5 {
            font-size: 2.5rem;
        }

        .font-size-3 {
            font-size: 3rem;
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
                <a href="/" class="text-dark" style="font-size: 2rem;"><i class="fa fa-home"></i></a>
                <a href="/todos/create" class="btn btn-success btn-sm float-right mt-2">
                    <i class="fa fa-plus mr-1"></i> Add Todo
                </a>
            </div>
            <div class="card-body">

                @forelse ($todos as $todo)
                <div class="todo border-bottom pb-2 mb-2 d-flex justify-content-between">

                    <a href="/todos/makeCompleted/{{ $todo->id }}" class="mr-2 mt-1 
                        
                        @if($todo->finished)
                        text-success
                        @else
                        text-secondary
                        @endif
                        "><i class="fa fa-check"></i></a>

                    <div class="description" style="flex-grow:1;">
                        <p class="mb-0 font-size-1p5
                        @if($todo->finished)
                        text-line-through
                        @endif
                        ">{{ $todo->description }}</p>
                        <div>{{ $todo->present_created_at() }}</div>
                    </div>

                    <div class="actions">
                        <a href="/todos/edit/{{ $todo->id }}" class="btn btn-light text-info font-size-1"
                            data-toggle="tooltip" data-placement="top" title="Edit">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="/todos/delete/{{ $todo->id }}" class="d-inline-block" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light text-danger font-size-1" data-toggle="tooltip"
                                data-placement="top" title="Delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>

                @empty
                <div class="d-flex flex-center ">
                    <h3>No Todos</h3>
                </div>
                @endforelse
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

    </script>
</body>

</html>
