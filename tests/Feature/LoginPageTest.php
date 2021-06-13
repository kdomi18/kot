<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_login_using_login_form()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $this->assertAuthenticated();

        $response->assertRedirect('/dashboard');
    }

    public function test_user_can_not_access_admin_page()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $this->get('/manager/users');
//        $this->assertAuthenticated();

        $response->assertRedirect('/dashboard');
    }

    public function test_user_can_access_admin_page()
    {
        $user = User::factory()->create();

        $user->roles()->attach(1);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);
        $response = $this->get('/manager/users');


        $response->assertSeeText('User');
    }
}
