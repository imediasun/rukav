<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Domain\Staff\Models\Role;
use App\Domain\Staff\Facades\Staff;
class StaffController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=$this->mainSettings();
        $data['menu']=$this->menu();
        $data['title']="Staff index";
        $data['keywords']="Ukrainian industry platform";
        $data['description']="Ukrainian industry platform";
        $data['roles']=Role::get();
        $data['first_roles']=Role::first();
        return view('staff.index',$data);
    }

    public function postData(Request $request){

        $data['title']="Staff postData";
        $data['roles']=Role::get();
        return view('staff.table',$data);
    }


    public function postPermissionsData(Request $request){

        $data['title']="Staff postPermissionsData";
        $data['available_permissions_array']=\App\RoleHasPermission::select('permission_id')->where('role_id',$request->input('role_permission'))->get()->toArray();
        foreach($data['available_permissions_array'] as $perm){
            $data['available_permissions_final_array'][]=$perm['permission_id'];
        }
        $data['role_id']=$request->input('role_permission');
        $data['all_permissions']=\App\Permission::get();

        return view('staff.table_permissions',$data);
    }

    public function postSave(Request $request){

    $role['values']=['name'=>$request->input('name'),'description'=>$request->input('description')];
    $role['attributes']['id']=(null!=($request->input('role_id'))) ? $request->input('role_id') : null;
    Staff::updateStaffRole($role);
    //var_dump($request->input('name'));
    }

    public function postPermissionsChange(Request $request){

        Staff::updatePermissionForRole($request->input('role'),$request->input('permission'),$request->input('value'));
    }


    public function getRoles(){
        $roles=\App\Domain\Staff\Models\Role::get();
        return $roles;
    }
}
