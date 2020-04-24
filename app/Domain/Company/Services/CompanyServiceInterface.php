<?php


namespace App\Domain\Company\Services;

use App\Domain\Base\Services\Contracts\BaseServiceInterface;
use App\Domain\Company\Models\Company;


interface CompanyServiceInterface extends BaseServiceInterface
{

    public function sendCompanyRegistrationDoneNotification(Company $company);


}