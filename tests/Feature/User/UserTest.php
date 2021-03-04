<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Auth;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_auth_user_profile_update()
    {   
        // given user is signed in
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);

        //and a task which is created by the user
        $profile = \App\Models\User::factory()->create(['id' => $user->id]);
        $profile->name = "Daniel Alisi";
        
        // hit endpoint to update user information
        $this->put('/profile/update', $profile->toArray());

        $this->assertDatabaseHas('users', ['name' => 'Williams']);

    }
}
