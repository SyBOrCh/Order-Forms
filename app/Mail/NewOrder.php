<?php

namespace App\Mail;

use App\Order;
use App\Translator;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $items;
    public $translator;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
        $this->translator = new Translator();
        $this->items = $order->items->groupBy('action');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from(auth()->user()->email, auth()->user()->name)    
            ->bcc(auth()->user()->email, auth()->user()->name)    
            ->subject('Nieuwe aanvraag')
            ->view('emails.neworder');
    }
}
