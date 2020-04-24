<?php


namespace App\Domain\Customer\Services;

use App\Domain\Base\Services\Contracts\BaseServiceInterface;
use App\Domain\Customer\Models\Customer;
use App\Domain\Customer\Models\Message;
use App\User;


interface CustomerServiceInterface extends BaseServiceInterface
{

    public function sendCustomerRegistrationDoneNotification(User $customer);
    public function sendCustomerReceiveMessageNotification(User $customer);


}