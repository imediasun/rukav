<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            /*1*/
            [
                'name' => 'Gods_mode',
                'description'=> 'Режим Бога',
                'guard_name'=>'admin'

            ],
            /*2*/
            [
                'name' => 'Main_administrator',
                'description'=> 'Главный Администратор системы',
                'guard_name'=>'admin'
            ],
            /*3*/
            [
                'name' => 'Designer',
                'description'=> 'Дизайнер',
                'guard_name'=>'admin'
            ],
            /*4*/
            [
                'name' => 'Company_administrator',
                'description'=> 'Администратор компании',
                'guard_name'=>'admin'
            ],
            /*5*/
            [
                'name' => 'Simple_user',
                'description'=> 'Пользователь',
                'guard_name'=>'admin'
            ],
            /*6*/
            [
                'name' => 'Manager',
                'description'=> 'Менеджер',
                'guard_name'=>'admin'
            ],
            /*7*/
            [
                'name' => 'Clients_support',
                'description'=> 'Поддержка клиентов',
                'guard_name'=>'admin'
            ]


        ]);
    }
}
