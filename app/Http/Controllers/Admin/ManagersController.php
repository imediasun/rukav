<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Domain\Manager\Facades\Manager;
use Illuminate\Support\Facades\Hash;
use App\Domain\Manager\Models\Manager as ManagerModel;
use Illuminate\Support\Str;

class ManagersController extends BaseController
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
        $data['menu']=$this->menu();
        $role=\Auth::user()->roles;

        if($role[0]->id==4){
            $data['manager']=null;
            $data['company']=\Auth::user()->getCompany[0];
            $data['company_id']=\Auth::user()->getCompany[0]->id;
        }


        $data['title']="Додати товар";
        $data['keywords']="Ukrainian industry platform";
        $data['description']="Ukrainian industry platform";

        return view('company.managers.index',$data);
    }


    public function postData(Request $request){

        $data['title']="Managers postData";
        $data['managers']=ManagerModel::get();

        return view('company.managers.table',$data);
    }

    public function getManager(Request $request){
        $data=ManagerModel::where('id',$request->input('manager_id'))->first();

        return $data;
    }


    public function postSave(Request $request){

        $user['values']=['name'=>$request->input('manager_name'),

            'login'=>$request->input('manager_login'),
            'department'=>$request->input('manager_department'),
            'email'=>$request->input('manager_email'),
            'password'=> Hash::make('YouCanChangePassword')
            ,'info'=>$request->input('manager_info'),'phone'=>$request->input('manager_phone')
            ,'address'=>$request->input('manager_address'),
            'remember_token'=> Str::random(60),
            'non_hashed'=>'YouCanChangePassword',

        ];
        $user['attributes']['id']=(null!=($request->input('user_id')) && !empty($request->input('user_id'))) ? $request->input('user_id') : null;
        User::updateUser($user);
        
        $manager['values']=[
            'photo'=>'/tmp.png',
            'user_id'=>$request->input('user_id'),
            'company_id'=>$request->input('company_id'),
            'info'=>$request->input('manager_info'),'address'=>$request->input('manager_address'),


        ];
        $manager['attributes']['id']=(null!=($request->input('manager_id')) && !empty($request->input('manager_id'))) ? $request->input('manager_id') : null;
        Manager::updateManager($manager);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function postDelete(Request $request){
    $manager=ManagerModel::where('id',$request->input('manager_id'))->first();
    $result=Manager::deleteManager($manager);
    return \Response::json($result);
    }

}
