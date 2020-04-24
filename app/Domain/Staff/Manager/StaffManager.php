<?php

namespace App\Domain\Staff\Manager;


use App\Domain\Abstracts\Staff\StaffAbstract;
use App\Domain\Staff\Contracts\StaffContract;
use App\Domain\Staff\Repositories\StaffRepositoryInterface;


class StaffManager extends StaffAbstract implements StaffContract

{
    private $staffRepository;



    /**
     * StaffManager constructor.
     * @param $StaffRepositoryInterface
     */
    public function __construct(StaffRepositoryInterface $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }

    /**
     * @param $role
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateStaffRole($role)
    {
        return $this->staffRepository->updateOrCreateRole($role['attributes'],$role['values']);
    }

    public function updatePermissionForRole($role,$permission,$value){

        var_dump($permission,$role,$value);

       if( \App\Domain\Staff\Models\RoleHasPermission::where('role_id',$role)->where('permission_id',$permission)->first() && $value=="false"){

           $row=\App\Domain\Staff\Models\RoleHasPermission::where('role_id',$role)->where('permission_id',$permission)->delete();
           var_dump('popali',$row);
       }
       elseif(!\App\Domain\Staff\Models\RoleHasPermission::where('role_id',$role)->where('permission_id',$permission)->first() && $value=="true"){
        \App\Domain\Staff\Models\RoleHasPermission::insert(['role_id'=>$role,'permission_id'=>$permission]);}
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

    }

}