<?php

namespace App\Domain\Company\Manager;


use App\Domain\Abstracts\Company\CompanyAbstract;
use App\Domain\Company\Contracts\CompanyContract;
use App\Domain\Company\Repositories\CompanyRepositoryInterface;
use App\Domain\Admin\Repositories\AdminRepositoryInterface;
use App\Domain\Company\Services\CompanyServiceInterface;
use App\Domain\Company\Models\Logo;
use App\Domain\Company\Models\Banner;

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
    public function updateCompany($company,$request)
    {


        if($company['attributes']['id']){
        $current_user=\App\Domain\Company\Models\Company::where('id',$company['attributes']['id'])->first();
        }
        $company=$this->companyRepository->updateOrCreateCompany($company['attributes'],$company['values']);
        if($company){
            //create user for company if Company has no Admin yet
            if(!$company->admin){
           $user=$this->setAdmin($company,$request);
           $user->assignRole('Company_administrator');
            $this->companyService->sendCompanyRegistrationDoneNotification($company);
        }
        else{
                $data=[
                    'name'=>$request->input('company_admin_name'),
                    'sername'=>$request->input('company_admin_sername'),
                    'email'=>$request->input('company_email')
                ];
           $user_update=\App\User::where('email',$current_user->email)->update($data);
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

    public function updateCompanyPicture($companyPicture)
    {
        $picture=$this->companyRepository->updateOrCreateCompanyPicture($companyPicture['attributes'],$companyPicture['values']);
        return $picture;

    }



    public function updateCompanyBanner($companyBanner)
    {
        $banner=$this->companyRepository->updateOrCreateCompanyBanner($companyBanner['attributes'],$companyBanner['values']);

        $result=Banner::where('id','!=',$banner->id)->get();
        $i=0;
        foreach($result as $logotype){
            $companyBanner['values']=[];
            $companyBanner['attributes']=[];

            if($banner->active==true){
                $status=false;
            }
            else{

                if($i>0){$status=false;}else{$status=true;}

            }
            $companyBanner['values']=['active'=>$status];
            $companyBanner['attributes']['id']=$logotype->id;
            $this->companyRepository->updateOrCreateCompanyLogo($companyBanner['attributes'],$companyBanner['values']);
            $i++;
        }
        return $banner;

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

    public function setAdmin($company,$request)
    {

        return $this->adminRepository->setAdminByEmail($company,$request);
    }


}