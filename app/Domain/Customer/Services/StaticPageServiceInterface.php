<?php


namespace App\Domain\Customer\Services;

use App\Domain\Base\Services\Contracts\BaseServiceInterface;
use App\Domain\Customer\Models\StaticPage;
use App\User;


interface StaticPageServiceInterface
{

    public function sendCustomerReceiveStaticPageNotification(User $customer);


}