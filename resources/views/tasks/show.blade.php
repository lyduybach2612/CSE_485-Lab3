@extends('layout.parent')
@section('title', 'Specific Task')
@section('content')
    <div class="container">
        <h1>Specific Task</h1>
        <p><strong>Title:</strong> {{ $task->title }}</p>
        <p><strong>Description:</strong> {{ $task->description }}</p>
        <p><strong>Long Description:</strong> {{ $task->long_description }}</p>
        <p><strong>State:</strong> {{ $task->completed ? 'Completed' : 'Uncompleted' }}</p>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
