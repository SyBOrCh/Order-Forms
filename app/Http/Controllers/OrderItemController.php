<?php

namespace App\Http\Controllers;

use App\Item;
use App\Order;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function store(Order $order, Request $request)
    {
        $quantities = $request->quantity;

        foreach ($quantities as $item_id => $quantity) {
            if ($quantity > 0) {
                $order->items()->attach(
                    Item::find($item_id), 
                    ['quantity' => $quantity]
                );
            }
        }

        return redirect()->back();
    }
}
