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
        return view('new.customer.connect.index',$data);
        //return view('customer.connect.index',$data);
    }

    public function checkData(Request $request){
        $user=User::where('id',$request->input('client_id'))->first();
        if (preg_match('/\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/si', $request->input('text')))
        {
        dd("Contains an email");}
        else{
            var_dump('popali');
            $message['values']=['text'=>$request->input('text'),
                'receiver_id'=>$user->id,
                'sender_id'=>\Auth::user()->id,
                'message_id'=>$request->input('message_id'),
                'is_viewed'=>0

            ];
            $message['attributes']['id']=(null!=($request->input('connect_id')) && !empty($request->input('connect_id'))) ? $request->input('connect_id') : null;

            if($message){


                $con=Connect::updateConnect($message);
				var_dump($con);
				var_dump('receiver-'.$user->id.'-');
				$options = array(
				'cluster' => 'eu',
				'useTLS' => true
			  );
			  $pusher = new \Pusher\Pusher(
				'500e0547867ccfe184af',
				'b8d3a1076b93fe80dd50',
				'1000615',
				$options
			  );

			  $data['message_id'] = $request->input('message_id');
			  $data['sender_id'] = \Auth::user()->id;
			  $data['text'] = $request->input('text');
			  $data['created'] = $con->created_at;
			  $pusher->trigger('my-channel', /* 'my-event' */'receiver-'.$user->id.'-', $data);
			  $notification['created'] = $con->created_at;
			  $pusher->trigger('notification-channel', /* 'my-event' */'notification-'.$user->id.'-', $notification);

            }
        }
        return json_encode(['message'=>'success']);
    }
}
