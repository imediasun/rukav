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

        $customer->notify(new MessageRegistrationDone($customer));

    }

    public function sendMessageNotification(Model $customer)
    {

        $customer->notify(new MessageMessageReceive($customer));

    }
    public function sendCustomerReceiveMessageNotification(User $customer)
    {
		SendEmailVerification::dispatch($customer);
        //return $this->sendMessageNotification($customer);
    }


}