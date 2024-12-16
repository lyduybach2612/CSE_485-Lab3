@extends('layout.parent')
@section('title', 'Task list')
@section('content')
<h2 class="text-center text-uppercase text-dark">Task List</h2>
@if (session('success'))
<div class="text-success mb-2">{{session('success')}}</div>
@endif
<table class="table">
    <thead>
        <tr>
            <th scope="col">Index</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">State</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
        <tr>
            <th scope="row">{{$i++}}</th>
            <td>{{$task->title}}</td>
            <td>{{$task->description}}</td>
            @if($task->completed)
            <td>Completed</td>
            @else
            <td>Uncompleted</td>
            @endif
            <td class="" style="white-space:nowrap">
                <a class="d-inline" href="/tasks/{{$task->id}}"><i class="bi bi-eye-fill me-1"></i></a>
                <a class="d-inline" href="/tasks/{{$task->id}}/edit"><i class="bi bi-pencil-fill me-1"></i></a>


                <button type="button" class="btn p-0 text-danger " data-bs-toggle="modal" data-bs-target="#deleteModal" style="border: none; background: none;">
                    <i class="bi bi-trash-fill"></i>
                </button>
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete this task</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure to delete this task?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{route('tasks.destroy', $task->id)}}" method='post' class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>


{{$tasks->links('pagination::bootstrap-5')}}


@endsection