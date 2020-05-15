<?php
use App\Events\Test;
Auth::routes(['verify' => true]);
Route::get('/logout', function () {
    Auth::logout();

});


Route::get('/socket', function () {
  $data = [
        'topic_id' => 'onNewData',
        'data' => 'SomeData : ' . rand(1, 100)
    ];
    //\App\Classes\Socket\Pusher::sendDataToServer($data);
	event(new Test('hello world'));
	var_dump('hello world');
    var_dump($data);
	
	
/* 	$options = array(
    'cluster' => 'eu',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    '500e0547867ccfe184af',
    'b8d3a1076b93fe80dd50',
    '1000615',
    $options
  );

  $data['message'] = 'hello world';
  $pusher->trigger('my-channel', 'my-event', $data); */

});




Route::get('/redirect', 'Auth\SiteAdminLoginController@redirectToProvider');
Route::get('/callback/{provider}', 'Auth\SiteAdminLoginController@handleProviderCallback');
Route::get('/private_cabinet', 'CabinetController@index');

Route::get('/auth/redirect/facebook', 'Auth\SiteAdminLoginController@redirectToFacebook');
//Route::get('/callback/{provider}', 'Auth\SiteAdminLoginController@callbackFacebook');

    Route::get('/login', 'Auth\SiteAdminLoginController@showLoginForm')->name('web.login');
    Route::post('/login', 'Auth\SiteAdminLoginController@login')->name('web.login.submit');
    Route::get('/logout', 'Auth\SiteAdminLoginController@getLogout');

Route::get('/send_message_to_client', 'ConnectController@checkData')->name('send_message_to_client')->middleware('auth:web');
Route::get('/connect_to_author/{message_id}', 'ConnectController@index')->name('connect')->middleware('auth:web');
Route::get('/', 'HomeController@index')->name('dashboard');

Route::post('/dropzone', 'Ajax\CompanyController@dropzone');
Route::get('/search', 'FuncController@search');
Route::post('/show_subcat', 'FuncController@show_subcat');
Route::post('/show_subcat_all_levels', 'FuncController@show_subcat_all_levels');
Route::post('/show_subcat_all_levels_back', 'FuncController@show_subcat_all_levels_back');
Route::post('/show_parent_cats', 'FuncController@show_parent_cats');

Route::get('/message/{id}', 'MessageController@index')->name('message');
Route::get('/category/{id}', 'CategoryController@index')->name('category');
//Route::get('/news_feed', 'HomeController@index')->name('dashboard')->middleware('auth:admin');
//Route::get('/dashboard', 'HomeController@index')->name('dashboard')->middleware('auth:admin');
#Route::get('/login', 'Auth\CustomerLoginController@showLoginForm')->name('login');
#Route::post('/login', 'Auth\CustomerLoginController@login')->name('login.submit');
Route::get('/staff', 'StaffController@index');
Route::post('/staff/data', 'StaffController@postData');
Route::post('/cabinet/data', 'CabinetController@postData');
Route::post('/cabinet/messagesData', 'CabinetController@messagesData');
Route::post('/cabinet/favoritsData', 'CabinetController@favoritsData');
Route::post('/cabinet/conversation', 'CabinetController@conversationData');
Route::post('/cabinet/deleteFromFavorites', 'CustomersController@setWishListStatus');

Route::post('/cabinet/reloadModelChangeProduct', 'CabinetController@reloadModelChangeProduct');



Route::post('/staff/role_update', 'StaffController@postSave');
Route::post('/staff_permissions/data', 'StaffController@postPermissionsData');
Route::group(['prefix' => 'customer'],function(){
    Route::get('/get_special/{customer}', 'CustomersController@getSpecial');
    Route::post('/get_theme', 'CustomersController@getTheme');
    Route::post('/user_interface/data', 'CustomersController@postData');
    Route::post('/user_interface/leadersSentData', 'CustomersController@postLeadersBoardSent');
    Route::post('/user_interface/leadersReceivedData', 'CustomersController@postLeadersBoardReceived');

    Route::post('/user_interface/dataSpecial', 'CustomersController@postDataSpecial');
    Route::post('/user_interface/getData', 'CustomersController@getData');
    Route::post('/badge/send', 'CustomersController@sendBadgeMessage');
    Route::post('/badge/update', 'CustomersController@updateBadgeMessage');

    Route::get('/badge/get_addressant', 'CustomersController@getAddressant');
    Route::post('/get_customer_info', 'CustomersController@getCustomerInfo');
    Route::post('/golden_badge/check', 'CustomersController@checkGoldenBadgesCount');

    Route::post('/message/wishList', 'CustomersController@setWishListStatus');
    Route::post('/reload_photo_session', 'CustomersController@reloadPhotoSession');




});

Route::group(['prefix' => 'categories'],function(){
    Route::post('/data', 'CategoryController@postData');
});


