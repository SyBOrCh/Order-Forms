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

    /** @test **/
    public function items_can_be_added_to_an_order()
    {
        // $this->withoutExceptionHandling();

        $order = factory(Order::class)->create();
        $item = factory(Item::class)->create();
        $quantity = 5;

        $request = [
            'quantity' =>
            [$item->id => $quantity]
        ];

        $this->post($order->path() . '/items', $request);

        $this->assertCount(1, $order->items);
        $this->assertTrue($order->items->contains($item));
        $this->assertEquals(5, $order->items->first()->pivot->quantity);
    }

    /** @test **/
    public function items_can_be_removed_from_an_order()
    {
        $order = factory(Order::class)->create();
        $item = factory(Item::class)->create();
        $order->items()->attach($item, ['quantity' => 4]);
        
        $this->assertTrue($order->items->contains($item));

        $this->delete($order->path() . '/items/' . $item->id);

        $this->assertFalse($order->fresh()->items->contains($item));
    }

    /** @test **/
    public function item_quantities_can_be_modified_from_within_an_order()
    {
        $this->withoutExceptionHandling();

        $order = factory(Order::class)->create();
        $item = factory(Item::class)->create();
        $order->items()->attach($item, ['quantity' => 4]);

        $this->post($order->path() . '/items/' . $item->id . '/decrease');

        $this->assertEquals(3, $order->fresh()->items()->first()->pivot->quantity);

        $this->post($order->path() . '/items/' . $item->id . '/increase');
        $this->assertEquals(4, $order->fresh()->items()->first()->pivot->quantity);
    }

    /** @test **/
    public function an_item_wihtin_an_order_can_have_notes()
    {
        $order = factory(Order::class)->create();
        $item = factory(Item::class)->create();
        $order->items()->attach($item, ['quantity' => 1, 'notes' => 'Test note']);

        $this->assertEquals('Test note', $order->fresh()->items()->first()->pivot->notes);        
    }

    /** @test **/
    public function an_item_wihtin_an_order_can_have_a_location()
    {
        $order = factory(Order::class)->create();
        $item = factory(Item::class)->create();
        $order->items()->attach($item, ['quantity' => 1, 'location' => '4W40']);

        $this->assertEquals('4W40', $order->fresh()->items()->first()->pivot->location);        
    }

}
