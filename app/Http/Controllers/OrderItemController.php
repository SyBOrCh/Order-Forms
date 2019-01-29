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

        return redirect(route('home'));
    }

    public function destroy(Order $order, Item $item)
    {
        $order->items()->detach($item);

        return redirect()->back();
    }

    public function decrease(Order $order, Item $item)
    {
        $item = $order->items()->find($item->id);

        $item->pivot->quantity -= 1;
        $item->pivot->save();

        return redirect()->back();
    }

    public function increase(Order $order, Item $item)
    {
        $item = $order->items()->find($item->id);

        $item->pivot->quantity += 1;
        $item->pivot->save();

        return redirect()->back();
    }

}
