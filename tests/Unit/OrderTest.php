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
}