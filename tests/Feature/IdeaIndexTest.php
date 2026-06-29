<?php

use App\Models\Idea;
use App\Models\User;

test('authenticated user can view ideas index', function () {
    $user = User::factory()->create();
    $idea = Idea::factory()->create([
        'user_id' => $user->id,
        'title' => 'Test Idea',
    ]);

    $response = $this->actingAs($user)->get(route('idea.index'));

    $response->assertOk();
    $response->assertSee('Test Idea');
});
