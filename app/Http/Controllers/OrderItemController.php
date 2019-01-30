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
        $notes = $request->notes;
        $location = $request->location;

        // rewrite to array map 
        $itemArray = [];

        foreach ($quantities as $item_id => $quantity) {
            $itemArray[$item_id] = [
                'quantity' => $quantity, 
                'notes' => $notes[$item_id],
                'location'  => $location[$item_id],
            ];
        }

        foreach ($itemArray as $item_id => $parameters) {
            if ($parameters['quantity'] > 0) {
                    $order->items()->attach(
                        Item::find($item_id), [
                            'quantity' => $parameters['quantity'], 
                            'notes' => $parameters['notes'],
                            'location'  => $parameters['location'],
                        ]
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
