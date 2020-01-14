<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Http\Controllers\CursController;
class Send_mail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * The order instance.
     *
     * @var Order
     */
    protected $mailr;
    protected $curs;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($post)
    {
       
        //
        $this->mail=$post;
        
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from($this->mail['contact-email'])->view('emails.mail.send_mail',['post'=>$this->mail])->subject($this->mail['contact-subject']);

    }
}
