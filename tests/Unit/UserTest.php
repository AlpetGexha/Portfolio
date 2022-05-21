<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_user_form_login()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_user_dublicate()
    {
        $user1 = User::make([
            'name' => 'John Doe',
            'email' => 'agexha@gmail.com',
        ]);

        $user2 = User::make([
            'name' => 'John Doe',
            'email' => 'agexadha1@gmail.com',
        ]);

        $this->assertTrue($user1->email !== $user2->email);
    }

    public function test_user_delete()
    {
        $user = User::factory()->count(1)->make();

        $user = User::find(1);

        if ($user)
            $user->delete();

        $this->assertTrue(true);
    }

    public function test_user_register()
    {
        $r = $this->post('/register', [
            'name' => 'John Doe',
            'email' => 'agexha@gmail.com',
            'password' => '123456',
            'password_confirmation' => '123456'
        ]);

        $r->assertRedirect('/');
    }
}
