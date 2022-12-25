<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Title;

class TitleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Title::truncate();

        $titles =  [
            [
                'category_id' => 1,
                'title' => '手洗い時のKYT問題集',
                'description' => '手洗い時(手指衛生)潜む危険を予知する問題集です。',
            ],
            [
                'category_id' => 1,
                'title' => '入浴介助時のKYT問題集',
                'description' => '入浴介助時に潜む危険を予知する問題集です。',
            ],
            [
                'category_id' => 2,
                'title' => '患者搬送時のKYT問題集',
                'description' => '患者搬送時に潜む危険を予知する問題集です。',
            ],
            [
                'category_id' => 3,
                'title' => 'ナースコール時のKYT問題集',
                'description' => 'ナースコール時に潜む危険を予知する問題集です。',
            ],
            [
                'category_id' => 4,
                'title' => '医療器具の取り扱いに関するKYT問題集',
                'description' => '医療器具の取り扱い時に潜む危険を予知する問題集です。',
            ],
        ];

        foreach($titles as $title) {
            Title::create($title);
        }

    }
}