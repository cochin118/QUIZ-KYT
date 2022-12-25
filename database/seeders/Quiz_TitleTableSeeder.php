<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Quiz_TitleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quiz_title')->insert([
            [
                'quiz_id' => 6,
                'title_id' => 2,
                
            ],
            [
                'quiz_id' => 7,
                'title_id' => 2,
                
            ],
            [
                'quiz_id' => 8,
                'title_id' => 2,
                
            ],
            [
                'quiz_id' => 9,
                'title_id' => 2,
                
            ],
            [
                'quiz_id' => 10,
                'title_id' => 2,
                
            ],

        ]);
    }
}


