<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    public function Answers()
    {
        return $this->hasMany(Answer::class); 
    }

    public static function boot()
    {
        parent::boot();
        static::deleted(function ($quiz) {
            $quiz->Answers()->delete();
        });
    }

    public function titles()
    {
        return $this->belongsToMany(Title::class); /**classの後の第2引数はcategoryを繋げてない為上書きしてリレーションしてる */
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category')->withTimestamps();
    }

    public function getCountByQuiz()
    {
    return DB::table('quiz_title')
        ->selectRaw('COUNT(quiz_id) AS count_quiz')
        ->get();
    }


    protected $visible = ['id', 'name', 'pictures', 'answer1', 'answer2', 'answer3', 'answer4','answer', 'description'];
    // public function title()
   // {
        
        //return $this->belongsTo('App\Models\Category');
   // }
}
