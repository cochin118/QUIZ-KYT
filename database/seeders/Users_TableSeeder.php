<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use \App\Models\User;

class Users_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'stu_num' => 'ep19109',
                'name' => '山口陸',
                'email' => 'riku@gmail.com',
                'password' => Hash::make('rikuriku'),
            ],
            [
                'stu_num' => 'ep19110',
                'name' => '山崎峻輔',
                'email' => 'syunsuke@gmail.com',
                'password' => Hash::make('syunsyun'),
            ],
        ];

        //一括登録
        foreach($users as $user) {
            User::create($user);
        }
    }
}