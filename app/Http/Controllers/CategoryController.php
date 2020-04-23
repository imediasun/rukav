<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
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
    public function index($id)
    {
        $data=$this->mainSettings();
        $data['user']= \Auth::user();
        $data['menu']=$this->menu();
        $data['category_id']=$id;
        $data['category_name']=\App\Domain\Customer\Models\ProductCategory::where('id',$id)->first()->name;
        $data['type']=Input::get('type');
        $data['rubrics']=$this->rubrics();
        $data['spacial_customer_id']=null;
        $data['title']="Додати товар";
        $data['current_url']='/category/'.$id;
        $currentPage = Input::get('page');
        $from=Input::get('price_from');
        $to=Input::get('price_to');
        // Make sure that you call the static method currentPageResolver()
        // before querying users
        \Illuminate\Pagination\Paginator::currentPageResolver(function () use ($currentPage) {
            return $currentPage;
        });

        $data['goods']=\App\Domain\Customer\Models\Message::where('category_id',$id)
            ->with('pictures')->where('active',1)->
            where(function ($query) use($from,$to) {
                if(!empty($from) && !empty($to)){
                    $query->where('price','>=',$from)
                        ->where('price','<=',$to);
                }
            })->paginate(3);
if($data['type']=='list'){return view('customer.category.list',$data);}else{return view('customer.category.index',$data);}

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


    public function postData(Request $request){

    }
}
