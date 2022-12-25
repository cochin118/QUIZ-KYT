<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use \App\Models\Quiz;
use \App\Models\Title;

class Quiz_Title_TableSeeder extends Seeder
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
                'quiz_id' => 1, 
                'title_id' => 1,               
            ],
            [   
                'quiz_id' => 2,
                'title_id' => 1,
            ],
            [
                'quiz_id' => 3,
                'title_id' => 1,
            ],
            [
                'quiz_id' => 4,
                'title_id' => 1,
            ],
            [
                'quiz_id' => 5,
                'title_id' => 1,
            ],
        ]);
    }
}