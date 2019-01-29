<?php

namespace Tests\Feature;

use App\Order;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubmitOrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function an_order_is_closed_when_submitted()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $order = factory(Order::class)->create();

        $this->assertTrue($order->fresh()->isOpen());

        $this->post($order->path() . '/submit');

        $this->assertFalse($order->fresh()->isOpen());
    }
}
