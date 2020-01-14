<?php


namespace App\Domain\Customer\Services;

use App\Domain\Base\Services\Contracts\BaseServiceInterface;
use App\Domain\Customer\Models\Customer;


interface CustomerServiceInterface extends BaseServiceInterface
{

    public function sendCustomerRegistrationDoneNotification(Customer $customer);


}