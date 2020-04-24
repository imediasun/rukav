<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Http\Controllers\CursController;
class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * The order instance.
     *
     * @var Order
     */
    protected $order;
    protected $curs;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail_text,$subject)
    {
        //
        $this->order=$mail_text;
        $this->subject=$subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('example@example.com')->subject($this->subject)->view('emails.shipped',['body'=>$this->order]);

    }
}
