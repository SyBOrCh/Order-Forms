<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function an_order_has_a_user_id()
    {
        $order = factory(\App\Order::class)->create(['user_id' => 2]);
        $this->assertEquals(2, $order->user_id);
    }

    /** @test **/
    public function an_order_has_an_open_status_boolean()
    {
        $order = factory(\App\Order::class)->create(['open' => 1]);
        $this->assertEquals(1, $order->open);
    }

    /** @test **/
    public function orders_can_be_filtered_by_their_open_or_closed_status()
    {
        $order1 = factory(\App\Order::class)->create(['open' => false]);
        $order2 = factory(\App\Order::class)->create(['open' => true]);

        $orders = \App\Order::open()->get();

        $this->assertFalse($orders->contains($order1));
        $this->assertTrue($orders->contains($order2));
    }

    /** @test **/
    public function an_order_can_make_its_path()
    {
        $order = factory(\App\Order::class)->create();

        $this->assertEquals('/orders/' . $order->id, $order->path());
    }
}
