<?php


namespace App\Domain\Admin\Repositories;

use  App\Domain\Base\Repositories\BaseCrudRepository;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Domain\Admin\Models\Avatar;
use App\Domain\Admin\Models\BadgesGroup;
use App\Domain\Company\Models\CompanyBadge;


class AdminRepository extends BaseCrudRepository implements AdminRepositoryInterface
{

    protected $entityClass= User::class;

    /**
     * @param $attributes
     * @param $values
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateOrCreateAdmin($attributes,$values)
    {
        $this->entityClass= User::class;
        return $this->updateOrCreate($attributes,$values);
    }

    public function deleteAdmin($user)
    {
        $this->entityClass= User::class;
        return $this->delete($user);
    }

    public function setAdminByEmail($company,$request)
    {
        $values=[
            'login'=>'YouCanChangeLogin',
            'email'=>$company->email,
            'name'=>$request->input('company_admin_name'),
            'sername'=>$request->input('company_admin_sername'),
            'password'=>Hash::make('PasswordYouCanChangeIT'),
            'department'=>'YouCanChangeDepartment',
            'active'=>false,
            'remember_token'=> Str::random(60),
            'non_hashed'=>'PasswordYouCanChangeIT',
            'company_id'=>$company->id

        ];
        $attributes['id']=null;
        $admin=$this->updateOrCreateAdmin($attributes,$values);
        $admin_company=['admin_id'=>$admin->id,'company_id'=>$company->id];
        \App\AdminCompany::insert($admin_company);
        $manager=['user_id'=>$admin->id,'company_id'=>$company->id];
        \App\Domain\Manager\Models\Manager::insert($manager);

        return $admin;
    }

    public function updateOrCreateAdminAvatar($attributes,$values)
    {
        $this->entityClass= Avatar::class;
        return $this->updateOrCreate($attributes,$values);
    }

    public function updateOrCreateBadgesGroup($attributes,$values)
    {
        $this->entityClass= BadgesGroup::class;
        return $this->updateOrCreate($attributes,$values);
    }

    public function deleteAdminAvatar($ava)
    {
        $this->entityClass= Avatar::class;
        return $this->delete($ava);
    }

    public function deleteBadgesGroup($badges_group)
    {
        $this->entityClass= BadgesGroup::class;
        return $this->delete($badges_group);
    }

    public function updateOrCreateCompanyBadge($attributes,$values)
    {
        $this->entityClass= CompanyBadge::class;
        return $this->updateOrCreate($attributes,$values);
    }


}