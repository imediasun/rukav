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


        $user=\Auth::user();
        $data['user_id']=$user->id;
        $data['manager_id']=($user->manager) ? $user->manager->user_id : null;
        $data['company_id']=$user->company_id;
        //var_dump($data['manager_id']);
        $data['next_button']=true;
        $data['previous_button']=true;
        $perpage=$request->input('perpage');
        $action=$request->input('action');
        $page=$request->input('page');
        //$page=$current/$perpage;

        //var_dump('current',$current);
        $new_last_message=$request->input('page')+$perpage;
        $show_previous_message=$request->input('id')-$perpage;

        $query=\App\Domain\Customer\Models\Message::where('company_id',$data['company_id'])->with('manager')->with('getAddressant')->with('getSender')->with('badge')->orderBy('created_at', 'DESC')->orderBy('id', 'DESC');


        $query_=\App\Domain\Customer\Models\Message::where('company_id',$data['company_id'])->with('manager')->with('getAddressant')->with('getSender')->with('badge')->orderBy('created_at', 'ASC')->orderBy('id', 'ASC');


        if( null!==($request->input('special_customer')))
        {
            //var_dump($request->input('special_customer'));
            //$special_user=\App\User::where('id',$request->input('special_customer'))->first();
            $query=$query->where("addressant",$request->input('special_customer'));
            $query_=$query_->where("addressant",$request->input('special_customer'));
            $data['user_id']=$request->input('special_customer');
        }
        $users_messages=$query->get();
        $users_messages_=$query_->get();
        $last_message=$users_messages->first();
        $end_message=$users_messages_->first();
        $i=1;
        $count=count($users_messages);

        $result=[];
        //var_dump($users_messages->first()->manager->user_id);
        switch($request->input('lenta_filter')){
            case 0:
                $filter='';
                break;
            case 1:
            $users_messages=$users_messages->filter(function($message) use($data) {
                if($message->manager){
                    return $message->manager->user_id ==$data['manager_id'];}

            });
                break;
            case 2:
                $users_messages=$users_messages->filter(function($message) use($data) {
                        return $message->addressant ==$data['user_id'];

                });
                break;
        }
        //Отфильтровать только те месаджи которые имеют visibility 1 || 3 && принадлежать этому сотруднику || 2 && текущий сотрудник является менеджером адрессанту
        $users_messages=$users_messages->filter(function($message) use($data) {
            //найти менеджера аддрессанта
            $company_id=\App\User::where('id',$message->addressant)->first()->company_id;

            $manager=\App\Domain\Manager\Models\Manager::where('user_id',$data['user_id'])->where('company_id',$company_id)->first();

            //dump($message->visibility,$message->addressant);
            return (($message->visibility==1) || ( $message->visibility==3 && $message->sender==$data['user_id']) || ($message->visibility==2 && null!==$manager) ) == true;

        });
        \Log::info('USERS_MESSAGES_COUNT'.count($users_messages));
        if($action=='next'){
            $start=($perpage*$page);
             $finish=$start+$perpage;
            //Высчитать остаток непоказанных бейджей
            \Log::info('START'.$start);
            \Log::info('$finish'.$finish);

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
            $finish=4;
            $data['page']=1;//$page;
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
\Log::info('RESULT_COUNT'.count($users_messages));

    if(empty($result)){
        $data['next_button']=false;
        $data['previous_button']=false;
    }

       foreach($result as $res){
        if($res->id==$end_message->id || ($finish>=count($users_messages)) || count($users_messages)==0 ){
            $data['next_button']=false;
        }


       }

        foreach($result as $res){
            if($res->id==$last_message->id || count($users_messages)==0 ){
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

    public function postLeadersBoardSent(Request $request){
        $user=\Auth::user();
        $data['company_id']=$user->company_id;
        $data['leadersBoardSentS']=\App\User::with('messagesSent')->with('getCustomersCompany')
            ->where('company_id',$data['company_id'])->with('messagesReceived')
            ->get();
        foreach($data['leadersBoardSentS'] as $sent){
            $sent->sentCount=count($sent->messagesSent);
            $sent->receivedCount=count($sent->messagesReceived);
        }
        $data['leadersBoardSentS']->sortByDesc('sentCount')->take(4);
        $i=1;
        foreach($data['leadersBoardSentS'] as $sent){
           if($i<=4){$data['leadersBoardSent'][]=$sent;}
            $i++;
        }
        return view('customer.dashboard.leaders_sent',$data);
    }

    public function postLeadersBoardReceived(Request $request){
        $user=\Auth::user();
        $data['company_id']=$user->company_id;
        $data['leadersBoardReceivedS']=\App\User::with('messagesSent')->with('getCustomersCompany')
            ->where('company_id',$data['company_id'])->with('messagesReceived')
            ->get();
        foreach($data['leadersBoardReceivedS'] as $sent){
            $sent->sentCount=count($sent->messagesSent);
            $sent->receivedCount=count($sent->messagesReceived);
        }
        $data['leadersBoardReceivedS']->sortByDesc('receivedCount')->take(4);
        $i=1;
        foreach($data['leadersBoardReceivedS'] as $sent){
            if($i<=4){$data['leadersBoardReceived'][]=$sent;}
            $i++;
        }
        return view('customer.dashboard.leaders_received',$data);
    }

    public function postDataSpecial(Request $request){
        $data['messages']=$request->input('array');
        $data['last']=\Session::get('last_message');
        \Session::forget('last_message');
        $data['page']=\Session::get('page');
        \Session::forget('page');
        return view('customer.special.table',$data);
    }

    public function sendBadgeMessage(Request $request){
      $user=\Auth::user();
        $data['user_id']=$user->id;
        $data['company_id']=$user->company_id;
        $message['values']=[
        'category_id'=>$request->input('category'),//$request->input('customer')
        'sender'=>$data['user_id'],
        'company_id'=>$data['company_id'],
        'title'=>$request->input('title'),
        'message'=>$request->input('message'),
         'place_id'=>$request->input('location'),
        'badge_id'=>1,
         'visibility'=>1,//$request->input('visibility')
    ];

        $message['attributes']['id']=(null!=($request->input('customer_id')) && !empty($request->input('customer_id'))) ? $request->input('customer_id') : null;
        $id=Customer::updateMessage($message);
        $companyLogo['values']=['message_id'=>$id->id,'photo'=> \Session::get('temp_picture_filename')];
        $companyLogo['attributes']['id']= null;
        Company::updateCompanyPicture($companyLogo);

    }


    public function getAddressant(Request $request){
        //var_dump(\Auth::user()->id);
    $users=\App\User::where('company_id',\Auth::user()->company_id)->whereNotIn('id', [\Auth::user()->id])
        ->where(function($query) use($request)
    {
        $query->where('name','like','%'.$request->input('q').'%')
            ->orWhere('sername','like','%'.$request->input('q').'%');
    })->with('getCustomersCompany')->get();//
    //var_dump(count($users));
    $data=[];
    foreach($users as $user){

            if(isset($user->getCustomersCompany) && $user->getCustomersCompany!==null){
                //var_dump($user->getCustomersCompany->photo);
                $data['items'][]=[
                    'id'=>$user->id,
                    'full_name'=>$user->name.' '.$user->sername,
                    'forks_count'=>35,
                    'owner'=>[
                        'avatar_url'=>'/storage/avatars/'.$user->getCustomersCompany->photo

                    ]
                ];
            }
        }

        $sata=[
            'items'=>[
                0=>[
                    'id'=>1,
                    'full_name'=>'AS',
                    'forks_count'=>3,
                    'owner'=>[
                        'avatar_url'=>'/storage/avatars/5e1a1b782dda7.jpeg'

                ]

                ]

            ],
        ];

       return json_encode($data);
    }

    public function getCustomerInfo(Request $request){
        $user=\App\User::where('id',$request->input('customer_id'))->first();
        return json_encode($user);
    }


    public function checkGoldenBadgesCount(Request $request){
        $today = \Carbon\Carbon::today();
        $currentMonth = date('m');
        //golden_badges
        $golden_badges=\App\Domain\Company\Models\Badge::where('is_golden',true)->get();
        $golden_array=[];
        foreach($golden_badges as $golden_badge ){
            $golden_array[]=$golden_badge->id;
        }
        $badges_in_current_month=\App\Domain\Customer\Models\Message::where('sender',$request->input('customer'))->whereRaw('MONTH(created_at) = ?',[$currentMonth])->whereIn('badge_id',$golden_array)->get();
    return count($badges_in_current_month);
    }

    public function getSpecial($customer_id){
        $data=$this->mainSettings();
        $data['menu']=$this->menu();
        $data['special_customer']=\App\User::where('id',$customer_id)->with('getCustomersCompany')->first();
        $data['special_customer_id']=$data['special_customer']->id;
        $data['title']="Додати товар";
        $data['keywords']="Ukrainian industry platform";
        $data['description']="Ukrainian industry platform";

        return view('customer.special.index',$data);
    }

    public function messages(){


    }


}
