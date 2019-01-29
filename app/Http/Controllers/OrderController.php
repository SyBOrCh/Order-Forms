<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // Let's make an e-mail
        

        $order->close();

        return redirect(route('home'));
    }
}
