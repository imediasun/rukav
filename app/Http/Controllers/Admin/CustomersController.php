<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Domain\Customer\Facades\Customer;
use App\Domain\User\Facades\User as UserFacade;
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
        $data=$this->mainSettings();
        $data['menu']=$this->menu();
        $role=\Auth::user()->roles;

        if($role[0]->id==4){
            $data['customer']=null;
            $data['company']=\Auth::user()->getCompany[0];
            $data['company_id']=\Auth::user()->getCompany[0]->id;
        }


        $data['title']="Додати товар";
        $data['keywords']="Ukrainian industry platform";
        $data['description']="Ukrainian industry platform";

        return view('company.users.index',$data);
    }


    public function postData(Request $request){

        $data['title']="Customers postData";
        $company_id=\Auth::user()->getCompany[0]->id;
        /*$data['customers']=\App\User::join('customers', function ($join) use ($company_id) {
            $join->on('users.id', '=', 'customers.user_id')
                ->where('customers.company_id', $company_id);
        })->with('getCustomersCompany')->get();*/

        $data['customers']=\App\User::where('company_id',$company_id)->with('getCustomersCompany')->get();


        //rightJoin('customers', 'users.id', '=', 'user_id')->where('customers.company_id',$company_id)
        return view('company.users.table',$data);
    }

    public function getCustomer(Request $request){
        $data=CustomerModel::where('id',$request->input('customer_id'))->first();

        return $data;
    }


    public function postSave(Request $request){
        $user['values']=['name'=>$request->input('customer_name'),
            'sername'=>$request->input('customer_sername'),
            'email'=>$request->input('customer_email'),
            'company_id'=>$request->input('company_id'),
            'password'=>Hash::make('PasswordYouCanChangeIT'),
            'non_hashed'=>'PasswordYouCanChangeIT',
            'active'=>1,
            'remember_token'=>Str::random(60)];
        $user['attributes']['id']=null;

        $user=UserFacade::updateUser($user);

        $role_data=[
            'role_id' => 5,
            'model_type'=>'App\User',
            'model_id'=>$user->id
        ];
        \App\ModelHasRole::insert($role_data);
        $customer['values']=[
            'user_id'=>$user->id,
            'start_date'=>\Carbon\Carbon::now(),
            'birth_date'=>\Carbon\Carbon::now(),
            'sex'=>$request->input('customer_sex'),
            'location'=>$request->input('customer_location'),
            'login'=>$request->input('customer_login'),
            'department'=>$request->input('customer_department'),
            'position'=>$request->input('customer_position'),

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
            'password'=> Hash::make('PasswordYouCanChangeIT'),
            'remember_token'=> Str::random(60),
            'non_hashed'=>'PasswordYouCanChangeIT',

        ];
        $customer['attributes']['id']=(null!=($request->input('customer_id')) && !empty($request->input('customer_id'))) ? $request->input('customer_id') : null;
        Customer::updateCustomer($customer);


    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function postDelete(Request $request){
    $customer=\App\User::where('id',$request->input('customer_id'))->first();
    $result=Customer::deleteCustomer($customer);
    return \Response::json($result);
    }

}
