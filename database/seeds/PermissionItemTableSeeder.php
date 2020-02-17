<?php

use Illuminate\Database\Seeder;

class PermissionItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('permissions')->insert([

            /*1*/
            [

                'name' => 'view_companies_managment_menu',
                'process_name'=>'Просмотр меню Управление компаниями',
                'process_slug'=>'view_companies_managment_menu',
                'type_category'=>'Меню',
                'type_name'=>'Меею',
                'guard_name'=>'admin'


            ],
            /*2*/
            [

                'name' => 'view_roles_and_permissions_menu',
                'process_name'=>'Просмотр меню Роли и пермишены',
                'process_slug'=>'view_roles_and_permissions_menu',
                'type_category'=>'Меню',
                'type_name'=>'Меню',
                'guard_name'=>'admin'

            ],
            /*3*/
            [

                'name' => 'view_company_managment_menu',
                'process_name'=>'Просмотр меню Управление единичной компанией',
                'process_slug'=>'view_company_managment_menu',
                'type_category'=>'Меню',
                'type_name'=>'Меню',
                'guard_name'=>'admin'

            ],
            /*4*/
            [

                'name' => 'view_company_users_menu',
                'process_name'=>'Просмотр меню управление пользователями единичной компании',
                'process_slug'=>'view_company_users_menu',
                'type_category'=>'Меню',
                'type_name'=>'Меню',
                'guard_name'=>'admin'

            ],
            /*5*/
            [

                'name' => 'view_company_statistics_menu',
                'process_name'=>'Просмотр меню Статистики администратора',
                'process_slug'=>'view_company_statistics_menu',
                'type_category'=>'Меню',
                'type_name'=>'Меню',
                'guard_name'=>'admin'

            ],
            /*6*/
            [

                'name' => 'view_manager_statistics_menu',
                'process_name'=>'Просмотр меню Статистика менеджера',
                'process_slug'=>'view_manager_statistics_menu',
                'type_category'=>'Меню',
                'type_name'=>'Меню',
                'guard_name'=>'admin'


            ],
            /*7*/
            [

                'name' => 'view_admins_accesses_menu',
                'process_name'=>'Просмотр меню Управление доступом',
                'process_slug'=>'view_admins_accesses_menu',
                'type_category'=>'Меню',
                'type_name'=>'Меню',
                'guard_name'=>'admin'


            ],
            /*8*/
            [

                'name' => 'view_clients_analytics_menu',
                'process_name'=>'Просмотр меню Аналитика по клиенту',
                'process_slug'=>'view_clients_analytics_menu',
                'type_category'=>'Меню',
                'type_name'=>'Меню',
                'guard_name'=>'admin'


            ],
            /*9*/
            [

                'name' => 'view_companies_menu',
                'process_name'=>'Просмотр меню Компании',
                'process_slug'=>'view_companies_menu',
                'type_category'=>'Меню',
                'type_name'=>'Меню',
                'guard_name'=>'admin'


            ],
            /*10*/
            [

                'name' => 'view_company_managers_menu',
                'process_name'=>'Просмотр меню управление менеджерами единичной компании',
                'process_slug'=>'view_company_managers_menu',
                'type_category'=>'Меню',
                'type_name'=>'Меню',
                'guard_name'=>'admin'

            ],
            /*11*/
            [

                'name' => 'view_admin_profile',
                'process_name'=>'Просмотр собственного профиля администратора',
                'process_slug'=>'view_admin_profile',
                'type_category'=>'Меню',
                'type_name'=>'Меню',
                'guard_name'=>'admin'

            ],
            /*12*/
            [

                'name' => 'view_main_admin_badges',
                'process_name'=>'Добавление и просмотр бейджей и груп бэйджей',
                'process_slug'=>'view_main_admin_badges',
                'type_category'=>'Меню',
                'type_name'=>'Меню',
                'guard_name'=>'admin'

            ],
            /*13*/
            [

                'name' => 'view_customer_interface',
                'process_name'=>'Просмотр пользовательского интерфейса',
                'process_slug'=>'view_customer_interface',
                'type_category'=>'Меню',
                'type_name'=>'Меню',
                'guard_name'=>'admin'

            ],




        ]);

        DB::table('role_has_permissions')->insert([
            [

                'permission_id' =>1 ,
                'role_id'=>1


            ],
            [

                'permission_id' =>9 ,
                'role_id'=>1


            ],
            [

                'permission_id' =>11 ,
                'role_id'=>1


            ],
            [

                'permission_id' =>2 ,
                'role_id'=>1


            ],
            [

                'permission_id' =>12 ,
                'role_id'=>2


            ],

            [

                'permission_id' =>7 ,
                'role_id'=>2


            ],
            [

                'permission_id' =>8 ,
                'role_id'=>2


            ],
            [

                'permission_id' => 9 ,
                'role_id'=>2
            ],
            [

                'permission_id' =>11 ,
                'role_id'=>2


            ],
            [

                'permission_id' => 10,
                'role_id'=>4
            ],
            [

                'permission_id' => 4,
                'role_id'=>4
            ],
            [

                'permission_id' => 5,
                'role_id'=>4
            ],
            [

                'permission_id' => 3,
                'role_id'=>4
            ],
            [

                'permission_id' =>11 ,
                'role_id'=>4


            ],
            [

                'permission_id' =>13 ,
                'role_id'=>4


            ],
            [

                'permission_id' =>13 ,
                'role_id'=>6


            ],
            [

                'permission_id' =>13 ,
                'role_id'=>5


            ],
            [

                'permission_id' =>13 ,
                'role_id'=>2


            ],
            [

                'permission_id' =>13 ,
                'role_id'=>1


            ],
            [

                'permission_id' => 4 ,
                'role_id'=>6
            ],
            [

                'permission_id' => 6 ,
                'role_id'=>6
            ],
            [

                'permission_id' =>11 ,
                'role_id'=>6


            ],


        ]);


    }
}
