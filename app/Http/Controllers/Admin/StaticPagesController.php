<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Domain\Customer\Models\Message as StaticPageModel;
use App\Domain\Customer\Facades\StaticPage;

class StaticPagesController extends BaseController
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
        $data['messages']=\App\Domain\Customer\Models\StaticPage::get();
        $data['keywords']="Ukrainian industry platform";
        $data['description']="Ukrainian industry platform";
        return view('main_admin.staticpages.index',$data);

    }

    public function postData(Request $request){

        $data['title']="Company postData";
        $data['staticpages']=\App\Domain\Customer\Models\StaticPage::get();
        return view('main_admin.staticpages.table',$data);
    }

    public function postDelete(Request $request){
        $message=\App\Domain\Customer\Models\StaticPage::where('id',$request->input('staticpage_id'))->first();
            $result = Message::deleteStaticPage($message);
            return \Response::json($result);

    }
    public function setIsActive(Request $request){
        $message_data['attributes']['id']= $request->input('staticpage');
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



        $result=StaticPage::updateStaticPage($message_data);
        return \Response::json($result);

    }


    public function updateStaticPageStatus(Request $request){

        $status=($request->input('status')=='true') ? 1 :0;
        $companySlider['values']=['active'=>$status ];
        $companySlider['attributes']['id']=(null!=($request->input('id')) && !empty($request->input('id'))) ? $request->input('id') : null;

        Company::updateCompanyStaticPage($companySlider);
    }


}
