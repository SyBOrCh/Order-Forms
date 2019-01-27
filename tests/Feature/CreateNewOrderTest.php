<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateNewOrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function authenticated_users_may_view_their_orders()
    {
        $response = $this->get('/orders')->assertRedirect(route('login'));

        $user = factory(\App\User::class)->create();
        $this->be($user);

        $order = $user->newOrder();

        $this->get('/orders')->assertStatus(200);
    }
}
