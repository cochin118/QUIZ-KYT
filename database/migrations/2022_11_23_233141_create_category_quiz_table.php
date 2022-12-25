<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_quiz', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('category_id')->comment('カテゴリーID');
            $table->unsignedBigInteger('quiz_id')->comment('ユーザーID');
            // $table->unsignedBigInteger('title_id')->comment('タイトルID');

            //外部キー
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade')->comment('');
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onUpdate('cascade')->onDelete('cascade')->comment('');
            // $table->foreign('title_id')->references('id')->on('titles')->onUpdate('cascade')->onDelete('cascade')->comment('');
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_quiz_title');
    }
};
