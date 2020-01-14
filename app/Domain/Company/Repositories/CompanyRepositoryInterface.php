<?php


namespace App\Domain\Company\Repositories;

use App\Domain\Base\Repositories\Contracts\BaseCrudRepositoryInterface;

interface CompanyRepositoryInterface extends BaseCrudRepositoryInterface
{

    public function updateOrCreateCompany($attributes,$values);

    public function updateOrCreateCompanySetting($attributes,$values);

    public function updateOrCreateCompanyLogo($attributes,$values);
    public function updateOrCreateCompanyBadge($attributes,$values);

    public function deleteCompany($company);

    public function deleteCompanyLogo($logo);

    public function deleteCompanyBadge($badge);

    public function getCompanySetting($company_id);

}