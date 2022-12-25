<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use \App\Models\Category;
use \App\Models\Quiz;

class Category_Quiz_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_quiz')->insert([
            [
                'category_id' => 1,
                'quiz_id' => 1,                
            ],
            [   
                'category_id' => 1,
                'quiz_id' => 2,
            ],
            [
                'category_id' => 1,
                'quiz_id' => 3,
            ],
            [
                'category_id' => 1,
                'quiz_id' => 4,
            ],
            [
                'category_id' => 1,
                'quiz_id' => 5,
            ],
        ]);
    }
}