<?php

use Illuminate\Database\Seeder;
use App\Language;

class LanguagesTableSeeder extends Seeder
{
    public function run()
    {
        $languages = [
            [
                'title' => 'English',
                'culture' => 'en-US',
                'culture_ui' => 'en',
                'position' => 1,
                'active'=>true,
            ],
            [
                'title' => 'Русский',
                'culture' => 'ru-RU',
                'culture_ui' => 'ru',
                'position' => 2,
                'active'=>true,
            ],
            [
                'title' => '中國',
                'culture' => 'zh-CN',
                'culture_ui' => 'zh',
                'position' => 3,
                'active'=>true,
            ],
        ];

        foreach ($languages as $key => $value) {
            Language::create($value);
        }
    }
}
