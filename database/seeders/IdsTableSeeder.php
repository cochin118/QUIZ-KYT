<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ids;

class IdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ids::truncate();

        $ids =  [
            [
                'title_id' => 1,
                'quiz_id' => 1,
            ],
            [
                'title_id' => 1,
                'quiz_id' => 2,
            ],
            [
                'title_id' => 1,
                'quiz_id' => 3,
            ],
            [
                'title_id' => 1,
                'quiz_id' => 4,
            ],
            [
                'title_id' => 1,
                'quiz_id' => 5,
            ],
        ];

        foreach($ids as $id) {
            Ids::create($id);
        }

    }
}
