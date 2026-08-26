@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')

<div class="container mt-5">

    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>

            <input
                type="text"
                name="title"
                class="form-control"
                value="{{ old('title', $task->title) }}"
            >

            @error('title')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <div class="mb-3">
            <label>Description</label>

            <textarea
                name="description"
                class="form-control"
                rows="5"
            >{{ old('description', $task->description) }}</textarea>

            @error('description')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <div class="mb-3">
            <label>Status</label>

            <select name="status" class="form-control">

                <option value="Pending"
                    {{ old('status', $task->status) == 'Pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="In Progress"
                    {{ old('status', $task->status) == 'In Progress' ? 'selected' : '' }}>
                    In Progress
                </option>

                <option value="Completed"
                    {{ old('status', $task->status) == 'Completed' ? 'selected' : '' }}>
                    Completed
                </option>

            </select>
        </div>


        <div class="mb-3">
            <label>Priority</label>

            <select name="priority" class="form-control">

                <option value="Low"
                    {{ old('priority', $task->priority) == 'Low' ? 'selected' : '' }}>
                    Low
                </option>

                <option value="Medium"
                    {{ old('priority', $task->priority) == 'Medium' ? 'selected' : '' }}>
                    Medium
                </option>

                <option value="High"
                    {{ old('priority', $task->priority) == 'High' ? 'selected' : '' }}>
                    High
                </option>

            </select>
        </div>


        <div class="mb-3">
            <label>Due Date</label>

            <input
                type="date"
                name="due_date"
                class="form-control"
                value="{{ old('due_date', $task->due_date) }}"
            >

            @error('due_date')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">
            Update Task
        </button>

        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection