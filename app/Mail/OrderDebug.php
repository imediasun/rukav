<?php

namespace App\Mail;

//use App\Mail\Mailable as Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Mail\Mailer as MailerContract;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderDebug extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * The order instance.
     *
     * @var Order
     */
    protected $order;
	public $to;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($array)
    {
        //
       // dd($array);
$this->data=$array;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('imediasun@gmail.com')->to('imediasun@gmail.com')->subject('debug_info')->view('emails.debug',

            ['data'=>$this->data]

            );

    }


}
