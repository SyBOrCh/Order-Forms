<?php

namespace App\Http\Controllers;

use App\Order;
use App\Mail\NewOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Auth::user()->closedOrders();
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $items = $order->items->groupBy('action');

        return view('orders.show', compact('order', 'items'));
    }

    public function submit(Order $order)
    {
        if ($order->containsGeneralWaste()) {
            // Split the order in two parts:
            $amdOrder = Order::create(['user_id' => auth()->user()->id]);
            $fcoOrder = Order::create(['user_id' => auth()->user()->id]);

            // AMD Order
            $amdItems = $order->items()->where('category', '!=', 'general waste')->get();
            foreach ($amdItems as $item) {
                $amdOrder->items()->attach($item, [
                    'quantity'  => $item->pivot->quantity,
                    'notes'     => $item->pivot->notes,
                    'location'  => $item->pivot->location,
                ]);
            }

            Mail::to(config('mail.AMD.address'), config('mail.AMD.name'))
                ->queue(
                    new NewOrder($amdOrder)
                );

            // FCO Order
            $fcoItems = $order->items()->where('category', 'general waste')->get();
            foreach ($fcoItems as $item) {
                $fcoOrder->items()->attach($item, [
                    'quantity'  => $item->pivot->quantity,
                    'notes'     => $item->pivot->notes,
                    'location'  => $item->pivot->location,
                ]);
            }

            Mail::to(config('mail.FCO.address'), config('mail.FCO.name'))
                ->queue(
                    new NewOrder($fcoOrder)
                );

            $fcoOrder->delete();
            $amdOrder->delete();

            $order->close();

            return redirect($order->path());
        }

        Mail::to(config('mail.AMD.address'), config('mail.AMD.name'))
            ->queue(
                new NewOrder($order)
            );

        $order->close();

        return redirect(route('home'));
    }
}
