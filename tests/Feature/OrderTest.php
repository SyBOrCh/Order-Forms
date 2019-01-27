<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Collection;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function an_order_belongs_to_a_user()
    {
        $user = factory(\App\User::class)->create();
        $order = factory(\App\Order::class)->create(['user_id' => $user->id]);

        $this->assertInstanceOf(Collection::class, $user->orders);
        $this->assertEquals(1, $user->orders->count());
        $this->assertEquals($order->fresh(), $user->orders->first());

        $this->assertInstanceOf(\App\User::class, $order->user);
        $this->assertEquals($user->fresh(), $order->user);
    }

    /** @test **/
    public function a_user_can_add_a_new_order()
    {
        $user = factory(\App\User::class)->create();

        $order = $user->newOrder();

        $this->assertEquals(1, $user->orders->count());
        $this->assertEquals($user->id, $order->user_id);
    }

    /** @test **/
    public function a_new_order_is_open_by_default()
    {
        $user = factory(\App\User::class)->create();

        $order = $user->newOrder();

        $this->assertTrue($order->fresh()->isOpen());
    }

    /** @test **/
    public function an_order_can_be_closed()
    {
        $order = factory(\App\Order::class)->create();

        $this->assertTrue($order->fresh()->isOpen());

        $order->close();

        $this->assertFalse($order->fresh()->isOpen());
    }

    /** @test **/
    public function users_can_only_create_new_orders_when_none_are_open()
    {
        $user = factory(\App\User::class)->create();
        $firstOrder = $user->newOrder();

        $secondOrder = $user->newOrder();

        $this->assertEquals($firstOrder->fresh(), $secondOrder->fresh());
    }

    /** @test **/
    public function users_can_close_orders_and_then_create_new_orders()
    {
        $user = factory(\App\User::class)->create();
        $firstOrder = $user->newOrder();

        $firstOrder->close();

        $secondOrder = $user->newOrder();

        $this->assertNotEquals($firstOrder->fresh(), $secondOrder->fresh());
    }
}