Route::group(['prefix' => 'company'],function(){

    Route::post('/banner/update_status', 'Ajax\CompanyController@updateBannerStatus');
    Route::get('/edit_categories', 'Admin\CompaniesController@showEditCategories');
    Route::get('/custom_layouts', 'Admin\CompaniesController@showCustomLayouts');
    Route::post('/banners/data', 'Admin\CompaniesController@postBannersData');
    Route::post('/banner/create', 'Ajax\CompanyController@postSaveBanner');
    Route::post('/update_status', 'Ajax\CompanyController@updateCompanyStatus');
    Route::get('/users_list', 'Admin\CustomersController@index')->name('company.users_list.dashboard');
    Route::post('/users/data', 'Admin\CustomersController@postData');
    Route::post('/users/get', 'Admin\CustomersController@getCustomer');
    Route::post('/users/delete', 'Admin\CustomersController@postDelete');
    Route::post('/users/create', 'Admin\CustomersController@postSave');
    Route::post('/users/is_manager_set', 'Admin\CustomersController@setIsManager');

    Route::post('/save_theme', 'Admin\CompaniesController@saveTheme');
    Route::get('/company_logo', 'Admin\CompaniesController@showLogoPage');
    Route::get('/badges_statistics', 'Admin\CompaniesController@showBadgesStatistic');
    Route::get('/custom_badges', 'Admin\CompaniesController@showCustomBadges');
    Route::post('/badges_groups/get', 'Admin\AdminController@getBadgesGroups');




    Route::get('/managers_list', 'Admin\ManagersController@index')->name('company.managers_list.dashboard');
    Route::post('/managers/data', 'Admin\ManagersController@postData');
    Route::post('/managers/get', 'Admin\ManagersController@getCustomer');
    Route::post('/managers/delete', 'Admin\ManagersController@postDelete');
    Route::post('/managers/create', 'Admin\ManagersController@postSave');


    Route::get('/themes', 'Admin\CompaniesController@themes')->name('company.themes');



    Route::post('/slider/data', 'Admin\CompaniesController@postSliderData');
    Route::post('/slider/get', 'Admin\CompaniesController@getSlider');
    Route::post('/slider/delete', 'Admin\CompaniesController@postSliderDelete');
    Route::post('/slider/saveSliderToSession', 'Ajax\CompanyController@saveSliderToSession');
    Route::post('/photo/saveRootCatPhotoToSession', 'Ajax\CompanyController@saveRootCatPhotoToSession');
    Route::post('/slider/create', 'Ajax\CompanyController@postSaveSlider');
    Route::post('/slider/update_status', 'Ajax\CompanyController@updateSliderStatus');
    Route::post('/root_cat_photos/create', 'Ajax\CompanyController@postSaveRootCatPhoto');


    Route::post('/logo/data', 'Admin\CompaniesController@postLogosData');
    Route::post('/logo/get', 'Admin\CompaniesController@getLogo');
    Route::post('/logo/delete', 'Admin\CompaniesController@postLogoDelete');
    Route::post('/logo/saveLogoToSession', 'Ajax\CompanyController@saveLogoToSession');
    Route::post('/picture/savePictureToSession', 'Ajax\CompanyController@savePictureToSession');
    Route::post('/logo/create', 'Ajax\CompanyController@postSaveLogo');
    Route::post('/logo/update_status', 'Ajax\CompanyController@updateLogoStatus');
    Route::post('/user/update_status', 'Ajax\CompanyController@updateUserStatus');
    Route::post('/badge/data', 'Admin\CompaniesController@postBadgesStatisticData');
    Route::post('/badge/get', 'Admin\CompaniesController@getBadge');
    Route::post('/badge/delete', 'Admin\CompaniesController@postBadgeDelete');
    Route::post('/badge/saveBadgeToSession', 'Ajax\CompanyController@saveBadgeToSession');
    Route::post('/badge/create', 'Ajax\CompanyController@postSaveBadge');
    Route::post('/badge/update_status', 'Ajax\CompanyController@updateBadgeStatus');

});


Route::get('/profile/{token}', 'Admin\AdminController@showProfile')->name('admin.profile.token')->middleware('auth:admin');
Route::get('/profile', 'Admin\AdminController@showProfile')->name('admin.profile')->middleware('auth:admin');
Route::post('/profile/update', 'Admin\AdminController@postUpdate')->name('admin.profile.update');


Route::post('/profile/data', 'Admin\AdminController@postData');

Route::get('/profile/avatar/index', 'Admin\AdminController@showAvatarPage');
Route::post('/profile/avatar/data', 'Admin\AdminController@postAvatarsData');
Route::post('/profile/avatar/get', 'Admin\AdminController@getAvatar');
Route::post('/profile/avatar/delete', 'Admin\AdminController@postAvatarDelete');
Route::post('/profile/avatar/saveAvatarToSession', 'Ajax\AdminController@saveAvatarToSession');
Route::post('/profile/avatar/create', 'Ajax\AdminController@postSaveAvatar');
Route::post('/profile/avatar/update_status', 'Ajax\AdminController@updateAvatarStatus');



