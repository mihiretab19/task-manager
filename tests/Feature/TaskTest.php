<?php

use App\Models\Task;
use App\Models\User;

it('requires authentication for task pages', function () {
    $this->get('/tasks')->assertRedirect('/login');
    $this->get('/tasks/create')->assertRedirect('/login');
});

it('allows a user to create, view, update, filter, and delete their task', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->post('/tasks', [
            'title' => 'Prepare release notes',
            'description' => 'Document the completed work.',
            'status' => 'Pending',
            'priority' => 'High',
            'due_date' => '2026-09-01',
        ])
        ->assertRedirect('/tasks');

    $task = Task::where('title', 'Prepare release notes')->firstOrFail();

    expect($task->user_id)->toBe($user->id);

    $this->actingAs($user)
        ->get('/tasks?status=Pending&priority=High&search=release')
        ->assertOk()
        ->assertSee('Prepare release notes');

    $this->actingAs($user)
        ->get("/tasks/{$task->id}")
        ->assertOk()
        ->assertSee('Document the completed work.');

    $this->actingAs($user)
        ->put("/tasks/{$task->id}", [
            'title' => 'Publish release notes',
            'description' => 'Published for the team.',
            'status' => 'Completed',
            'priority' => 'Medium',
            'due_date' => '2026-09-02',
        ])
        ->assertRedirect('/tasks');

    expect($task->fresh()->title)->toBe('Publish release notes');

    $this->actingAs($user)
        ->delete("/tasks/{$task->id}")
        ->assertRedirect('/tasks');

    $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
});

it('rejects unsupported task status and priority values', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->post('/tasks', [
            'title' => 'Invalid task',
            'status' => 'Archived',
            'priority' => 'Urgent',
        ])
        ->assertSessionHasErrors(['status', 'priority']);

    $this->assertDatabaseMissing('tasks', ['title' => 'Invalid task']);
});

it('prevents users from accessing another users task', function () {
    $owner = User::factory()->create();
    $otherUser = User::factory()->create();
    $task = Task::create([
        'user_id' => $owner->id,
        'title' => 'Private task',
        'status' => 'Pending',
        'priority' => 'Medium',
    ]);

    $this->actingAs($otherUser)->get("/tasks/{$task->id}")->assertForbidden();
    $this->actingAs($otherUser)->get("/tasks/{$task->id}/edit")->assertForbidden();
    $this->actingAs($otherUser)->put("/tasks/{$task->id}", [
        'title' => 'Changed task',
        'status' => 'Completed',
        'priority' => 'High',
    ])->assertForbidden();
    $this->actingAs($otherUser)->delete("/tasks/{$task->id}")->assertForbidden();
});
