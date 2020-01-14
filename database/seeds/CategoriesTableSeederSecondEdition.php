<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeederSecondEdition extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       DB::table('categories')->insert([
            /*1*/
           [
               'parent_id' => 0,
               'name' => 'News Feed',
               'icon'=> 'fal fa-info-circle',
               'link'=> '/news_feed',
               'system_name'=>'news_feed',
               'type'=>'linked'
           ],
           /*2*/
           [
               'parent_id' => 0,
               'name' => 'My Badges',
               'icon'=> 'fal fa-info-circle',
               'link'=> '/my_badges',
               'system_name'=>'my_badges',
               'type'=>'linked'
           ],
           /*3*/
           [
               'parent_id' => 0,
               'name' => 'Give Feedback',
               'icon'=> 'fal fa-info-circle',
               'link'=> '/give_feedback',
               'system_name'=>'give_feedback',
               'type'=>'linked'
           ],
           /*4*/
           [
               'parent_id' => 0,
               'name' => 'Request Feedback',
               'icon'=> 'fal fa-info-circle',
               'link'=> '/request_feedback',
               'system_name'=>'request_feedback',
               'type'=>'linked'
           ],



        ]);


        DB::table('admin_categories')->insert([
            /*1*/ //Role=>God  1)Impresonate by users
            [
                'parent_id' => 0,
                'name' => 'Управление компаниями',
                'icon'=> 'fal fa-info-circle',
                'link'=> '/admin/companies',
                'system_name'=>'companies_managment',
                'type'=>'not_linked',
                'permission'=>'view_companies_managment_menu'
            ],

            /*2*/ //Role=>God
            [
                'parent_id' => 0,
                'name' => 'Роли и пермишены',
                'icon'=> 'fal fa-info-circle',
                'link'=> '/admin/roles_and_permissions',
                'system_name'=>'roles_and_permissions',
                'type'=>'linked',
                'permission'=>'view_roles_and_permissions_menu'
            ],
            /*3*/ //Role=>company_admin
            [
                'parent_id' => 0,
                'name' => 'Управление компанией',
                'icon'=> 'fal fa-tag',
                'link'=> '/admin/company_managment',
                'system_name'=>'company_managment',
                'type'=>'not_linked',
                'permission'=>'view_company_managment_menu'
            ],

            /*4*/ //Role=>company_admin
            [
                'parent_id' => 3,
                'name' => 'Логотип',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/company/company_logo',
                'system_name'=>'company_logo',
                'type'=>'linked',
                'permission'=>null
            ],

            /*5*/ //Role=>company_admin
            [
                'parent_id' => 3,
                'name' => 'Кастомные бейджи',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/company/custom_badges',
                'system_name'=>'custom_badges',
                'type'=>'linked',
                'permission'=>null
            ],
            /*6*/ //Role=>company_admin
            [
                'parent_id' => 3,
                'name' => 'Кастомные подложки',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/company/custom_layouts',
                'system_name'=>'custom_layouts',
                'type'=>'linked',
                'permission'=>null
            ],
            /*7*/  //Role=>company_admin
            [
                'parent_id' => 0,
                'name' => 'Пользователи',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/company/users',
                'system_name'=>'company_users',
                'type'=>'not_linked',
                'permission'=>'view_company_users_menu'
            ],
            /*8*/  //Role=>company_admin 1)Impresonate by user
            [
                'parent_id' => 7,
                'name' => 'Список пользователей',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/company/users_list',
                'system_name'=>'company_users_list',
                'type'=>'linked',
                'permission'=>null
            ],
            /*9*/  //Role=>company_admin
            [
                'parent_id' => 0,
                'name' => 'Статистика администратора',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/company/statistics',
                'system_name'=>'company_statistics',
                'type'=>'not_linked',
                'permission'=>'view_company_statistics_menu'
            ],
            /*10*/  //Role=>company_admin
            [
                'parent_id' => 9,
                'name' => 'Статистика по людям',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/company/users_statistics',
                'system_name'=>'users_statistics',
                'type'=>'linked',
                'permission'=>null
            ],
            /*11*/  //Role=>company_admin
            [
                'parent_id' => 9,
                'name' => 'Статистика по менеджерам ',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/company/users_statistics',
                'system_name'=>'users_statistics',
                'type'=>'linked',
                'permission'=>null
            ],
            /*12*/  //Role=>manager
            [
                'parent_id' => 0,
                'name' => 'Статистика менеджера',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/manager/statistics',
                'system_name'=>'manager_statistics',
                'type'=>'linked',
                'permission'=>'view_manager_statistics_menu'
            ],
            /*13*/  //Role=>main_system_administrator
            [
                'parent_id' => 0,
                'name' => 'Управление доступом',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/main_admin/accesses',
                'system_name'=>'admins_accesses',
                'type'=>'linked',
                'permission'=>'view_admins_accesses_menu'
            ],
            /*14*/  //Role=>main_system_administrator
            [
                'parent_id' => 0,
                'name' => 'Аналитика по клиенту',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/main_admin/clients_analytics',
                'system_name'=>'clients_analytics',
                'type'=>'linked',
                'permission'=>'view_clients_analytics_menu'
            ],
            /*15*/  //Role=>main_system_administrator
            [
                'parent_id' => 0,
                'name' => 'Компании',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/main_admin/companies',
                'system_name'=>'companies',
                'type'=>'linked',
                'permission'=>'view_companies_menu'
            ],
            /*16*/  //Role=>all
            [
                'parent_id' => 0,
                'name' => 'Профиль администратора',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/profile',
                'system_name'=>'admin_profile',
                'type'=>'linked',
                'permission'=>'view_companies_menu'
            ],
            /*17*/  //Role=>company_admin
            [
                'parent_id' => 0,
                'name' => 'Менеджеры',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/company/managers',
                'system_name'=>'company_managers',
                'type'=>'not_linked',
                'permission'=>'view_company_managers_menu'
            ],
            /*18*/  //Role=>company_admin 1)Impresonate by user
            [
                'parent_id' => 17,
                'name' => 'Список менеджеров',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/company/managers_list',
                'system_name'=>'company_managers_list',
                'type'=>'linked',
                'permission'=>null
            ],
            /*19*/ //Role=>company_admin
            [
                'parent_id' => 3,
                'name' => 'Цветовые схеммы',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/company/themes',
                'system_name'=>'themes',
                'type'=>'linked',
                'permission'=>null
            ],
            /*20*/  //Role=>all_admin
            [
                'parent_id' => 0,
                'name' => 'Собственный профиль',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/profile',
                'system_name'=>'admin_profile',
                'type'=>'not_linked',
                'permission'=>'view_admin_profile'
            ],
            /*21*/  //Role=>all_admin
            [
                'parent_id' => 20,
                'name' => 'Аватарки',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/profile/avatar/index',
                'system_name'=>'admin_profile_avatar',
                'type'=>'linked',
                'permission'=>null
            ],
            /*22*/  //Role=>system_admin
            [
                'parent_id' => 0,
                'name' => 'Бэйджи',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/main_admin/badges',
                'system_name'=>'main_admin_badges',
                'type'=>'not_linked',
                'permission'=>'view_main_admin_badges'
            ],
            /*23*/  //Role=>system_admin
            [
                'parent_id' => 22,
                'name' => 'Группы бэйджей',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/main_admin/badges_groups',
                'system_name'=>'main_admin_badges_groups',
                'type'=>'linked',
                'permission'=>null
            ],
            /*24*/  //Role=>system_admin
            [
                'parent_id' => 22,
                'name' => 'Кастомные бэйджи',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/main_admin/custom_badges',
                'system_name'=>'main_admin_custom_badges',
                'type'=>'linked',
                'permission'=>null
            ],



        ]);


    }
}
