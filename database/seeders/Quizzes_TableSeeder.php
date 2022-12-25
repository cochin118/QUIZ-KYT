<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use \App\Models\Quiz;

class Quizzes_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quizzes = [
            [
                'name' => '手指衛生1',
                'pictures' => 'tearai.jpg',
                'answer1' => '手の甲まで洗う',
                'answer2' => '洗い残しがあるといけないので洗剤は使わない',
                'answer3' => '手首まで洗う',
                'answer4' => '爪の間まで洗う',
                'answer' => 2,
                'description' => '手にはとても多くの細菌が付着しています。
                                 洗剤を使う事で99%の細菌を除去することが出来ます。'
            ],
            [
                'name' => '手指衛生2',
                'pictures' => 'tearai.jpg',
                'answer1' => '手を洗った後はアルコールをしなくてよい',
                'answer2' => '手を洗った後もこまめにアルコール除菌を行う',
                'answer3' => '人との接触があった後はできるだけ手を洗う',
                'answer4' => '感染の多くは手を介している',
                'answer' => 1,
                'description' => '手洗いで特に大事なのはこまめに手を洗う事と除菌をする事です。心がけましょう。'
            ],
            [
                'name' => '手指衛生3',
                'pictures' => 'tearai.jpg',
                'answer1' => '清潔な布で手を拭く',
                'answer2' => '清潔な紙で水分を拭き取る',
                'answer3' => 'タオルは使いまわしてもよい',
                'answer4' => '自然乾燥はしてはならい',
                'answer' => 3,
                'description' => '水分を拭きとる際にも注意をする必要があります。'
            ],
            [
                'name' => '電気的除細動1',
                'pictures' => '電気的除細動.jpg',
                'answer1' => 'ペースメーカーの有無を確認する',
                'answer2' => 'メガネ、時計、義歯などの貴金属類を除去しておく',
                'answer3' => '貴金属類をつけていても問題はない',
                'answer4' => '体表面が濡れている時は拭き取る',
                'answer' => 3,
                'description' => '電気的除細動を使用する際、患者さんが貴金属類を身につけていると適切な量の電気エネルギーが心臓に伝わりません。また、患者さんの体に対しても火傷などを起こすもとになるので注意が必要です。'
            ],
            [
                'name' => '電気的除細動2',
                'pictures' => '電気的除細動.jpg',
                'answer1' => '酸素マスクをしている場合は発火防止のため外す',
                'answer2' => '医師、看護師は患者に触れないよう離れる',
                'answer3' => '必要に応じて胸骨圧迫を行う',
                'answer4' => '医師、看護師は患者が動かないように直接抑える',
                'answer' => 4,
                'description' => '電気的除細動を使用する際は、感電する危険があるため、患者に触れないよう離れる必要があります。'
            ],
        ];

        //一括登録
        foreach($quizzes as $quiz) {
            Quiz::create($quiz);
        }
    }
}