<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain\Customer\Facades\Customer;
use Illuminate\Support\Facades\Hash;
use App\Domain\Customer\Models\Customer as CustomerModel;
use App\Domain\Company\Models\CompanySetting;
use App\Domain\Company\Facades\Company;


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
    public function getTheme(Request $request)
    {

        $company_settings=CompanySetting::where('id',$request->input('company_id'))->first();
        return json_encode($company_settings);
    }

    public function getData(Request $request){
        $data['next_button']=true;
        $data['previous_button']=true;
        $perpage=$request->input('perpage');
        $action=$request->input('action');
        $page=$request->input('page');
        //$page=$current/$perpage;

        //var_dump('current',$current);
        $new_last_message=$request->input('page')+$perpage;
        $show_previous_message=$request->input('id')-$perpage;
        $users_messages=\App\Domain\Customer\Models\Message::where('addressant',$request->input('user_id'))->with('getSender')->with('badge')->orderBy('created_at', 'DESC')->orderBy('id', 'DESC')->get();
        $last_message=$users_messages->first();
        $users_messages_=\App\Domain\Customer\Models\Message::where('addressant',$request->input('user_id'))->with('getSender')->with('badge')->orderBy('created_at', 'ASC')->orderBy('id', 'ASC')->get();
        $end_message=$users_messages_->first();
        $i=1;
        $count=count($users_messages);
        $result=[];


        if($action=='next'){
            $start=($perpage*$page);
             $finish=$start+$perpage;
            $data['page']=$page+1;
        }
        elseif($action=='previous'){

            $finish=($perpage*($page-1));

            $tmp=($perpage*$page);
            $left=$count-$tmp;
            $start=$finish-$perpage;
            //$finish=$tmp/$page;
            $data['page']=$page-1;
            //var_dump($page,$perpage,$tmp,$left,$finish,$start);
        }
        else{
            $data['page']=$page;
        }



        foreach($users_messages as $message){



            if($action=='start'){
                if($i>0 && $i<$perpage+1){
                    $result[]=$message;
                    $current=$perpage;
                }
            }
            elseif($action=='previous' ){

                if($i>$start && $i<= $finish){
                   //var_dump('i',$i);
                    $result[]=$message;
                }
            }
            elseif($action=='next' ){
               // var_dump($i,$current,$limit);
                if($i>$start && $i<=$finish){
                    $result[]=$message;

                }
            }


            $i++;
        }
    if($action=='previous' ){
        //var_dump($result);die();
        }

       foreach($result as $res){
        if($res->id==$end_message->id){
            $data['next_button']=false;
        }


       }

        foreach($result as $res){
            if($res->id==$last_message->id){
                $data['previous_button']=false;
            }


        }

        $data['result']=$result;
        $data['previous']=$show_previous_message;

        \Session::push('last_message',$last_message);

        \Session::push('page',$data['page']);
        $data['next']=$new_last_message;
        return json_encode($data);

    }

    public function postData(Request $request){
        $data['messages']=$request->input('array');
        $data['last']=\Session::get('last_message');
        \Session::forget('last_message');
        $data['page']=\Session::get('page');
        \Session::forget('page');
         return view('customer.dashboard.table',$data);
    }

    public function sendBadgeMessage(Request $request){
        $user=\Auth::user();
        $data['user_id']=$user->id;
        $data['company_id']=$user->getCustomersCompany->company_id;
        $message['values']=[
        'addressant'=>$request->input('customer'),
        'sender'=>$data['user_id'],
        'company_id'=>$data['company_id'],
        'title'=>$request->input('title'),
        'message'=>$request->input('message'),
        'badge_id'=>$request->input('badge'),
    ];

        $message['attributes']['id']=(null!=($request->input('customer_id')) && !empty($request->input('customer_id'))) ? $request->input('customer_id') : null;
        Customer::updateMessage($message);

    }



}
