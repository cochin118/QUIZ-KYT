<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;

class QuizTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quiz::truncate();

        $quizes =  [
            [
                'pictures' => 'https://img.kango-roo.com/upload/images/ki/the-nurse-who-performs-hand-washing-finger-sterilization-as-standard-prophylaxis-thumbnail.jpg',
                'answer1' => '手の甲まで洗う',
                'answer2' => '洗い残しがあるといけないので洗剤は使わない',
                'answer3' => '手首まで洗う',
                'answer4' => '爪の間まで洗う',
                'answer' => 2,
                'description' => '手にはとても多くの細菌が付着しています。
                                 洗剤を使う事で99%の細菌を除去することが出来ます。'
            ],
            [
                'pictures' => 'https://img.kango-roo.com/upload/images/scio/kiso-kangogijyutsu/159-222/ch14-f4.png',
                'answer1' => '洗い残しは爪が一番多い',
                'answer2' => '洗い残しは手首が一番多い',
                'answer3' => '洗い残しは手の甲が一番多い',
                'answer4' => '洗い残しは手のひらが一番多い',
                'answer' => 1,
                'description' => '洗い残しは爪が一番多い事がわかっています。より意識的に洗いましょう'
            ],
            [
                'pictures' => 'https://img.kango-roo.com/upload/images/ki/the-nurse-who-puts-on-a-plastic-apron-gloves-as-contact-infection-prophylaxis-thumbnail.jpg',
                'answer1' => '手を洗った後はアルコールをしなくてよい',
                'answer2' => '手を洗った後もこまめにアルコール除菌を行う',
                'answer3' => '人との接触があった後はできるだけ手を洗う',
                'answer4' => '感染の多くは手を介している',
                'answer' => 1,
                'description' => '手洗いで一番大事なのはこまめに手を洗う事と除菌をする事です。心がけましょう。'
            ],
            [
                'pictures' => 'https://www.saiseikai-shiga.jp/content/images/dept/bumon/kansen/kansen1.png',
                'answer1' => 'アルコールはかければすぐ除菌される',
                'answer2' => '除菌には15秒乾かす時間がいる',
                'answer3' => '1~8までの手順を踏むことが最も効果的',
                'answer4' => 'アルコール除菌でも意識的に行う必要がある',
                'answer' => 1,
                'description' => 'アルコール除菌も手洗いと同じく洗い残しの多い爪や手首などを洗う事が大切です。'
            ],
            [
                'pictures' => 'https://img.kango-roo.com/upload/images/ki/hand-hygiene-timing-nurse-patient-thumbnail.jpg',
                'answer1' => '1は正しい',
                'answer2' => '2は正しい',
                'answer3' => '3は正しい',
                'answer4' => '4,5は正しくない',
                'answer' => 4,
                'description' => '患者さんとの接触から手を介した感染が一番多い事がわかっています。1~5の事は徹底しましょう'
            ],
            [
                'pictures' => 'images\tearai.png',
                'answer1' => '4本',
                'answer2' => '3本',
                'answer3' => '5本',
                'answer4' => '6本',
                'answer' => 4,
                'description' => '4本はベースかな。3本は三味線かな。'
            ],
            [
                'pictures' => 'images\tearai.png',
                'answer1' => 'C',
                'answer2' => 'E',
                'answer3' => 'D',
                'answer4' => 'G',
                'answer' => 4,
                'description' => 'ソの音だね。'
            ],
            [
                'pictures' => 'images\tearai.png',
                'answer1' => 'アッパーストラクチャー',
                'answer2' => 'テンションコード',
                'answer3' => 'パワーコード',
                'answer4' => 'トライアドコード',
                'answer' => 3,
                'description' => 'ロックでよく使われるけど、くるりのボーカルの人は使わないよ。'
            ],
            [
                'pictures' => 'images\tearai.png',
                'answer1' => 'ストラトキャスター',
                'answer2' => 'テレキャスター',
                'answer3' => 'レスポール',
                'answer4' => 'アコースティック',
                'answer' => 2,
                'description' => 'まぁアコギも使うんだろうけどさ。'
            ],
            [
                'pictures' => 'images\tearai.png',
                'answer1' => 'ハンマリングオン',
                'answer2' => 'プリングオフ',
                'answer3' => 'チョーキング',
                'answer4' => 'アーミング',
                'answer' => 1,
                'description' => 'どうなんやろね。'
            ],
            [
                'pictures' => 'images\tearai.png',
                'answer1' => 'ジャスティン・ビーバー',
                'answer2' => '山川出版社',
                'answer3' => 'ユヴァル・ノア・フラリ',
                'answer4' => 'ユヴァル・ノア・ハラリ',
                'answer' => 4,
                'description' => '覚えにくい名前だよね。'
            ],
            [
                'pictures' => 'images\tearai.png',
                'answer1' => '虚構',
                'answer2' => '会話',
                'answer3' => '知能',
                'answer4' => '協調性',
                'answer' => 1,
                'description' => 'フィクション'
            ],
            [
                'pictures' => 'images\tearai.png',
                'answer1' => 'まだ未熟な状態で赤ちゃんが生まれる',
                'answer2' => '背中を掻くことができる',
                'answer3' => '道具を作ることができる',
                'answer4' => '腰痛や肩こりになりやすい',
                'answer' => 1,
                'description' => 'なるほどね。'
            ],
            [
                'pictures' => 'images\tearai.png',
                'answer1' => '2声体の鍵盤楽曲',
                'answer2' => '手を加えて良くすること',
                'answer3' => '人が何かする際の動機づけ',
                'answer4' => '新しい技術や考え方を取り入れて社会的に大きな変化を起こすこと',
                'answer' => 4,
                'description' => 'その他はインベンション・リノベーション・モチベーションの説明だったよ。'
            ],
            [
                'pictures' => 'images\tearai.png',
                'answer1' => '企業のある一定時点における資産、負債、純資産の状態を表すもの',
                'answer2' => '企業のある一定期間における収益と費用の状態を表すもの',
                'answer3' => '会計期間における資金の増減、つまり収入と支出を表示する',
                'answer4' => '純資産の変動状況を表すもの',
                'answer' => 1,
                'description' => '難しいね・・。'
            ],
            [
                'pictures' => 'images\tearai.png',
                'answer1' => '現金',
                'answer2' => '手形',
                'answer3' => '借入金',
                'answer4' => '貸付金',
                'answer' => 3,
                'description' => '会計のお話です。'
            ],
        ];

        foreach($quizes as $quiz) {
            Quiz::create($quiz);
        }

    }
}