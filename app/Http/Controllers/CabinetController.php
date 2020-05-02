<?php

namespace App\Http\Controllers;

use App\Domain\Customer\Models\Connect;
use App\Domain\Customer\Models\Message;
use Illuminate\Http\Request;
use App\Domain\Customer\Facades\Customer;
use Illuminate\Support\Facades\Hash;
use App\Domain\Customer\Models\Customer as CustomerModel;
use App\Domain\Company\Models\CompanySetting;
use App\Domain\Company\Facades\Company;


class CabinetController extends BaseController
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
    public function index()
    {
        $data=$this->mainSettings();

        $data['menu']=$this->menu();
        $data['title']="Staff index";
        $data['keywords']="Ukrainian industry platform";
        $data['description']="Ukrainian industry platform";

        return view('customer.cabinet.index',$data);
    }

    public function postData(Request $request){

        $data['title']="Staff postData";
        $data['messages']=Message::where('sender',\Auth::user()->id)->with('pictures')->get();

        return view('customer.cabinet.table',$data);
    }


    public function messagesData(Request $request){

        $data['title']="Staff postData";
        $data['conversations']=Connect::where('receiver_id',\Auth::user()->id)->orWhere('sender_id',\Auth::user()->id)->with('sender')->with('message')->with('pictures')->groupBy('message_id')->orderBy('created_at')->get();

        return view('customer.cabinet.messages',$data);
    }

    public function conversationData(Request $request){
        $example=Connect::where('id',$request->input('conversation'))->with('author')->first();
        //Если хозяин объявления я то тянуть все конекты в которых receiver_id я и sender_id $example->sender_id
        //Иначе тянуть все коннекты в которых receiver_id $example->receiver_id и sender_id я

        $q=Connect::where(function ($query) use ($example) {
            // subqueries goes here
            if($example->author->id==\Auth::user()->id && ($example->sender_id !==\Auth::user()->id)){
                $finder=$example->sender_id;
            }
            else{
                $finder=$example->receiver_id;
            }
                $query->where(function ($query2) use ($example,$finder) {
                    $query2->where('receiver_id',$finder )->orWhere('sender_id',$finder );
                })->where('receiver_id',\Auth::user()->id)->orWhere('sender_id',\Auth::user()->id);
            })->where('message_id',$example->message_id)->with('message')->with('author');

        $data['conversation']=$q->orderBy('created_at')->get();
        return view('customer.cabinet.messageList',$data);
    }

    public function reloadModelChangeProduct(Request $request){
        $data['message']=Message::where('id',$request->input('message_id'))->first();
        return view('customer.cabinet.reloadModal',$data);
        //return json_encode([$message]);
    }


    public function getModelChangeProduct(Request $request){
        $message=Message::where('id',$request->input('message_id'))->with('pictures')->first();
        return json_encode([$message->pictures->photo]);
    }


}
