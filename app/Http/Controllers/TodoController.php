<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TodoController extends Controller
{

    public function index()
    {
        $todos = Todo::all();
        return view('index', [
            'todos' => $todos
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'description' => 'required'
        ]);
        $description = $request->description;

        $todo = new Todo();
        $todo->description = $description;
        $todo->finished = false;
        $todo->save();

        session()->flash('success', 'Todo added successfully');

        return redirect('/todos');
    }

    public function makeCompleted($id)
    {

        $todo = Todo::find($id);

        if ($todo->finished) {
            $todo->finished = false;
        } else {
            $todo->finished = true;
        }

        $todo->save();
        return redirect('/todos');
    }


    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('edit', [
            'todo' => $todo
        ]);
    }


    public function delete($id)
    {

        $todo = Todo::find($id);
        $todo->delete();

        session()->flash('success', 'Todo deleted successfully');
        return redirect('/todos');
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'description' => 'required|max:50|min:3'
        ]);
        $description = $request->description;
        $todo = Todo::find($id);
        $todo->description = $description;
        $todo->save();

        session()->flash('success', 'Todo updated successfully');
        return redirect('/todos');
    }
}