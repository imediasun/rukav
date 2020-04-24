<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       DB::table('messages')->insert([
            /*1*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,
               'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,
               'active'=>1
           ],
           /*2*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1
           ],
           /*3*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,
               'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1
           ],
           /*4*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1
           ],
           /*5*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1
           ],
           /*6*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1
           ],
           /*7*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1
           ],
           /*8*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1
           ],

           /*9*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1
           ],
           /*10*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1
           ],
           /*11*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1
           ],
           /*12*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1
           ],
           /*13*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1
           ],
           /*14*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1
           ],
           /*15*/
           [
               'category_id' => 14,
               'sender' => 1,
               'company_id' => 1,
               'title' => 'Детские футболочки',
               'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
               'badge_id'=> 1,'place_id'=>'ChIJdd4hrwug2EcRmSrV3Vo6llI',
               'created_at'=>\Carbon\Carbon::now(),
               'visibility'=>3,'active'=>1
           ],


       ]);

        DB::table('pictures')->insert([
            /*1*/
            [
                'message_id' => 1,
                'photo'=>'tshort.jpg'
            ],
            [
                'message_id' => 2,
                'photo'=>'tshort.jpg'
            ],
            [
                'message_id' => 3,
                'photo'=>'tshort.jpg'
            ],
            [
                'message_id' => 4,
                'photo'=>'tshort.jpg'
            ],
            [
                'message_id' => 5,
                'photo'=>'tshort.jpg'
            ],
            [
                'message_id' => 6,
                'photo'=>'tshort.jpg'
            ],
            [
                'message_id' => 7,
                'photo'=>'tshort.jpg'
            ],
            [
                'message_id' => 8,
                'photo'=>'tshort.jpg'
            ],
            [
                'message_id' => 9,
                'photo'=>'tshort.jpg'
            ],
            [
                'message_id' => 10,
                'photo'=>'tshort.jpg'
            ],
            [
                'message_id' => 11,
                'photo'=>'tshort.jpg'
            ],
            [
                'message_id' => 12,
                'photo'=>'tshort.jpg'
            ],
            [
                'message_id' => 13,
                'photo'=>'tshort.jpg'
            ],
            [
                'message_id' => 14,
                'photo'=>'tshort.jpg'
            ],
            [
                'message_id' => 15,
                'photo'=>'tshort.jpg'
            ]
            ]);
    }
}
