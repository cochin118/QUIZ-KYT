<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Category_Quiz_TitleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_quiz_title')->insert([
            [
                'category_id' => 1,
                'quiz_id' => 1,
                'title_id' => 1,
                
            ],
            [   
                'category_id' => 1,
                'quiz_id' => 2,
                'title_id' => 1,

            ],
            [
                'category_id' => 1,
                'quiz_id' => 3,
                'title_id' => 1,

            ],
            [
                'category_id' => 1,
                'quiz_id' => 4,
                'title_id' => 1,

            ],
            [
                'category_id' => 1,
                'quiz_id' => 5,
                'title_id' => 1,
                
            ],
        ]);
    }
}



        
