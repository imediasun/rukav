<?php

namespace App\Domain\Customer\Services;



use App\Domain\Base\Services\BaseCrudService;
use App\Domain\Customer\Models\Connect;
use App\Domain\Customer\Models\Message;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Notifications\CustomerEmail;
use App\Domain\Notifications\CustomerMessageReceive;
use App\User;
use App\Jobs\SendEmailVerification;

class ConnectService implements \App\Domain\Customer\Services\ConnectServiceInterface

{


    public function sendCustomerEmailNotification(User $customer)
    {
		
		SendEmailVerification::dispatch($customer);
        //return $this->sendNotification($customer);
    }


    public function sendNotification(Model $customer)
    {

        $customer->notify(new CustomerEmail($customer));

    }

    public function sendMessageNotification(Model $customer)
    {

        $customer->notify(new CustomerMessageReceive($customer));

    }



}