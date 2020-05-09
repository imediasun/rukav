<?php


namespace App\Domain\Customer\Services;

use App\Domain\Base\Services\Contracts\BaseServiceInterface;
use App\Domain\Customer\Models\Customer;
use App\Domain\Customer\Models\Message;
use App\User;


interface ConnectServiceInterface extends BaseServiceInterface
{

    public function sendCustomerEmailNotification(User $customer);
    //public function sendCustomerReceiveMessageNotification(User $customer);


}