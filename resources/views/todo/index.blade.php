@extends('admin.master')
@section('content')

<a class="btn btn-primary" href="{{ route('todo.create') }}">create a new todo</a>

<hr>
<h3>Todo List</h3>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">settings</th>

    </tr>
    </thead>
    <tbody>
    @foreach($todos as $todo)
    <tr>
        <th scope="row"></th>
        <td>{{$todo->name}}</td>
        <td>
            <form action="{{route('todo.destroy',$todo->id)}}" method="post" >
                <a href="{{route('todo.edit',$todo->id)}}" class="btn btn-primary">edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">delete</button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

@endsection
