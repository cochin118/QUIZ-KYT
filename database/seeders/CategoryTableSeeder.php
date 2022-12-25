<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

    $categories =  [
        [
            'name' => '初級',
            'thumbnail' => 'https://thumb.ac-illust.com/7a/7a2add1304e09e8680c6dfb022ca732e_t.jpeg',
            'sort' => 1
        ],
        [
            'name' => '中級',
            'thumbnail' => 'https://thumb.ac-illust.com/6c/6c5b98fa587cfc08e44537c313b589a9_t.jpeg',
            'sort' => 2
        ],
        [
            'name' => '上級',
            'thumbnail' => 'https://thumb.ac-illust.com/b9/b9cbcfab016b1d8f5e8b0de728944a8d_t.jpeg',
            'sort' => 3
        ],
        [
            'name' => '超上級',
            'thumbnail' => 'https://thumb.ac-illust.com/b9/b9cbcfab016b1d8f5e8b0de728944a8d_t.jpeg',
            'sort' => 4
        ]
    ];
    foreach($categories as $category) {
        Category::create($category);
    }
}
}