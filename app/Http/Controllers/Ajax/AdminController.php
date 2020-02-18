<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Domain\Admin\Facades\Admin;
use App\Http\Controllers\Controller;
use App\Domain\Company\Facades\Company;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }


    function base64ToImage($imageData){
        $data = 'data:image/png;base64,AAAFBfj42Pj4';
        list($type, $imageData) = explode(';', $imageData);
        list(,$extension) = explode('/',$type);
        list(,$imageData)      = explode(',', $imageData);
        $fileName = uniqid().'.'.$extension;
        $imageData = base64_decode($imageData);
        file_put_contents(storage_path('/app/public/avatars/'.$fileName), $imageData);
        return $fileName;
    }

    public function saveAvatarToSession(Request $request){
        \Session::forget('temp_avatar_filename');
        $fileName=$this->base64ToImage($request->input('avatar'));
        \Session::put('temp_avatar_filename',$fileName);

    }

    public function postSaveAvatar(Request $request){

        $companyAvatar['values']=['name'=>$request->input('avatar_name'),'photo'=> \Session::get('temp_avatar_filename'),'active'=> 0,'user_id'=>$request->input('user_id')];
        $companyAvatar['attributes']['id']=(null!=($request->input('id')) && !empty($request->input('id'))) ? $request->input('id') : null;
        Admin::updateAdminAvatar($companyAvatar);

    }

    public function updateAvatarStatus(Request $request){

        $status=($request->input('status')=='true') ? 1 :0;
        $companyAvatar['values']=['active'=>$status ];
        $companyAvatar['attributes']['id']=(null!=($request->input('id')) && !empty($request->input('id'))) ? $request->input('id') : null;

        Admin::updateCompanyAvatar($companyAvatar);
    }

    public function postSaveBadgesGroups(Request $request){

        $badgesGroup['values']=['name'=>$request->input('badges_group_name')];
        $badgesGroup['attributes']['id']=(null!=($request->input('id')) && !empty($request->input('id'))) ? $request->input('id') : null;
        Admin::updateBadgesGroup($badgesGroup);

    }

    public function postSaveBadge(Request $request){

        $companyBadge['values']=['name'=>$request->input('badge_name'),'photo'=> \Session::get('temp_badge_filename'),'group_id'=>$request->input('badges_group_id')];
        $companyBadge['attributes']['id']=(null!=($request->input('id')) && !empty($request->input('id'))) ? $request->input('id') : null;
        Company::updateCompanyBadge($companyBadge);

    }



    public function updateBadgesGroupsStatus(Request $request){
        $status=($request->input('status')=='true') ? 1 :0;
        $companyBadge['values']=['active'=>$status,'badges_group_id'=>$request->input('badges_group_id'),'company_id'=> $request->input('company_id')];
        $current_row=\App\Domain\Company\Models\CompanyBadge::where('company_id',$request->input('company_id'))->where('badges_group_id',$request->input('badges_group_id'))->first();
        $companyBadge['attributes']['id']=($current_row) ?  $current_row->id : ((null!=($request->input('company_badges_id')) && !empty($request->input('company_badges_id'))) ? $request->input('company_badges_id') : null);

        Admin::updateCompanyBadge($companyBadge);
    }

}
