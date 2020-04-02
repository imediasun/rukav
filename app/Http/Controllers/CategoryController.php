<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends BaseController
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
    public function index($id,$type=null)
    {
        $data=$this->mainSettings();
        $data['menu']=$this->menu();
        $data['rubrics']=$this->rubrics();
        $data['spacial_customer_id']=null;
        $data['title']="Додати товар";

        $data['goods']=\App\Domain\Customer\Models\Message::where('category_id',$id)->get();
        $data['keywords']="Ukrainian industry platform";
        $data['description']="Ukrainian industry platform";
if($type){return view('customer.category.list',$data);}else{return view('customer.category.index',$data);}

    }
}
