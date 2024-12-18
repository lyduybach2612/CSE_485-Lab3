@extends('layout.parent')
@section('title', 'Edit Title')
@section('content')
<div class="container">
    <h1>Edit Task</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" required value="{{$task->title}}">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required>{{$task->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="long_description">Long description:</label>
            <textarea class="form-control" required id="long_description" name="long_description">{{$task->long_description}}</textarea>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" value="1" 
            {{ $task->completed ? 'checked' : '' }} class="form-check-input" id="completed" name="completed">
            <label class="form-check-label" for="completed">Completed</label>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/tasks" class="btn btn-danger">Back</a>
    </form>
</div>

@endsection