@extends('layouts.app')

@section('title', 'Task Details')

@section('content')

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Task Details</h1>

        <div>
            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">
                Edit
            </a>

            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                Back to Tasks
            </a>
        </div>
    </div>

    <div class="card">

        <div class="card-body">

            <h2 class="card-title">
                {{ $task->title }}
            </h2>

            <hr>

            <p>
                <strong>Description:</strong>
            </p>

            <p>
                {{ $task->description }}
            </p>

            <p>
                <strong>Status:</strong>
                {{ $task->status }}
            </p>

            <p>
                <strong>Priority:</strong>
                {{ $task->priority }}
            </p>

            <p>
                <strong>Due Date:</strong>
                {{ $task->due_date }}
            </p>

            <p>
                <strong>Created:</strong>
                {{ $task->created_at }}
            </p>

            <p>
                <strong>Last Updated:</strong>
                {{ $task->updated_at }}
            </p>

        </div>

    </div>

</div>

@endsection