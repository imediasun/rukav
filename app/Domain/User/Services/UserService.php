<?php

namespace App\Domain\User\Services;



use App\Domain\Base\Services\BaseCrudService;
use App\Domain\Customer\Models\Customer;
use App\Domain\Customer\Models\Message;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Notifications\CustomerRegistrationDone;
use App\Domain\Notifications\CustomerMessageReceive;
use App\User;

class UserService implements \App\Domain\User\Services\UserServiceInterface

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

        $customer->notify(new CustomerMessageReceive($customer));

    }

}