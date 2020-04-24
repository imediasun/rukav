<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Domain\Company\Facades\Company;
use App\Domain\User\Facades\User;
use App\Http\Controllers\Controller;
use App\Domain\Admin\Models\BadgesGroup as BadgesGroupModel;

class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }


    function base64ToImage($imageData,$entity='logos'){
        $data = 'data:image/png;base64,AAAFBfj42Pj4';
        list($type, $imageData) = explode(';', $imageData);
        list(,$extension) = explode('/',$type);
        list(,$imageData)      = explode(',', $imageData);
        $fileName = uniqid().'.'.$extension;
        $imageData = base64_decode($imageData);
        file_put_contents(storage_path('/app/public/'.$entity.'/'.$fileName), $imageData);
        return $fileName;
    }



    public function saveLogoToSession(Request $request){
    \Session::forget('temp_logo_filename');
    $fileName=$this->base64ToImage($request->input('logo'));
    \Session::put('temp_logo_filename',$fileName);

}
    public function saveSliderToSession(Request $request){
        \Session::forget('temp_slider_filename');
        $fileName=$this->base64ToImage($request->input('slider'),'sliders');
        \Session::put('temp_slider_filename',$fileName);

    }

    public function savePictureToSession(Request $request){
        \Session::forget('temp_picture_filename');
        $fileName=$this->base64ToImage($request->input('picture'),'pictures');
        \Session::put('temp_picture_filename',$fileName);

    }

    public function saveBannerToSession(Request $request){
        \Session::forget('temp_banner_filename');
        $fileName=$this->base64ToImage($request->input('banner'));
        \Session::put('temp_banner_filename',$fileName);

    }

    public function postSaveLogo(Request $request){
    var_dump('ID',$request->input('id'));
    $companyLogo['values']=['name'=>$request->input('logo_name'),'photo'=> \Session::get('temp_logo_filename'),'active'=> 0,'company_id'=>$request->input('company_id')];
    $companyLogo['attributes']['id']=(null!=($request->input('id')) && !empty($request->input('id'))) ? $request->input('id') : null;
    Company::updateCompanyLogo($companyLogo);

}

    public function postSaveSlider(Request $request){
        var_dump('REQUEST',$request->input());
        $companyLogo['values']=['link'=>$request->input('slider_link'),'description'=>$request->input('slider_description'),'name'=>$request->input('slider_name'),'photo'=> \Session::get('temp_slider_filename'),'active'=> 0,'company_id'=>$request->input('company_id')];
        $companyLogo['attributes']['id']=(null!=($request->input('id')) && !empty($request->input('id'))) ? $request->input('id') : null;
        Company::updateCompanySlider($companyLogo);

    }

    public function postSaveBanner(Request $request){
        var_dump('ID',$request->input('id'));
        $companyLogo['values']=['name'=>$request->input('banner_name'),'photo'=> \Session::get('temp_banner_filename'),'active'=> 0,'company_id'=>$request->input('company_id')];
        $companyLogo['attributes']['id']=(null!=($request->input('id')) && !empty($request->input('id'))) ? $request->input('id') : null;
        Company::updateCompanyBanner($companyLogo);

    }

    public function updateLogoStatus(Request $request){

        $status=($request->input('status')=='true') ? 1 :0;
        $companyLogo['values']=['active'=>$status ];
        $companyLogo['attributes']['id']=(null!=($request->input('id')) && !empty($request->input('id'))) ? $request->input('id') : null;

        Company::updateCompanyLogo($companyLogo);
    }

    public function updateSliderStatus(Request $request){

        $status=($request->input('status')=='true') ? 1 :0;
        $companySlider['values']=['active'=>$status ];
        $companySlider['attributes']['id']=(null!=($request->input('id')) && !empty($request->input('id'))) ? $request->input('id') : null;

        Company::updateCompanySlider($companySlider);
    }


    public function updateBannerStatus(Request $request){

        $status=($request->input('status')=='true') ? 1 :0;
        $companyBanner['values']=['active'=>$status ];
        $companyBanner['attributes']['id']=(null!=($request->input('id')) && !empty($request->input('id'))) ? $request->input('id') : null;

        Company::updateCompanyBanner($companyBanner);
    }

    public function updateUserStatus(Request $request){

        $status=($request->input('status')=='true') ? 1 :0;
        $companyLogo['values']=['active'=>$status ];
        $companyLogo['attributes']['id']=(null!=($request->input('id')) && !empty($request->input('id'))) ? $request->input('id') : null;

        User::updateUser($companyLogo);
    }



    public function saveBadgeToSession(Request $request){
        \Session::forget('temp_badge_filename');
        $fileName=$this->base64ToImage($request->input('badge'),'badges');
        \Session::put('temp_badge_filename',$fileName);

    }


    public function updateCompanyStatus(Request $request){

        $status=($request->input('status')=='true') ? 1 :0;
        $companyStatus['values']=['status'=>$status ];
        $companyStatus['attributes']['id']=(null!=($request->input('id')) && !empty($request->input('id'))) ? $request->input('id') : null;

        Company::updateCompany($companyStatus);
    }




    public function updateBadgeStatus(Request $request){

        $status=($request->input('status')=='true') ? 1 :0;
        $companyBadge['values']=['active'=>$status ];
        $companyBadge['attributes']['id']=(null!=($request->input('id')) && !empty($request->input('id'))) ? $request->input('id') : null;

        Company::updateCompanyBadge($companyBadge);
    }

    public function postSaveBadge(Request $request){
        var_dump('ID',$request->input('id'));

        $companyBadge['values']=['name'=>$request->input('badge_name'),'photo'=> \Session::get('temp_badge_filename'),'group_id'=>$request->input('badges_group_id')];
        $companyBadge['attributes']['id']=(null!=($request->input('id')) && !empty($request->input('id') && $request->input('id')!=0)) ? $request->input('id') : null;
        Company::updateCompanyBadge($companyBadge);

    }

    public function getAllBadgesGroups(Request $request){
    $data['badges_groups']=BadgesGroupModel::get();
    $data['company_id']=$request->input('company_id');
    return view('main_admin.companies.badges_groups.modal_table',$data);

    }


    public function emailCheck(Request $request){

        if (null!==($request->input('email'))) {
            $email = $request->input('email');
            $results = \App\User::where('email',$email)->first();
            if ($results) {
                return json_encode("taken");
            }else{
                return json_encode( 'not_taken');
            }

        }
    }

}
