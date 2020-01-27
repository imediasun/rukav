<?php


namespace App\Domain\Customer\Services;

use App\Domain\Base\Services\Contracts\BaseServiceInterface;
use App\User;


interface CustomerServiceInterface extends BaseServiceInterface
{

    public function sendCustomerRegistrationDoneNotification(User $customer);


}