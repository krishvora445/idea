<?php

use App\Models\Idea;
use App\Models\User;

test('guests are redirected to login when trying to view an idea', function () {
    $idea = Idea::factory()->create();

    $this->get(route('idea.show', $idea))
        ->assertRedirect(route('login'));
});

test('an authenticated user can view an idea', function () {
    $user = User::factory()->create();

    $idea = Idea::factory()->create([
        'user_id' => $user->id,
        'title' => 'My Great Idea',
        'description' => 'This is a description of my great idea.',
    ]);

    $this->actingAs($user)
        ->get(route('idea.show', $idea))
        ->assertOk()
        ->assertSee('My Great Idea')
        ->assertSee('This is a description of my great idea.');
});
