<?php

namespace App\Mail;

//use App\Mail\Mailable as Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Mail\Mailer as MailerContract;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderSend extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * The order instance.
     *
     * @var Order
     */
    protected $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($array)
    {
        //
       // dd($array);
        if(isset($array->sender->mailSender) && is_array($array->sender->mailSender)){
            $this->from=$array->sender->mailSender['email'];
        }else{
            $this->from=$array->sender;
        }

        $this->subject=$array->mailSubject;
        //dd($this->subject);
        $this->to=$array->to;
        $this->order='123';
        $this->template=$array->template;
        if(isset($array->availableRecipients)){
            $this->availableRecipients=$array->availableRecipients;
        }

        $this->client=$array->client;
        if(isset($array->creditRequest)){
            $this->creditRequest=$array->creditRequest;
        }
        if(isset($array->sender->mailSender)){
            $this->sender=$array->sender->mailSender;
        }
        if(isset($array->host)){
            $this->host=$array->host;
        }
        if(isset($array->auxmoney)){
            $this->auxmoney=$array->auxmoney;
        }
		 if(isset($array->attach)){
            $this->attach=$array->attach;
        }

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

		if(isset($this->attach)){
			
			$atach_array=explode('/',$this->attach);
			
			return $this->from($this->from)->to($this->to)->subject($this->subject)->view('emails.'.$this->template,

            ['availableRecipients'=>(isset($this->availableRecipients)) ? $this->availableRecipients : null,
                'client'=>$this->client,
                'creditRequest'=>(isset($this->creditRequest)) ? $this->creditRequest : null,
                'sender'=>(isset($this->sender)) ? $this->sender : 'credicom.de',
                'host'=>(isset($this->host)) ? $this->host : 'http://credicom.de',
                'auxmoney'=>(isset($this->auxmoney)) ? $this->auxmoney : null,
                ]

            )->attach($this->attach, [
        'as' => end($atach_array)
    ]);
			
			
			
			
			
		}
		else{
			
			return $this->from($this->from)->to($this->to)->subject($this->subject)->view('emails.'.$this->template,

            ['availableRecipients'=>(isset($this->availableRecipients)) ? $this->availableRecipients : null,
                'client'=>$this->client,
                'creditRequest'=>(isset($this->creditRequest)) ? $this->creditRequest : null,
                'sender'=>(isset($this->sender)) ? $this->sender : 'credicom.de',
                'host'=>(isset($this->host)) ? $this->host : 'http://credicom.de',
                'auxmoney'=>(isset($this->auxmoney)) ? $this->auxmoney : null,
                ]

            );
		}
		
        

    }


}
