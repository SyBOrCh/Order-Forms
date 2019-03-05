<?php

namespace App\Http\Controllers;

use App\Order;
use App\Mail\NewOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $orders = Auth::user()->closedOrders();
        $orders = Order::where('open', false)->latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $items = $order->items->groupBy('action');

        return view('orders.show', compact('order', 'items'));
    }

    public function submit(Order $order, Request $request)
    {
        $request->validate([
            'vunetid'   => 'required',
            'vunetpassword' => 'required',
        ]);
        
        $vunetID = $request->vunetid;
        $vunetPassword = $request->vunetpassword;

        $this->configureMailer($vunetID, $vunetPassword);

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

            if($amdItems->count() > 0) {
                Mail::to(config('mail.AMD'))->send(new NewOrder($amdOrder, 'AMD'));
            }

            // FCO Order
            $fcoItems = $order->items()->where('category', 'general waste')->get();
            foreach ($fcoItems as $item) {
                $fcoOrder->items()->attach($item, [
                    'quantity'  => $item->pivot->quantity,
                    'notes'     => $item->pivot->notes,
                    'location'  => $item->pivot->location,
                ]);
            }

            Mail::to(config('mail.FCO'))->send(new NewOrder($fcoOrder, 'FCO'));

            $fcoOrder->delete();
            $amdOrder->delete();

            $order->close();

            return redirect(route('orders'));
        }

        Mail::to(config('mail.AMD'))
            ->send(
                new NewOrder($order)
            );

        $order->close();

        return redirect(route('orders'));
    }

    public function configureMailer($username, $password)
    {
        $conf = [
            "driver" => config('mail.driver'),
            "host" => config('mail.host'),
            "port" => config('mail.port'),
            "FCO" => config('mail.FCO'),
            "AMD" => config('mail.AMD'),
            "encryption" => config('mail.encryption'),
            "username" => $username,
            "password" => $password,
        ];

        Config::set('mail', $conf);

        $app = App::getInstance();
        $app->register('Illuminate\Mail\MailServiceProvider');
    }
}
