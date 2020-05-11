<?php

namespace App\Domain\Customer\Services;



use App\Domain\Base\Services\BaseCrudService;
use App\Domain\Customer\Models\Message;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Notifications\MessageMessageReceive;
use App\Domain\Notifications\MessageRegistrationDone;
use App\User;
use App\Jobs\SendEmailVerification;

class MessageService implements \App\Domain\Customer\Services\MessageServiceInterface

{


    public function sendNotification(Model $customer)
    {
\Log::info('sendNotification: '.date("Y-m-d H:i:s"));
        $customer->notify(new MessageRegistrationDone($customer));

    }

    public function sendMessageNotification(Model $customer)
    {
\Log::info('sendMessageNotification: '.date("Y-m-d H:i:s"));
        $customer->notify(new MessageMessageReceive($customer));

    }
    public function sendCustomerReceiveMessageNotification(User $customer)
    {
		\Log::info('sendCustomerReceiveMessageNotification: '.date("Y-m-d H:i:s"));
		SendEmailVerification::dispatch($customer);
        //return $this->sendMessageNotification($customer);
    }


}