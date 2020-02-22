<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Domain\Admin\Facades\Admin;
use App\Domain\Admin\Models\Admin as AdminModel;

class AccessesController extends BaseController
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
        $user=\Auth::user()->roles;
        $data['title']="Додати товар";
        $data['keywords']="Ukrainian industry platform";
        $data['description']="Ukrainian industry platform";

        return view('main_admin.accesses.index',$data);
    }


    public function postData(Request $request){

        $data['title']="Company postData";
        $data['users']=\App\User::get();

        return view('main_admin.accesses.table',$data);
    }

    public function getForm(Request $request){
        $data['title']="добавления";
        if($request->input('admin_id')){
        $data['admin']=AdminModel::where('id',$request->input('admin_id'))->with('roles')->first();
        $data['title']="редактирования";
        }
        $data['roles']=\App\Domain\Staff\Models\Role::get();
        return view('main_admin.accesses.form',$data);
    }


    public function postSave(Request $request){
        $company['values']=['name'=>$request->input('company_name'),'email'=>$request->input('company_email')
            ,'info'=>$request->input('company_info'),'phone'=>$request->input('company_phone')
            ,'address'=>$request->input('company_address'),'biling_address'=>$request->input('company_biling_address')

        ];
        $company['attributes']['id']=(null!=($request->input('company_id')) && !empty($request->input('company_id'))) ? $request->input('company_id') : null;
        Company::updateCompany($company);
    }

    public function postDelete(Request $request){
        $company=CompanyModel::where('id',$request->input('company_id'))->first();
        $result=Company::deleteCompany($company);

        return \Response::json($result);
    }
}
