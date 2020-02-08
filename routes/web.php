<?php
Auth::routes(['verify' => true]);
Route::get('/logout', function () {
    Auth::logout();

});

Route::get('/', 'HomeController@index')->name('dashboard')->middleware('auth:admin');
Route::get('/news_feed', 'HomeController@index')->name('dashboard')->middleware('auth:admin');
Route::get('/dashboard', 'HomeController@index')->name('dashboard')->middleware('auth:admin');
#Route::get('/login', 'Auth\CustomerLoginController@showLoginForm')->name('login');
#Route::post('/login', 'Auth\CustomerLoginController@login')->name('login.submit');
Route::get('/staff', 'StaffController@index');
Route::post('/staff/data', 'StaffController@postData');
Route::post('/staff/role_update', 'StaffController@postSave');
Route::post('/staff_permissions/data', 'StaffController@postPermissionsData');
Route::group(['prefix' => 'customer'],function(){
    Route::get('/get_special/{customer}', 'CustomersController@getSpecial');
    Route::post('/get_theme', 'CustomersController@getTheme');
    Route::post('/user_interface/data', 'CustomersController@postData');
    Route::post('/user_interface/dataSpecial', 'CustomersController@postDataSpecial');
    Route::post('/user_interface/getData', 'CustomersController@getData');
    Route::post('/badge/send', 'CustomersController@sendBadgeMessage');
    Route::get('/badge/get_addressant', 'CustomersController@getAddressant');
    Route::post('/get_customer_info', 'CustomersController@getCustomerInfo');
    Route::post('/golden_badge/check', 'CustomersController@checkGoldenBadgesCount');


});


Route::group(['prefix' => 'company'],function(){
    Route::get('/users_list', 'Admin\CustomersController@index')->name('company.users_list.dashboard');
    Route::post('/users/data', 'Admin\CustomersController@postData');
    Route::post('/users/get', 'Admin\CustomersController@getCustomer');
    Route::post('/users/delete', 'Admin\CustomersController@postDelete');
    Route::post('/users/create', 'Admin\CustomersController@postSave');
    Route::post('/save_theme', 'Admin\CompaniesController@saveTheme');
    Route::get('/company_logo', 'Admin\CompaniesController@showLogoPage');
    Route::get('/custom_badges', 'Admin\CompaniesController@showCustomBadges');
    Route::post('/badges_groups/get', 'Admin\AdminController@getBadgesGroups');




    Route::get('/managers_list', 'Admin\ManagersController@index')->name('company.managers_list.dashboard');
    Route::post('/managers/data', 'Admin\ManagersController@postData');
    Route::post('/managers/get', 'Admin\ManagersController@getCustomer');
    Route::post('/managers/delete', 'Admin\ManagersController@postDelete');
    Route::post('/managers/create', 'Admin\ManagersController@postSave');


    Route::get('/themes', 'Admin\CompaniesController@themes')->name('company.themes');



    Route::post('/logo/data', 'Admin\CompaniesController@postLogosData');
    Route::post('/logo/get', 'Admin\CompaniesController@getLogo');
    Route::post('/logo/delete', 'Admin\CompaniesController@postLogoDelete');
    Route::post('/logo/saveLogoToSession', 'Ajax\CompanyController@saveLogoToSession');
    Route::post('/logo/create', 'Ajax\CompanyController@postSaveLogo');
    Route::post('/logo/update_status', 'Ajax\CompanyController@updateLogoStatus');

    Route::post('/badge/data', 'Admin\CompaniesController@postBadgesData');
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






    Route::get('/login', 'Auth\SiteAdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\SiteAdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\SiteAdminLoginController@getLogout');

    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/roles_and_permissions', 'Admin\StaffController@index')->name('admin.roles.index');


    Route::post('/staff_permissions/data', 'Admin\StaffController@postPermissionsData');
    Route::post('/staff_permissions/change', 'Admin\StaffController@postPermissionsChange');
    Route::post('/staff/data', 'Admin\StaffController@postData');
    Route::post('/staff/role_update', 'Admin\StaffController@postSave');

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






