<x-app-layout>
<div class="container mt-5">
    <h1 class="mb-4">Create New Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        {{-- Title --}}
        <div class="mb-3">
            <label class="form-label">Title</label>

            <input
                type="text"
                name="title"
                class="form-control"
                value="{{ old('title') }}"
            >

            @error('title')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label class="form-label">Description</label>

            <textarea
                name="description"
                class="form-control"
                rows="5"
            >{{ old('description') }}</textarea>

            @error('description')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label class="form-label">Status</label>

            <select name="status" class="form-select">
                <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="In Progress" {{ old('status') == 'In Progress' ? 'selected' : '' }}>
                    In Progress
                </option>

                <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>
                    Completed
                </option>
            </select>

            @error('status')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Priority --}}
        <div class="mb-3">
            <label class="form-label">Priority</label>

            <select name="priority" class="form-select">
                <option value="Low" {{ old('priority') == 'Low' ? 'selected' : '' }}>
                    Low
                </option>

                <option value="Medium" {{ old('priority') == 'Medium' ? 'selected' : '' }}>
                    Medium
                </option>

                <option value="High" {{ old('priority') == 'High' ? 'selected' : '' }}>
                    High
                </option>
            </select>

            @error('priority')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Due Date --}}
        <div class="mb-4">
            <label class="form-label">Due Date</label>

            <input
                type="date"
                name="due_date"
                class="form-control"
                value="{{ old('due_date') }}"
            >

            @error('due_date')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Create Task
        </button>
    </form>
</div>
</x-app-layout>