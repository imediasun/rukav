<?php

namespace App\Domain\Customer\Services;



use App\Domain\Base\Services\BaseCrudService;
use App\Domain\Customer\Models\StaticPage;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Jobs\SendEmailVerification;

class StaticPageService implements \App\Domain\Customer\Services\StaticPageServiceInterface

{


    public function sendNotification(Model $customer)
    {

    }

    public function sendStaticPageNotification(Model $customer)
    {

    }
    public function sendCustomerReceiveStaticPageNotification(User $customer)
    {
    }


}