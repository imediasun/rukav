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

        $data['goods']=\App\Domain\Customer\Models\Message::where('category_id',$id)->with('pictures')->get();
        $data['keywords']="Ukrainian industry platform";
        $data['description']="Ukrainian industry platform";
if($type){return view('customer.category.list',$data);}else{return view('customer.category.index',$data);}

    }

    public function add_show(){
        $data=array();
        $data['menu']=$this->menu();
        $data['categories']=Category::orderBy('parent_id', 'asc')
            ->orderBy('created_at', 'desc')
            ->orderBy('updated_at', 'desc')
            ->get();

        $this->title = 'Панель администратора';
        return view('superadmin/add_category',$data);
    }

    public function changeCatName(Request $request){
        $data=[
            'link'=>$request->input('link'),
            'name'=>$request->input('name')

        ];
        if($request->input('action')=='add'){
            $data['parent_id']=$request->input('parent_id');
            \App\Domain\Customer\Models\ProductCategory::insert($data);
        }
        else{
        \App\Domain\Customer\Models\ProductCategory::where('id',$request->input('id'))->update($data);}

        return json_encode(['message'=>'success']);
    }
}
