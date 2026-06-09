<?php

use \Illuminate\Support\Facades\Auth;

it('registers a user', function () {
    visit('/register')
        ->fill('name', 'John Doe')
        ->fill('email', 'johndoe@gmail.com')
        ->fill('password', 'password123')->debug()
        ->press('@register-test')
        ->assertPathIs('/');

    $this->assertAuthenticated();

//    $this->assertDatabaseHas('users', [
//        'name' => 'John Doe',
//        'email' => 'johndoe@gmail.com',
//    ]);

    expect(Auth::user())->toMatchArray([
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
        ]);

});
