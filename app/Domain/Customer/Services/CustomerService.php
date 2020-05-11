<?php

namespace App\Domain\Customer\Services;



use App\Domain\Base\Services\BaseCrudService;
use App\Domain\Customer\Models\Customer;
use App\Domain\Customer\Models\Message;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Notifications\CustomerRegistrationDone;
use App\Domain\Notifications\CustomerMessageReceive;
use App\User;
use App\Jobs\SendEmailVerification;

class CustomerService implements \App\Domain\Customer\Services\CustomerServiceInterface

{


    public function sendCustomerRegistrationDoneNotification(User $customer)
    {
        return $this->sendNotification($customer);
    }


    public function sendNotification(Model $customer)
    {

        $customer->notify(new CustomerRegistrationDone($customer));

    }

    public function sendMessageNotification(Model $customer)
    {
\Log::info('sendCustomerReceiveMessageNotification: '.date("Y-m-d H:i:s"));
		SendEmailVerification::dispatch($customer);
        //$customer->notify(new CustomerMessageReceive($customer));

    }
    public function sendCustomerReceiveMessageNotification(User $customer)
    {
        return $this->sendMessageNotification($customer);
    }


}