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
        $data['unique_messages']=Connect::where('receiver_id',\Auth::user()->id)->orWhere('sender_id',\Auth::user()->id)->with('sender')->with('message')->with('pictures')->orderBy('created_at')->get();

        return view('customer.cabinet.messages',$data);
    }



}
