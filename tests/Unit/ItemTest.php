<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function an_item_has_an_action()
    {
        $item = factory(\App\Item::class)->create(['action' => 'collect']);
        $this->assertEquals('collect', $item->action);
    }

    /** @test **/
    public function an_item_has_a_type()
    {
        $item = factory(\App\Item::class)->create(['type' => 'waste container']);
        $this->assertEquals('waste container', $item->type);
    }
}
