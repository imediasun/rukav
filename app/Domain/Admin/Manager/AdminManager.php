<?php

namespace App\Domain\Admin\Manager;


use App\Domain\Abstracts\Admin\AdminAbstract;
use App\Domain\Admin\Contracts\AdminContract;
use App\Domain\Admin\Repositories\AdminRepositoryInterface;
use App\Domain\Admin\Models\Avatar;


class AdminManager extends AdminAbstract implements AdminContract

{
    private $userRepository;



    /**
     * StaffManager constructor.
     * @param $StaffRepositoryInterface
     */
    public function __construct(AdminRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param $company
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateAdmin($user)
    {
        return $this->userRepository->updateOrCreateAdmin($user['attributes'],$user['values']);
    }

    public function deleteAdmin($user)
    {
        return $this->userRepository->deleteAdmin($user);
    }

    public function updateAdminAvatar($adminAvatar)
    {
        $ava=$this->userRepository->updateOrCreateAdminAvatar($adminAvatar['attributes'],$adminAvatar['values']);

        $result=Avatar::where('id','!=',$ava->id)->get();
        $i=0;
        foreach($result as $avatar){
            $adminAvatar['values']=[];
            $adminAvatar['attributes']=[];

            if($ava->active==true){
                $status=false;
            }
            else{

                if($i>0){$status=false;}else{$status=true;}

            }
            $adminAvatar['values']=['active'=>$status];
            $adminAvatar['attributes']['id']=$avatar->id;
            $this->userRepository->updateOrCreateAdminAvatar($adminAvatar['attributes'],$adminAvatar['values']);
            $i++;
        }
        return $ava;

    }

    public function deleteAdminAvatar($logo)
    {
        return $this->userRepository->deleteAdminAvatar($logo);
    }

    public function deleteBadgesGroup($badges_group)
    {
        return $this->userRepository->deleteBadgesGroup($badges_group);
    }

    public function updateBadgesGroup($badges_group)
    {
        return $this->userRepository->updateOrCreateBadgesGroup($badges_group['attributes'],$badges_group['values']);
    }


    public function updateCompanyBadge($companyBadge)
    {
       return $this->userRepository->updateOrCreateCompanyBadge($companyBadge['attributes'],$companyBadge['values']);

    }


}