<?php

namespace App\Http\Controllers;

use App\Domain\Customer\Models\Connect;
use App\Domain\Customer\Models\Message;
use App\Domain\Customer\Models\Wishlist;
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

        return view('new.customer.cabinet.index',$data);
        //return view('customer.cabinet.index',$data);
    }

    public function postData(Request $request){

        $data['title']="Staff postData";
        $data['messages']=Message::where('sender',\Auth::user()->id)->with('pictures')->get();
        return view('new.customer.cabinet.table',$data);
        //return view('customer.cabinet.table',$data);
    }


    public function messagesData(Request $request){

        $data['title']="Staff postData";
        $conversations=Connect::where('receiver_id',\Auth::user()->id)->orWhere('sender_id',\Auth::user()->id)
            ->with('sender')->with('message')->with('pictures')
            ->groupBy('message_id','receiver_id')->distinct()->orderBy('created_at')->get();

    $collection=collect($conversations)->map(function ($name) use ($conversations) {

        foreach($conversations as $conv){
            if($name->receiver_id == \Auth::user()->id && ($name->receiver_id==$conv->sender_id && $name->message_id==$conv->message_id ) ){
                return $name;
            }
            continue;
            }


    });
foreach($collection as $coll){
    if(null!=$coll){
        $data['conversations'][]=$coll;
    }
}
        //dump($data['conversations']);
        //dump(count($data['conversations']));
//dump($data['conversations']);
        return view('new.customer.cabinet.messages',$data);
        //return view('customer.cabinet.messages',$data);
    }

    public function favoritsData(Request $request){

        $data['title']="Staff postData";
        $result=Wishlist::where('user_id',\Auth::user()->id)->where('active',1)->get();
        $data['messages']=[];
            foreach($result as $res){
                $data['messages'][]=Message::where('id',$res->message_id)->with('pictures')->first();
            }
        return view('customer.cabinet.tableFavorits',$data);
    }

    public function conversationData(Request $request){
        $example=Connect::where('id',$request->input('conversation'))->with('author')->first();
        //Если хозяин объявления я то тянуть все конекты в которых receiver_id я и sender_id $example->sender_id
        //Иначе тянуть все коннекты в которых receiver_id $example->receiver_id и sender_id я
//dump($example);
$recepients=[$example->sender_id,$example->receiver_id];
        $q=Connect::where('message_id',$example->message_id)->whereIn('receiver_id',$recepients)->whereIn('sender_id',$recepients)->with('message')->with('author');

        $data['conversation']=$q->orderBy('created_at')->get();

        //dump($data['conversation']);
        return view('new.customer.cabinet.messageList',$data);
        //return view('customer.cabinet.messageList',$data);
    }

    public function reloadModelChangeProduct(Request $request){
        $data['message']=Message::where('id',$request->input('message_id'))->with('parentCategory')->with('pictures')->first();
        return view('customer.cabinet.reloadModal',$data);
        //return json_encode([$message]);
    }

}
