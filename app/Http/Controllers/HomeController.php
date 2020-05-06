<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends BaseController
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
        $data['rubrics']=$this->rubrics();
        $data['spacial_customer_id']=null;
        $data['user']=(\Auth::user()) ? \Auth::user() : null;
        $data['title']="Додати товар";
        $data['sliders']=\App\Domain\Company\Models\Slider::get();
        $data['keywords']="Ukrainian industry platform";
        $data['description']="Ukrainian industry platform";
        return view('new.customer.dashboard.index',$data);
       // return view('customer.dashboard.index',$data); old rukav
    }
}
