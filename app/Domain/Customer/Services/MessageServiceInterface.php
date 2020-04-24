<?php


namespace App\Domain\Customer\Services;

use App\Domain\Base\Services\Contracts\BaseServiceInterface;
use App\Domain\Customer\Models\Message;
use App\User;


interface MessageServiceInterface extends BaseServiceInterface
{

    public function sendCustomerReceiveMessageNotification(User $customer);


}