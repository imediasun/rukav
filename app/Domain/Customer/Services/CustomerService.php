<?php

namespace App\Domain\Customer\Services;



use App\Domain\Base\Services\BaseCrudService;
use App\Domain\Customer\Services\CustomerServiceInterface;
use App\Domain\Customer\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Notifications\CustomerRegistrationDone;

class CustomerService implements CustomerServiceInterface

{


    public function sendCustomerRegistrationDoneNotification(Customer $customer)
    {
        return $this->sendNotification($customer);
    }

    public function sendNotification(Model $customer)
    {

        $customer->notify(new CustomerRegistrationDone($customer));

    }


}