Route::group(['prefix' => 'admin'],function(){


    Route::post('/delete_cat','CategoryController@deleteCat');
    Route::post('/change_category_name','CategoryController@changeCatName');
    Route::get('/categories/add','CategoryController@add_show');
    //Route::get('/categories','CategoryController@index');

    Route::get('/view_messages', 'Admin\MessageController@index');
    Route::get('/view_static_pages', 'Admin\StaticPagesController@index');

    Route::get('/view_slider', 'Admin\SliderController@index');
    Route::post('/messages/data', 'Admin\MessageController@postData');
    Route::post('/messages/delete', 'Admin\MessageController@postDelete');
    Route::post('/messages/message_activity_set', 'Admin\MessageController@setIsActive');

    Route::post('/staticpages/data', 'Admin\StaticPagesController@postData');
    Route::post('/staticpages/delete', 'Admin\StaticPagesController@postDelete');
    Route::post('/staticpages/staticpage_activity_set', 'Admin\StaticPagesController@setIsActive');
    Route::post('/staticpages/update_status', 'Admin\StaticPagesController@updateStaticPageStatus');
/*
    Route::get('/login', 'Auth\SiteAdminLoginController@showLoginForm')->name('web.login');
    Route::post('/login', 'Auth\SiteAdminLoginController@login')->name('web.login.submit');
    Route::get('/logout', 'Auth\SiteAdminLoginController@getLogout');*/


    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@getLogout');

    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/roles_and_permissions', 'Admin\StaffController@index')->name('admin.roles.index');


    Route::post('/staff_permissions/data', 'Admin\StaffController@postPermissionsData');
    Route::post('/staff_permissions/change', 'Admin\StaffController@postPermissionsChange');
    Route::post('/staff/data', 'Admin\StaffController@postData');
    Route::post('/staff/role_update', 'Admin\StaffController@postSave');
    Route::post('/staff/get_roles', 'Admin\StaffController@getRoles');

    Route::group(['prefix' => 'main_admin'],function(){
        Route::get('/accesses', 'Admin\AccessesController@index')->name('main_admin.accesses.dashboard');
        Route::post('/accesses/data', 'Admin\AccessesController@postData');
        Route::post('/accesses/getForm', 'Admin\AccessesController@getForm');
        Route::get('/companies', 'Admin\CompaniesController@index')->name('main_admin.companies.dashboard');
        Route::post('/company/create', 'Admin\CompaniesController@postSave');
        Route::post('/company/delete', 'Admin\CompaniesController@postDelete');
        Route::post('/company/get', 'Admin\CompaniesController@getCompany');
        Route::post('/company_badges/get', 'Admin\CompaniesController@getCompanyBadges');
        Route::post('/company_badges/getHtml', 'Ajax\CompanyController@getAllBadgesGroups');

        Route::post('/company/email_check', 'Ajax\CompanyController@emailCheck');

        Route::post('/company/data', 'Admin\CompaniesController@postData');



        Route::get('/badges_groups', 'Admin\AdminController@showBadgesGroups');
        Route::post('/badges_groups/data', 'Admin\AdminController@postBadgesGroupsData');
        Route::post('/badges_groups/get', 'Admin\AdminController@getBadgesGroups');
        Route::post('/badges_groups/delete', 'Admin\AdminController@postBadgesGroupsDelete');
        Route::post('/badges_groups/create', 'Ajax\AdminController@postSaveBadgesGroups');
        Route::post('/badges_groups/update_status', 'Ajax\AdminController@updateBadgesGroupsStatus');






        Route::get('/custom_badges', 'Admin\AdminController@showCustomBadges');




        Route::post('/badge/data', 'Admin\AdminController@postBadgesData');
        Route::post('/badge/get', 'Admin\AdminController@getBadge');
        Route::post('/badge/delete', 'Admin\AdminController@postBadgeDelete');
        Route::post('/badge/saveBadgeToSession', 'Ajax\AdminController@saveBadgeToSession');
        Route::post('/badge/create', 'Ajax\AdminController@postSaveBadge');
        Route::post('/badge/update_status', 'Ajax\AdminController@updateBadgeStatus');


        Route::post('/company/badge/data', 'Admin\CompaniesController@postBadgesData');
        Route::post('/company/badge/get', 'Admin\CompaniesController@getBadge');
        Route::post('/company/badge/delete', 'Admin\CompaniesController@postBadgeDelete');
        Route::post('/company/badge/saveBadgeToSession', 'Ajax\CompanyController@saveBadgeToSession');
        Route::post('/company/badge/create', 'Ajax\CompanyController@postSaveBadge');
        Route::post('/company/badge/update_status', 'Ajax\CompanyController@updateBadgeStatus');


    });




});


/*
Route::get('/',function(){
    return view('index');
});*/






