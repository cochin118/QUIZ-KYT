<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use \App\Models\Manager;

class Managers_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $managers = [
            [
                'man_num' => '111',
                'name' => 'アシスタント山口',
                'email' => 'riku@gmail.com',
                'password' => Hash::make('rikuriku'),
            ],
            [
                'man_num' => '222',
                'name' => 'アシスタント山崎',
                'email' => 'syunsuke@gmail.com',
                'password' => Hash::make('syunsyun'),
            ],
            [
                'man_num' => '1234',
                'name' => 'テスト指導者',
                'email' => 'sidousya@gmail.com',
                'password' => Hash::make('12341234'),
            ],

        ];

        //一括登録
        foreach($managers as $manager) {
            Manager::create($manager);
        }
    }
}