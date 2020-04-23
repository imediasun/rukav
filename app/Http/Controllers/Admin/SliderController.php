<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Domain\Customer\Models\Message as MessageModel;
use App\Domain\Customer\Facades\Message;

class SliderController extends BaseController
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
        $data['spacial_customer_id']=null;
        $data['title']="Додати товар";
        $data['slides']=\App\Domain\Customer\Models\Message::get();
        $data['keywords']="Ukrainian industry platform";
        $data['description']="Ukrainian industry platform";
        return view('main_admin.slider.index',$data);

    }

    public function postData(Request $request){

        $data['title']="Company postData";
        $data['slides']=MessageModel::with('pictures')->get();
        return view('main_admin.sider.table',$data);
    }

    public function postDelete(Request $request){
        $message=\App\Domain\Customer\Models\Message::where('id',$request->input('message_id'))->first();
            $result = Message::deleteMessage($message);
            return \Response::json($result);

    }
    public function setIsActive(Request $request){
        $message_data['attributes']['id']= $request->input('message');
        if($request->input('state')=='true'){
            $message_data['values']=[
                'active'=>true
            ];

        }
        else{
            $message_data['values']=[
                'active'=>false
            ];
        }



        $result=Message::updateMessage($message_data);
        return \Response::json($result);

    }


}
