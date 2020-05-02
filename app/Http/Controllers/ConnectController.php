<?php

namespace App\Http\Controllers;

use App\Domain\Customer\Models\Message;
use App\User;
use Illuminate\Http\Request;
use App\Domain\Customer\Facades\Connect;


class ConnectController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $connectService;

    public function __construct()
    {
       parent::__construct();
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($message_id)
    {

        $data=$this->mainSettings();
        $data['menu']=$this->menu();
        $data['rubrics']=$this->rubrics();
        $data['spacial_customer_id']=null;
        $data['user']=(\Auth::user()) ? \Auth::user() : null;
        $data['title']="Додати товар";
        $data['message']=\App\Domain\Customer\Models\Message::where('id',$message_id)->with('getSender')->first();
        $data['keywords']="Ukrainian industry platform";
        $data['description']="Ukrainian industry platform";

        return view('customer.connect.index',$data);
    }

    public function checkData(Request $request){
        $user=User::where('id',$request->input('client_id'))->first();
        if (preg_match('/\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/si', $request->input('text')))
        {
        dd("Contains an email");}
        else{
            $message['values']=['text'=>$request->input('text'),
                'receiver_id'=>$user->id,
                'sender_id'=>\Auth::user()->id,
                'message_id'=>$request->input('message_id')

            ];
            $message['attributes']['id']=(null!=($request->input('connect_id')) && !empty($request->input('connectr_id'))) ? $request->input('connect_id') : null;

            if($message){


                Connect::updateConnect($message);

            }
        }
        return json_encode(['message'=>'success']);
    }
}
