<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    public function show(Task $task)
{
        Gate::authorize('view', $task); 

    return view('tasks.show', compact('task'));
}
    // Show all tasks

    // Show create form
    public function create()
    {
        Gate::authorize('create', Task::class);

        return view('tasks.create');
    }
    public function index(Request $request)
{
    $query = auth()->user()->tasks();

    if ($request->status) {
        $query->where('status', $request->status);
    }

    if ($request->priority) {
        $query->where('priority', $request->priority);
    }

    if ($request->search) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    $tasks = $query->paginate(10)->withQueryString();

    return view('tasks.index', compact('tasks'));
}

    // Store new task
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => ['required', Rule::in(['Pending', 'In Progress', 'Completed'])],
            'priority' => ['required', Rule::in(['Low', 'Medium', 'High'])],
            'due_date' => 'nullable|date',
        ]);
          $validated['user_id'] = auth()->id();
        Task::create($validated);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task created successfully!');
    }

    // Show edit form
    public function edit(Task $task)
    {
        Gate::authorize('update', $task);
        return view('tasks.edit', compact('task'));
    }

    // Update existing task
    public function update(Request $request, Task $task)
    {
         Gate::authorize('update', $task);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => ['required', Rule::in(['Pending', 'In Progress', 'Completed'])],
            'priority' => ['required', Rule::in(['Low', 'Medium', 'High'])],
            'due_date' => 'nullable|date',
        ]);

        $task->update($validated);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task updated successfully!');
    }

    public function destroy(Task $task)
    {
        Gate::authorize('delete', $task);
        $task->delete();

        return redirect()   
            ->route('tasks.index')
            ->with('success', 'Task deleted successfully!');
    }
}