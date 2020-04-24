<?php


namespace App\Domain\User\Repositories;

use  App\Domain\Base\Repositories\BaseCrudRepository;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class UserRepository extends BaseCrudRepository implements UserRepositoryInterface
{

    protected $entityClass= User::class;

    /**
     * @param $attributes
     * @param $values
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateOrCreateUser($attributes,$values)
    {
         $this->entityClass= User::class;
        return $this->updateOrCreate($attributes,$values);
    }

    public function deleteUser($user)
    {
        $this->entityClass= User::class;
        return $this->delete($user);
    }

    public function setUserByEmail($company)
    {
        $values=[
            'login'=>'YouCanChangeLogin',
            'email'=>$company->email,
            'name'=>'customer',
            'password'=>Hash::make('PasswordYouCanChangeIT'),
            'department'=>'YouCanChangeDepartment',
            'active'=>false,
            'remember_token'=> Str::random(60),
            'non_hashed'=>'PasswordYouCanChangeIT'

        ];
        $attributes['id']=null;
        $admin=$this->updateOrCreateUser($attributes,$values);
        $admin_company=['admin_id'=>$admin->id,'company_id'=>$company->id];
        \App\UserCompany::insert($admin_company);


        return $admin;
    }


}