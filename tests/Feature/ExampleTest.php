<?php

use App\Models\User;

it('redirects guests to login page', function () {
    $this->followingRedirects()
        ->get('/')
        ->assertSee('Log in');
});

it('redirects authenticated users to ideas page', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/')
        ->assertRedirect('/ideas');
});
