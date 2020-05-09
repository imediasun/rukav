<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Domain\Notifications\CustomerEmail;
use App\Domain\Notifications\MessageMessageReceive;
use Log;

class SendEmailVerification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    public function __construct($user)
    {
		Log::info('SendEmailVerification.php: '.date("Y-m-d H:i:s").
			'start process construct 22string');
        $this->user=$user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() 
    {
		//$this->user->sendEmailVerificationNotification();
		
		//$this->user->notify(new CustomerEmail($this->user));
		$this->user->notify(new MessageMessageReceive($this->user));

    }
}