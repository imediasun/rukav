<?php


namespace App\Domain\Company\Repositories;

use  App\Domain\Base\Repositories\BaseCrudRepository;
use App\Domain\Company\Models\Company;
use App\Domain\Company\Models\Logo;
use App\Domain\Company\Models\Badge;
use App\Domain\Company\Models\CompanySetting;


class CompanyRepository extends BaseCrudRepository implements CompanyRepositoryInterface
{

    protected $entityClass= Company::class;

    /**
     * @param $attributes
     * @param $values
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateOrCreateCompany($attributes,$values)
    {
         $this->entityClass= Company::class;
        return $this->updateOrCreate($attributes,$values);
    }

    public function updateOrCreateCompanySetting($attributes,$values)
    {
        $this->entityClass= CompanySetting::class;
        return $this->updateOrCreate($attributes,$values);
    }

    public function updateOrCreateCompanyLogo($attributes,$values)
    {
        $this->entityClass= Logo::class;
        return $this->updateOrCreate($attributes,$values);
    }
    public function updateOrCreateCompanyBadge($attributes,$values)
    {
        $this->entityClass= Badge::class;
        return $this->updateOrCreate($attributes,$values);
    }

    public function getCompanySetting($company_id)
    {
        $this->entityClass= CompanySetting::class;
        return $this->getOrFail($company_id);
    }

    public function deleteCompany($company)
    {
        $this->entityClass= Company::class;
        return $this->delete($company);
    }
    public function deleteCompanyLogo($logo)
    {
        $this->entityClass= Logo::class;
        return $this->delete($logo);
    }
    public function deleteCompanyBadge($badge)
    {
        $this->entityClass= Badge::class;
        return $this->delete($badge);
    }

}