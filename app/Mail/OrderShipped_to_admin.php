<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Http\Controllers\CursController;

class OrderShipped_to_admin extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * The order instance.
     *
     * @var Order
     */
    protected $order;
    protected $buyer;
    protected $curs;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cart,$post)
    {
        //
        $this->order=$cart;
        $this->buyer=$post;
        $this->curs=CursController::index();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('example@example.com')->view('emails.orders.shipped_to_admin',['cart_total_price'=>$this->order->totalPrice,'cart'=>$this->order,'post'=>$this->buyer, 'curs'=>$this->curs]);

    }
}
