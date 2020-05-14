<?php

use Illuminate\Database\Seeder;

class AdminCategories_14_05_2020_SeederEdition extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       DB::table('admin_categories')->insert([


            /*32*/
            [
                'parent_id' => 0,
                'name' => 'Статические страницы',
                'icon'=> 'fal fa-window',
                'link'=> '/admin/view_static_pages',
                'system_name'=>'view_static_pages',
                'type'=>'not_linked',
                'permission'=>'view_static_pages'
            ],
           /*33*/
           [
               'parent_id' => 32,
               'name' => 'Просмотр статических страниц',
               'icon'=> 'fal fa-window',
               'link'=> '/admin/view_static_pages',
               'system_name'=>'view_static_pages',
               'type'=>'linked',
               'permission'=>'view_static_pages'
           ],





        ]);


        DB::table('permissions')->insert([
        /*17*/
        [

            'name' => 'view_static_pages',
            'process_name'=>'Просмотр и редактирование статистических страниц',
            'process_slug'=>'view_static_pages',
            'type_category'=>'Меню',
            'type_name'=>'Меню',
            'guard_name'=>'admin'

        ],
        ]);


        DB::table('role_has_permissions')->insert([
        [

            'permission_id' =>17 ,
            'role_id'=>4


        ],
        ]);

    }
}
