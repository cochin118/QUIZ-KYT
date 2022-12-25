<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
           // QuizTableSeeder::class,
            // TitleTableSeeder::class,    
            // Category_Quiz_TitleTableSeeder::class,
            // Quiz_TitleTableSeeder::class,

            Users_TableSeeder::class,
            Managers_TableSeeder::class,
            Admins_TableSeeder::class,
            Titles_TableSeeder::class,
            Categories_TableSeeder::class,
            Quizzes_TableSeeder::class,
            Category_Quiz_TableSeeder::class,
            Quiz_Title_TableSeeder::class,
            Answers_TableSeeder::class,

        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
