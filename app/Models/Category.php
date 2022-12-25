<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function quizzes()
    {
        return $this->belongsToMany('App\Models\Quiz')->withTimestamps();
    }

    protected $visible = ['id', 'name'];
}