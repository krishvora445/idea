<?php

use Illuminate\Support\Facades\Auth;
use App\Models\User;

it('login a user', function () {
//    visit('/register')
//        ->fill('name', 'John Doe')
//        ->fill('email', 'johndoe@gmail.com')
//        ->fill('password', 'password123')
//        ->press('@register-test')
//        ->assertPathIs('/')
//        ->press('@logout-test');

//    or

   $user =  User::factory()->create([
        'name' => 'John Doe',
        'email' => 'johndoe@gmail.com',
        'password' => 'password123',
    ]);




    visit('/login')
        ->fill('email', $user->email)
        ->fill('password', 'password123')
        ->press('@login-test')
        ->assertPathIs('/');

    $this->assertAuthenticated();




});

it('logout a user', function () {
    $user =  User::factory()->create(['password' => 'password123']);

    $this->actingAs($user)
        ->visit('/')
        ->press('@logout-test')
        ->assertPathIs('/') ;

    $this->assertGuest();

});
