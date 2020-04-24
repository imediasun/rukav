<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends BaseController
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
    public function index($id)
    {
        $data=$this->mainSettings();
        $data['menu']=$this->menu();
        $data['rubrics']=$this->rubrics();
        $data['spacial_customer_id']=null;
        $data['title']="Додати товар";

        $data['message']=\App\Domain\Customer\Models\Message::where('id',$id)->with('pictures')->first();
        $data['keywords']="Ukrainian industry platform";
        $data['description']="Ukrainian industry platform";
        return view('customer.message.index',$data);

    }


}
