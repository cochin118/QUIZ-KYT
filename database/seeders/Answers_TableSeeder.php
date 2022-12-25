<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Answer;
use App\Models\Title;
use App\Models\Category;
use App\Models\Quiz;


class Answers_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answers')->insert([
            [
                'answer' => '正解',
                'user_id' => '1',
                'title_id' => '1',
                'quiz_id' => '1',
            ],
            [
                'answer' => '不正解',
                'user_id' => '1',
                'title_id' => '1',
                'quiz_id' => '2',
            ],
            [
                'answer' => '不正解',
                'user_id' => '1',
                'title_id' => '1',
                'quiz_id' => '3',
            ],
            [
                'answer' => '正解',
                'user_id' => '1',
                'title_id' => '1',
                'quiz_id' => '4',
            ],
            [
                'answer' => '正解',
                'user_id' => '1',
                'title_id' => '1',
                'quiz_id' => '5',
            ],
    ]);
}
}