<?php

 namespace App\Models;

 use Illuminate\Database\Eloquent\Factories\HasFactory;
 use Illuminate\Database\Eloquent\Model;
 use Illuminate\Notifications\Notifiable;
 use Illuminate\Database\Eloquent\Builder;  
 
  class Title extends Model
 {
  use HasFactory, Notifiable;

  protected $fillable = [
      'id', 'title','description'   
  ];

    /**このタイトルに属するクイズ */
    public function quizzes()
    {
        return $this->belongsToMany('App\Models\Quiz')->withTimestamps(); /**classの後の第2引数はcategoryを繋げてない為上書きしてリレーションしてる */
    }

    public function Answers()
    {
        return $this->hasMany(Answer::class); 
    }
    public static function boot()
    {
        parent::boot();
        static::deleted(function ($title) {
            $title->Answers()->delete();
        });
    }


   protected $visible = ['id', 'title','description'];
 }
