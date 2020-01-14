<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Domain\Customer\Facades\Customer;
use Illuminate\Support\Facades\Hash;
use App\Domain\Customer\Models\Customer as CustomerModel;
use Illuminate\Support\Str;

class CustomersController extends BaseController
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
            $data['customer']=null;
            $data['company']=\Auth::user()->getCompany[0];

        }


        $data['title']="Додати товар";
        $data['keywords']="Ukrainian industry platform";
        $data['description']="Ukrainian industry platform";

        return view('company.users.index',$data);
    }


    public function postData(Request $request){

        $data['title']="Customers postData";
        $data['customers']=CustomerModel::get();

        return view('company.users.table',$data);
    }

    public function getCustomer(Request $request){
        $data=CustomerModel::where('id',$request->input('customer_id'))->first();

        return $data;
    }


    public function postSave(Request $request){
        $customer['values']=['name'=>$request->input('customer_name'),
            'sername'=>$request->input('customer_sername'),
            'login'=>$request->input('customer_login'),
            'department'=>$request->input('customer_department'),
            'position'=>$request->input('customer_position'),
            'email'=>$request->input('customer_email')
            ,
            'phone'=>$request->input('customer_phone')
            ,
            'info'=>$request->input('customer_info')
            ,
            'address'=>$request->input('customer_address')
            ,
            'photo'=>'/tmp.png'
            ,
            'company_id'=>$request->input('company_id'),
            'manager_id'=>$request->input('manager_id'),
            'password'=> Hash::make('YouCanChangePassword'),
            'remember_token'=> Str::random(60),
            'non_hashed'=>'YouCanChangePassword',

        ];
        $customer['attributes']['id']=(null!=($request->input('customer_id')) && !empty($request->input('customer_id'))) ? $request->input('customer_id') : null;
        Customer::updateCustomer($customer);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function postDelete(Request $request){
    $customer=CustomerModel::where('id',$request->input('customer_id'))->first();
    $result=Customer::deleteCustomer($customer);
    return \Response::json($result);
    }

}
