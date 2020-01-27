<?php


namespace App\Domain\User\Services;

use App\Domain\Base\Services\Contracts\BaseServiceInterface;
use App\Domain\Customer\Models\Customer;
use App\Domain\Customer\Models\Message;
use App\User;


interface UserServiceInterface extends BaseServiceInterface
{

    public function sendCustomerRegistrationDoneNotification(User $customer);


}