<?php

namespace App\Domain\Company\Manager;


use App\Domain\Abstracts\Company\CompanyAbstract;
use App\Domain\Company\Contracts\CompanyContract;
use App\Domain\Company\Repositories\CompanyRepositoryInterface;
use App\Domain\Admin\Repositories\AdminRepositoryInterface;
use App\Domain\Company\Services\CompanyServiceInterface;
use App\Domain\Company\Models\Logo;

class CompanyManager extends CompanyAbstract implements CompanyContract

{
    private $companyRepository;
    private $companyService;
    private $adminRepository;


    /**
     * StaffManager constructor.
     * @param $StaffRepositoryInterface
     * @param $CompanyServiceInterface
     */
    public function __construct(CompanyRepositoryInterface $companyRepository,CompanyServiceInterface $companyService,AdminRepositoryInterface $adminRepository)
    {
        $this->companyRepository = $companyRepository;
         $this->companyService = $companyService;
        $this->adminRepository = $adminRepository;
    }


    /**
     * @param $company
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateCompany($company)
    {

        $company=$this->companyRepository->updateOrCreateCompany($company['attributes'],$company['values']);
        if($company){
            //create user for company if Company has no Admin yet
            if(!$company->admin){
           $user=$this->setAdmin($company);
           $user->assignRole('Company_administrator');
            $this->companyService->sendCompanyRegistrationDoneNotification($company);
        }
        }
        return $company;

    }

    public function updateCompanySetting($companySetting)
    {
        return $this->companyRepository->updateOrCreateCompanySetting($companySetting['attributes'],$companySetting['values']);

    }

    public function updateCompanyLogo($companyLogo)
    {
        $logo=$this->companyRepository->updateOrCreateCompanyLogo($companyLogo['attributes'],$companyLogo['values']);

        $result=Logo::where('id','!=',$logo->id)->get();
        $i=0;
        foreach($result as $logotype){
            $companyLogo['values']=[];
            $companyLogo['attributes']=[];

            if($logo->active==true){
                $status=false;
            }
            else{

                if($i>0){$status=false;}else{$status=true;}

            }
            $companyLogo['values']=['active'=>$status];
            $companyLogo['attributes']['id']=$logotype->id;
            $this->companyRepository->updateOrCreateCompanyLogo($companyLogo['attributes'],$companyLogo['values']);
            $i++;
        }
        return $logo;

    }

    public function updateCompanyBadge($companyBadge)
    {
        $badge=$this->companyRepository->updateOrCreateCompanyBadge($companyBadge['attributes'],$companyBadge['values']);

       return $badge;

    }

    public function getCompanySetting($company_id)
    {
        return $this->companyRepository->getCompanySetting($company_id);

    }

     public function deleteCompany($company)
    {
        return $this->companyRepository->deleteCompany($company);
    }

    public function deleteCompanyLogo($logo)
    {
        return $this->companyRepository->deleteCompanyLogo($logo);
    }

    public function deleteCompanyBadge($badge)
    {
        return $this->companyRepository->deleteCompanyBadge($badge);
    }

    public function setAdmin($company)
    {

        return $this->adminRepository->setAdminByEmail($company);
    }


}