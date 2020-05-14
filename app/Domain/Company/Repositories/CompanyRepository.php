<?php


namespace App\Domain\Company\Repositories;

use  App\Domain\Base\Repositories\BaseCrudRepository;
use App\Domain\Company\Models\Company;
use App\Domain\Company\Models\Logo;
use App\Domain\Company\Models\Slider;
use App\Domain\Customer\Models\StaticPage;
use App\Domain\Company\Models\Picture;
use App\Domain\Company\Models\Banner;
use App\Domain\Company\Models\Badge;
use App\Domain\Company\Models\CompanySetting;
use App\Domain\Customer\Models\ProductCategory;


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

    public function updateOrCreateCompanySlider($attributes,$values)
    {
        $this->entityClass= Slider::class;
        return $this->updateOrCreate($attributes,$values);
    }

    public function updateOrCreateCompanyStaticPage($attributes,$values)
    {
        $this->entityClass= StaticPage::class;
        return $this->updateOrCreate($attributes,$values);
    }

    public function updateOrCreateProductCategory($attributes,$values)
    {
        $this->entityClass= ProductCategory::class;
        return $this->updateOrCreate($attributes,$values);
    }

    public function updateOrCreateCompanyPicture($attributes,$values)
    {
        $this->entityClass= Picture::class;
$result['message_id']=$values['message_id'];
foreach($values['photo'] as $p){
    $result['photo']=$p;
    $this->updateOrCreate($attributes,$result);
}




        return true;


    }

    public function updateOrCreateCompanyBanner($attributes,$values)
    {
        $this->entityClass= Banner::class;
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

    public function deleteCompanySlider($slider)
    {
        $this->entityClass= Slider::class;
        return $this->delete($slider);
    }
    public function deleteCompanyBadge($badge)
    {
        $this->entityClass= Badge::class;
        return $this->delete($badge);
    }

}