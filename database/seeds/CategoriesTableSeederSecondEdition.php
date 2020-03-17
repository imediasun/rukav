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

        DB::table('product_categories')->insert([
            /*1*/
            [
                'parent_id' => 0,
                'name' => 'Детский мир',
                'link'=> '/child_world',
                'icon'=>'fa-globe',
                'photo'=>'first_category.png'

            ],
            /*2*/
            [
                'parent_id' => 0,
                'name' => 'Недвижимость',
                'link'=> '/advertising',
                'icon'=>'fa-globe',
                'photo'=>'first_category.png'
            ],
            /*3*/
            [
                'parent_id' => 0,
                'name' => 'Транспорт',
                'link'=> '/contact_with_admin',
                'icon'=>'fa-globe',
                'photo'=>'first_category.png'

            ],
            /*4*/
            [
                'parent_id' => 0,
                'name' => 'Запчасти для транспорта',
                'link'=> '/portal_information',
                'icon'=>'fa-home',
                'photo'=>'first_category.png'

            ],
            /*5*/
            [
                'parent_id' => 0,
                'name' => 'Работа',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'photo'=>'first_category.png'

            ],
            /*6*/
            [
                'parent_id' => 0,
                'name' => 'Животные',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'photo'=>'first_category.png'

            ],
            /*7*/
            [
                'parent_id' => 0,
                'name' => 'Дом и Сад',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'photo'=>'first_category.png'

            ],
            /*8*/
            [
                'parent_id' => 0,
                'name' => 'Электроника',
                'link'=> '/private_cabinet',
                'icon'=>'fa-homee',
                'photo'=>'first_category.png'

            ],
            /*9*/
            [
                'parent_id' => 9,
                'name' => 'Бизнес и услуги',
                'link'=> '/private_cabinet',
                'icon'=>'fa-homee',
                'photo'=>'first_category.png'

            ],
            /*10*/
            [
                'parent_id' => 10,
                'name' => 'Мода и стиль',
                'link'=> '/private_cabinet',
                'icon'=>'fa-homee',
                'photo'=>'first_category.png'

            ],
            /*11*/
            [
                'parent_id' => 11,
                'name' => 'Хобби отдых и спорт',
                'link'=> '/private_cabinet',
                'icon'=>'fa-homee',
                'photo'=>'first_category.png'

            ],
            /*12*/
            [
                'parent_id' => 12,
                'name' => 'Отдам бесплатно',
                'link'=> '/private_cabinet',
                'icon'=>'fa-homee',
                'photo'=>'first_category.png'

            ],
            /*13*/
            [
                'parent_id' => 13,
                'name' => 'Обмен',
                'link'=> '/private_cabinet',
                'icon'=>'fa-homee',
                'photo'=>'first_category.png'

            ],
            /*14*/
            [
                'parent_id' => 1,
                'name' => 'Детская обежда',
                'link'=> '/private_cabinet',
                'icon'=>'fa-homee',
                'photo'=>'first_category.png'

            ],
            /*15*/
            [
                'parent_id' => 1,
                'name' => 'Детская обувь',
                'link'=> '/private_cabinet',
                'icon'=>'fa-homee',
                'photo'=>'first_category.png'

            ],
            /*16*/
            [
                'parent_id' => 1,
                'name' => 'Детские коляски',
                'link'=> '/private_cabinet',
                'icon'=>'fa-homee',
                'photo'=>'first_category.png'

            ],
            /*17*/
            [
                'parent_id' => 1,
                'name' => 'Детские автокресла',
                'link'=> '/private_cabinet',
                'icon'=>'fa-homee',
                'photo'=>'first_category.png'

            ],
            /*18*/
            [
                'parent_id' => 1,
                'name' => 'Детская мебель',
                'link'=> '/private_cabinet',
                'icon'=>'fa-homee',
                'photo'=>'first_category.png'

            ],
            /*19*/
            [
                'parent_id' => 1,
                'name' => 'Игрушки',
                'link'=> '/private_cabinet',
                'icon'=>'fa-homee',
                'photo'=>'first_category.png'

            ],
            /*20*/
            [
                'parent_id' => 1,
                'name' => 'Детский транспорт',
                'link'=> '/private_cabinet',
                'icon'=>'fa-homee',
                'photo'=>'first_category.png'

            ],
            /*21*/
            [
                'parent_id' => 1,
                'name' => 'Питание',
                'link'=> '/private_cabinet',
                'icon'=>'fa-homee',
                'photo'=>'first_category.png'

            ],
            /*22*/
            [
                'parent_id' => 1,
                'name' => 'Товары для школьников',
                'link'=> '/private_cabinet',
                'icon'=>'fa-homee',
                'photo'=>'first_category.png'

            ],
            /*23*/
            [
                'parent_id' => 1,
                'name' => 'Другие детские товары',
                'link'=> '/private_cabinet',
                'icon'=>'fa-homee',
                'photo'=>'first_category.png'

            ],
            /*24*/
            [
                'parent_id' => 2,
                'name' => 'Квартиры и комнаты',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'photo'=>'first_category.png'

            ],
            /*25*/
            [
                'parent_id' => 2,
                'name' => 'Дома',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'photo'=>'first_category.png'

            ],
            /*26*/
            [
                'parent_id' => 2,
                'name' => 'Земля',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'photo'=>'first_category.png'

            ],
            /*27*/
            [
                'parent_id' => 2,
                'name' => 'Коммерческая недвижимость',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'photo'=>'first_category.png'

            ],
            /*28*/
            [
                'parent_id' => 2,
                'name' => 'Гаражи парковки',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'photo'=>'first_category.png'

            ],
            /*29*/
            [
                'parent_id' => 2,
                'name' => 'Посуточная аренда жилья',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'photo'=>'first_category.png'

            ],
            /*30*/
            [
                'parent_id' => 2,
                'name' => 'Предложения от застройщиков',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'photo'=>'first_category.png'

            ],
            /*31*/
            [
                'parent_id' => 2,
                'name' => 'Недвижимость за границей',
                'link'=> '/private_cabinet',
                'icon'=>'fa-home',
                'photo'=>'first_category.png'

            ],


        ]);



        DB::table('categories')->insert([
            /*1*/
            [
                'parent_id' => 0,
                'name' => 'Информация по сотрудничеству',
                'link'=> '/cooperation_information',
                'icon'=>'fal fa-info-circle',
                'system_name'=>'cooperation_information',
                'type'=>'not_linked',
            ],
            /*2*/
            [
                'parent_id' => 1,
                'name' => 'Размещение рекламы',
                'link'=> '/advertising',
                'icon'=>'fal fa-info-circle',
                'system_name'=>'advertising',
                'type'=>'linked',
            ],
            /*3*/
            [
                'parent_id' => 1,
                'name' => 'Связаться с администрацией',
                'link'=> '/contact_with_admin',
                'icon'=>'fal fa-info-circle',
                'system_name'=>'contact_with_admin',
                'type'=>'linked',
            ],
            /*4*/
            [
                'parent_id' => 0,
                'name' => 'Информация о портале',
                'link'=> '/portal_information',
                'icon'=>'fal fa-info-circle',
                'system_name'=>'portal_information',
                'type'=>'linked',
            ],
            /*5*/
            [
                'parent_id' => 0,
                'name' => 'Личный кабинет пользователя',
                'link'=> '/private_cabinet',
                'icon'=>'fal fa-info-circle',
                'system_name'=>'private_cabinet',
                'type'=>'linked',
            ],


        ]);


        DB::table('admin_categories')->insert([



            /*1*/
            [
                'parent_id' => 0,
                'name' => 'News Feed',
                'icon'=> 'fal fa-info-circle',
                'link'=> '/news_feed',
                'system_name'=>'news_feed',
                'type'=>'linked',
                'permission'=>'view_customer_interface'
            ],
            /*2*/ //Role=>God  1)Impresonate by users
            [
                'parent_id' => 0,
                'name' => 'Управление компаниями',
                'icon'=> 'fal fa-info-circle',
                'link'=> '/admin/companies',
                'system_name'=>'companies_managment',
                'type'=>'not_linked',
                'permission'=>'view_companies_managment_menu'
            ],

            /*3*/ //Role=>God
            [
                'parent_id' => 0,
                'name' => 'Роли и пермишены',
                'icon'=> 'fal fa-info-circle',
                'link'=> '/admin/roles_and_permissions',
                'system_name'=>'roles_and_permissions',
                'type'=>'linked',
                'permission'=>'view_roles_and_permissions_menu'
            ],
            /*4*/ //Role=>company_admin
            [
                'parent_id' => 0,
                'name' => 'Управление компанией',
                'icon'=> 'fal fa-tag',
                'link'=> '/admin/company_managment',
                'system_name'=>'company_managment',
                'type'=>'not_linked',
                'permission'=>'view_company_managment_menu'
            ],

            /*5*/ //Role=>company_admin
            [
                'parent_id' => 4,
                'name' => 'Логотип',
                'icon'=> 'fal fa-window',
                'link'=> '/company/company_logo',
                'system_name'=>'company_logo',
                'type'=>'linked',
                'permission'=>null
            ],

            /*6*/ //Role=>company_admin
            [
                'parent_id' => 4,
                'name' => 'Кастомные бейджи',
                'icon'=> 'fal fa-window',
                'link'=> '/company/custom_badges',
                'system_name'=>'custom_badges',
                'type'=>'linked',
                'permission'=>null
            ],
            /*7*/ //Role=>company_admin
            [
                'parent_id' => 4,
                'name' => 'Кастомные подложки',
                'icon'=> 'fal fa-window',
                'link'=> '/company/custom_layouts',
                'system_name'=>'custom_layouts',
                'type'=>'linked',
                'permission'=>null
            ],
            /*8*/  //Role=>company_admin
            [
                'parent_id' => 0,
                'name' => 'Пользователи',
                'icon'=> 'fal fa-window',
                'link'=> '/company/users',
                'system_name'=>'company_users',
                'type'=>'not_linked',
                'permission'=>'view_company_users_menu'
            ],
            /*9*/  //Role=>company_admin 1)Impresonate by user
            [
                'parent_id' => 8,
                'name' => 'Список пользователей',
                'icon'=> 'fal fa-window',
                'link'=> '/company/users_list',
                'system_name'=>'company_users_list',
                'type'=>'linked',
                'permission'=>null
            ],
            /*10*/  //Role=>company_admin
            [
                'parent_id' => 0,
                'name' => 'Статистика администратора',
                'icon'=> 'fal fa-window',
                'link'=> '/company/statistics',
                'system_name'=>'company_statistics',
                'type'=>'not_linked',
                'permission'=>'view_company_statistics_menu'
            ],
            /*11*/  //Role=>company_admin
     /*       [
                'parent_id' => 10,
                'name' => 'Статистика по людям',
                'icon'=> 'fal fa-window',
                'link'=> '/company/users_statistics',
                'system_name'=>'users_statistics',
                'type'=>'linked',
                'permission'=>null
            ],*/
            /*12*/  //Role=>company_admin
         /*   [
                'parent_id' => 10,
                'name' => 'Статистика по менеджерам ',
                'icon'=> 'fal fa-window',
                'link'=> '/company/users_statistics',
                'system_name'=>'users_statistics',
                'type'=>'linked',
                'permission'=>null
            ],*/
            /*13*/  //Role=>company_admin
            [
                'parent_id' => 10,
                'name' => 'Статистика по бейджам ',
                'icon'=> 'fal fa-window',
                'link'=> '/company/badges_statistics',
                'system_name'=>'badges_statistics',
                'type'=>'linked',
                'permission'=>null
            ],
            /*14*/  //Role=>manager
            [
                'parent_id' => 0,
                'name' => 'Статистика менеджера',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/manager/statistics',
                'system_name'=>'manager_statistics',
                'type'=>'linked',
                'permission'=>'view_manager_statistics_menu'
            ],
            /*15*/  //Role=>main_system_administrator
            [
                'parent_id' => 0,
                'name' => 'Управление доступом',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/main_admin/accesses',
                'system_name'=>'admins_accesses',
                'type'=>'linked',
                'permission'=>'view_admins_accesses_menu'
            ],
            /*16*/  //Role=>main_system_administrator
            [
                'parent_id' => 0,
                'name' => 'Аналитика по клиенту',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/main_admin/clients_analytics',
                'system_name'=>'clients_analytics',
                'type'=>'linked',
                'permission'=>'view_clients_analytics_menu'
            ],
            /*17*/  //Role=>main_system_administrator
            [
                'parent_id' => 0,
                'name' => 'Компании',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/main_admin/companies',
                'system_name'=>'companies',
                'type'=>'linked',
                'permission'=>'view_companies_menu'
            ],
            /*18*/  //Role=>all
            [
                'parent_id' => 0,
                'name' => 'Профиль администратора',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/profile',
                'system_name'=>'admin_profile',
                'type'=>'linked',
                'permission'=>null
            ],
            /*19*/  //Role=>company_admin
            [
                'parent_id' => 0,
                'name' => 'Менеджеры',
                'icon'=> 'fal fa-window',
                'link'=> '/company/managers',
                'system_name'=>'company_managers',
                'type'=>'not_linked',
                'permission'=>'view_company_managers_menu'
            ],
            /*20*/  //Role=>company_admin 1)Impresonate by user
            [
                'parent_id' => 19,
                'name' => 'Список менеджеров',
                'icon'=> 'fal fa-window',
                'link'=> '/company/managers_list',
                'system_name'=>'company_managers_list',
                'type'=>'linked',
                'permission'=>null
            ],
            /*21*/ //Role=>company_admin
            [
                'parent_id' => 4,
                'name' => 'Цветовые схеммы',
                'icon'=> 'fal fa-window',
                'link'=> '/company/themes',
                'system_name'=>'themes',
                'type'=>'linked',
                'permission'=>null
            ],
            /*22*/  //Role=>all_admin
            [
                'parent_id' => 0,
                'name' => 'Собственный профиль',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/profile',
                'system_name'=>'admin_profile',
                'type'=>'not_linked',
                'permission'=>'view_customer_interface'
            ],
            /*23*/  //Role=>all_admin
            [
                'parent_id' => 22,
                'name' => 'Управление профилем',
                'icon'=> 'fal fa-window',
                'link'=> '/profile',
                'system_name'=>'admin_profile_avatar',
                'type'=>'linked',
                'permission'=>null
            ],
            /*24*/  //Role=>all_admin
            [
                'parent_id' => 22,
                'name' => 'Аватарки',
                'icon'=> 'fal fa-window',
                'link'=> '/profile/avatar/index',
                'system_name'=>'admin_profile_avatar',
                'type'=>'linked',
                'permission'=>null
            ],
            /*25*/  //Role=>system_admin
            [
                'parent_id' => 0,
                'name' => 'Бэйджи',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/main_admin/badges',
                'system_name'=>'main_admin_badges',
                'type'=>'not_linked',
                'permission'=>'view_main_admin_badges'
            ],
            /*26*/  //Role=>system_admin
            [
                'parent_id' => 25,
                'name' => 'Группы бэйджей',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/main_admin/badges_groups',
                'system_name'=>'main_admin_badges_groups',
                'type'=>'linked',
                'permission'=>null
            ],
            /*27*/  //Role=>system_admin
            [
                'parent_id' => 25,
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
