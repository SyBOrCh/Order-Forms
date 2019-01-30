<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function a_user_has_a_location()
    {
        $user = factory(\App\User::class)->create(['location' => '4W35']);
        $this->assertEquals('4W35', $user->location);
    }

    /** @test **/
    public function a_user_has_a_budget_number()
    {
        $user = factory(\App\User::class)->create(['budgetnumber' => '8057890']);
        $this->assertEquals('8057890', $user->budgetnumber);
    }

    /** @test **/
    public function a_user_has_a_phone_number()
    {
        $user = factory(\App\User::class)->create(['phone' => '020-1234567']);
        $this->assertEquals('020-1234567', $user->phone);
    }

    /** @test **/
    public function a_user_can_fetch_its_current_order()
    {
        $user = factory(\App\User::class)->create();
        $order = $user->newOrder();

        $this->assertEquals($order->fresh(), $user->currentOrder());
    }
}
