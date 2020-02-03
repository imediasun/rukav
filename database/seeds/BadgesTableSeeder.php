<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BadgesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       DB::table('badges_groups')->insert([
            /*1*/
           [
               'name' => 'First Badges Group ',
           ],
           /*2*/
           [
               'name' => 'Second Badges Group ',
           ],
           /*3*/
           [
               'name' => 'Golden Badges Group ',
           ],

       ]);

        DB::table('badges')->insert([
            /*1*/
            [
                'name' => 'First Badge ',
                'photo' => '5e1b3aa8ccdbc.png',
                'group_id'=>1,
            ],
            /*2*/
            [
                'name' => 'Second Badge ',
                'photo' => '5e1b3cc77bb25.png',
                'group_id'=>1,

            ],
            /*3*/
            [
                'name' => 'First Badge ',
                'photo' => '5e1b3aa8ccdbc.png',
                'group_id'=>1,
            ],
            /*4*/
            [
                'name' => 'Second Badge ',
                'photo' => '5e1b3cc77bb25.png',
                'group_id'=>1,

            ],
            /*5*/
            [
                'name' => 'First Badge ',
                'photo' => '5e1b3aa8ccdbc.png',
                'group_id'=>1,
            ],
            /*6*/
            [
                'name' => 'Second Badge ',
                'photo' => '5e1b3cc77bb25.png',
                'group_id'=>1,

            ],
            /*7*/
            [
                'name' => 'First Badge ',
                'photo' => '5e1b3aa8ccdbc.png',
                'group_id'=>1,
            ],
            /*8*/
            [
                'name' => 'Second Badge ',
                'photo' => '5e1b3cc77bb25.png',
                'group_id'=>1,

            ],
            /*9*/
            [
                'name' => 'First Badge ',
                'photo' => '5e1b3aa8ccdbc.png',
                'group_id'=>1,
            ],
            /*10*/
            [
                'name' => 'Second Badge ',
                'photo' => '5e1b3cc77bb25.png',
                'group_id'=>1,

            ],
            /*11*/
            [
                'name' => 'First Badge ',
                'photo' => '5e1b3aa8ccdbc.png',
                'group_id'=>1,
            ],
            /*12*/
            [
                'name' => 'Second Badge ',
                'photo' => '5e1b3cc77bb25.png',
                'group_id'=>1,

            ],
            /*13*/
            [
                'name' => 'First Badge ',
                'photo' => '5e1b3aa8ccdbc.png',
                'group_id'=>1,
            ],
            /*14*/
            [
                'name' => 'Second Badge ',
                'photo' => '5e1b3cc77bb25.png',
                'group_id'=>1,

            ],
            /*15*/
            [
                'name' => 'First Badge ',
                'photo' => '5e1b3aa8ccdbc.png',
                'group_id'=>1,
            ],
            /*16*/
            [
                'name' => 'Second Badge ',
                'photo' => '5e1b3cc77bb25.png',
                'group_id'=>1,

            ],
            /*17*/
            [
                'name' => 'First Golden Badge ',
                'photo' => '5e37297c40779.png',
                'group_id'=>3,

            ],
            /*18*/
            [
                'name' => 'Second Golden Badge ',
                'photo' => '5e37297c40779.png',
                'group_id'=>3,

            ],
            /*19*/
            [
                'name' => 'Third Golden Badge ',
                'photo' => '5e37297c40779.png',
                'group_id'=>3,

            ],
            /*20*/
            [
                'name' => 'Forth Golden Badge ',
                'photo' => '5e37297c40779.png',
                'group_id'=>3,

            ],

        ]);

        DB::table('company_badges')->insert([
            /*1*/
            [
                'badges_group_id' => 1,
                'company_id'=>1,
                'active'=>1,
            ],
            /*2*/
            [
                'badges_group_id' => 2,
                'company_id'=>2,
                'active'=>1
            ],
            /*2*/
            [
                'badges_group_id' => 3,
                'company_id'=>1,
                'active'=>1
            ],

        ]);



        DB::table('messages')->insert([
            /*1*/
            [
                'addressant' => 1,
                'sender'=>2,
                'title'=>'Example Title',
                'message'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco',
                'badge_id'=>1,
                'company_id'=>1,
                'visibility'=>1

            ],
            /*2*/
            [
                'addressant' => 1,
                'sender'=>2,
                'title'=>'Example Title2',
                'message'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco',
                'badge_id'=>2,
                'company_id'=>1,
                'visibility'=>2

            ],
            /*3*/
            [
                'addressant' => 1,
                'sender'=>2,
                'title'=>'Example Title3',
                'message'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco',
                'badge_id'=>1,
                'company_id'=>1,
                'visibility'=>3

            ],
            /*4*/
            [
                'addressant' => 1,
                'sender'=>2,
                'title'=>'Example Title4',
                'message'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco',
                'badge_id'=>2,
                'company_id'=>1,
                'visibility'=>2

            ],
            /*5*/
            [
                'addressant' => 1,
                'sender'=>2,
                'title'=>'Example Title5',
                'message'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco',
                'badge_id'=>1,
                'company_id'=>1,
                'visibility'=>1

            ],
            /*6*/
            [
                'addressant' => 1,
                'sender'=>2,
                'title'=>'Example Title6',
                'message'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco',
                'badge_id'=>2,
                'company_id'=>1,
                'visibility'=>1

            ],
            /*7*/
            [
                'addressant' => 1,
                'sender'=>2,
                'title'=>'Example Title7',
                'message'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco',
                'badge_id'=>1,
                'company_id'=>1,
                'visibility'=>1

            ],
            /*8*/
            [
                'addressant' => 1,
                'sender'=>2,
                'title'=>'Example Title8',
                'message'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco',
                'badge_id'=>2,
                'company_id'=>1,
                'visibility'=>3

            ],
            /*9*/
            [
                'addressant' => 5,
                'sender'=>2,
                'title'=>'Example Title9',
                'message'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco',
                'badge_id'=>1,
                'company_id'=>1,
                'visibility'=>1

            ],
            /*10*/
            [
                'addressant' => 5,
                'sender'=>2,
                'title'=>'Example Title10',
                'message'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco',
                'badge_id'=>2,
                'company_id'=>1,
                'visibility'=>3

            ],
            /*11*/
            [
                'addressant' => 1,
                'sender'=>2,
                'title'=>'Example Title11',
                'message'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco',
                'badge_id'=>1,
                'company_id'=>1,
                'visibility'=>1

            ],
            /*12*/
            [
                'addressant' => 1,
                'sender'=>2,
                'title'=>'Example Title12',
                'message'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco',
                'badge_id'=>2,
                'company_id'=>1,
                'visibility'=>1

            ],
            /*13*/
            [
                'addressant' => 1,
                'sender'=>2,
                'title'=>'Example Title13',
                'message'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco',
                'badge_id'=>1,
                'company_id'=>1,
                'visibility'=>2

            ],
            /*14*/
            [
                'addressant' => 1,
                'sender'=>2,
                'title'=>'Example Title14',
                'message'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco',
                'badge_id'=>2,
                'company_id'=>1,
                'visibility'=>1

            ],
            /*15*/
            [
                'addressant' => 1,
                'sender'=>2,
                'title'=>'Example Title15',
                'message'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco',
                'badge_id'=>1,
                'company_id'=>1,
                'visibility'=>3

            ],


        ]);


    }
}
