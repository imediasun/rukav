<?php

namespace App\Domain\Company\Services;



use App\Domain\Base\Services\BaseCrudService;
use App\Domain\Company\Services\CompanyServiceInterface;
use App\Domain\Company\Models\Company;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Notifications\CompanyRegistrationDone;
use App\User;

class CompanyService implements CompanyServiceInterface

{


    public function sendCompanyRegistrationDoneNotification(Company $company)
    {
        return $this->sendNotification($company);
    }

    public function sendNotification(Model $company)
    {

        $company->notify(new CompanyRegistrationDone($company));

    }


}