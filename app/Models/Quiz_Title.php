<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz_Title extends Model
{
    protected $visible = ['id', 'title_id', 'quiz_id'];
}
