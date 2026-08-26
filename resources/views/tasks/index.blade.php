<x-app-layout>
<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>My Tasks</h1>

        <a href="{{ route('tasks.create') }}" class="btn btn-primary">
            + Create Task
        </a>
    </div>

    {{-- Success message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <form action="{{ route('tasks.index') }}" method="GET" class="mb-4">

    <div class="row align-items-end">

        {{-- Status Filter --}}
        <div class="col-md-4">
            <label for="status" class="form-label">
                Filter by Status
            </label>

            <select name="status" id="status" class="form-control">

                <option value="">All Statuses</option>

                <option value="Pending"
                    {{ request('status') == 'Pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="In Progress"
                    {{ request('status') == 'In Progress' ? 'selected' : '' }}>
                    In Progress
                </option>

                <option value="Completed"
                    {{ request('status') == 'Completed' ? 'selected' : '' }}>
                    Completed
                </option>

            </select>
        </div>


        {{-- Priority Filter --}}
        <div class="col-md-4">
            <label for="priority" class="form-label">
                Filter by Priority
            </label>

            <select name="priority" id="priority" class="form-control">

                <option value="">All Priorities</option>

                <option value="Low"
                    {{ request('priority') == 'Low' ? 'selected' : '' }}>
                    Low
                </option>

                <option value="Medium"
                    {{ request('priority') == 'Medium' ? 'selected' : '' }}>
                    Medium
                </option>

                <option value="High"
                    {{ request('priority') == 'High' ? 'selected' : '' }}>
                    High
                </option>

            </select>
        </div>


        {{-- Filter Button --}}
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">
                Filter
            </button>
        </div>

    </div>

</form>



    <div class="table-responsive">

        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Priority</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach($tasks as $task)

                    <tr>

                        <td>{{ $task->id }}</td>

                        <td>{{ $task->title }}</td>

                        <td>{{ $task->status }}</td>

                        <td>{{ $task->priority }}</td>

                        <td>{{ $task->due_date }}</td>

                        <td>
                             <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info">
    View
</a> 
                            {{-- Edit button --}}
                            <a href="{{ route('tasks.edit', $task->id) }}"
                               class="btn btn-primary btn-sm">
                                Edit
                            </a>

                            {{-- Delete form --}}
                            <form action="{{ route('tasks.destroy', $task->id) }}"
                                  method="POST"
                                  style="display: inline;">

                                @csrf

                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this task?')">
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>
    <div class="mt-4">
    {{ $tasks->appends(request()->query())->links() }}
</div>

</div>
</x-app-layout>

