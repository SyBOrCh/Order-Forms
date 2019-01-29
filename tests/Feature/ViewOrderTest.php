<?php

namespace Tests\Feature;

use App\Item;
use App\Order;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewOrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function users_can_view_their_order()
    {
        $this->signIn();

        $order = factory(Order::class)->create();
        $item = factory(Item::class)->create();
        $order->items()->attach($item, ['quantity' => 4]);

        $this->get($order->path())->assertSee('Current order'); 
        $this->get($order->path())->assertSee($item->type);
    }
}
