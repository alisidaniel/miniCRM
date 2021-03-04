<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use PHPUnit\Framework\TestCase;
use App\Models\User;

class AuthenticationTest extends TestCase
{

    use HasFactory;
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_user_cannot_view_login_if_authenticated()
    {
        $user = \App\Models\User::factory()->make();

        $reponse = $this->actingAs($user)->get('/login');

        $reponse->assertRedirect('/home');
    }

    public function test_user_login_with_valid_auth()
    {
        $password = 'password';
        $user = \App\Models\User::factory()->create();

        $reponse = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($user);
    }
}
