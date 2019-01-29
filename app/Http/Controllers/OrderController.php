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
        $orders = Auth::user()->orders;
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $items = $order->items->groupBy('action');

        return view('orders.show', compact('order', 'items'));
    }

    public function submit(Order $order)
    {
        Mail::to('jbraunnl@gmail.com')
            ->send(
                new NewOrder($order)
            );

        $order->close();

        return redirect(route('home'));
    }
}
