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
        $data['menu']=$this->menu();
        $user=\Auth::user();
        $data['company_id']=$user->company_id;
        $data['title']="Додати товар";
        $data['keywords']="Ukrainian industry platform";
        $data['description']="Ukrainian industry platform";

        return view('customer.dashboard.index',$data);
    }
}
