<?php

namespace Tests\Feature;

use App\Item;
use App\Order;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItemOrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function an_order_has_many_items()
    {
        // $this->withoutExceptionHandling();

        $order = factory(Order::class)->create();
        $item = factory(Item::class)->create();

        $order->items()->attach($item, ['quantity' => 4]);

        $this->assertEquals(4, $order->items->first()->pivot->quantity);
    }
}
