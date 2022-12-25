<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $visible = ['id', 'num', 'result', 'user_id', 'title_id', 'quiz_id'];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
    public function title()
    {
      return $this->belongsTo(Title::class);
    }
    public function quiz()
    {
      return $this->belongsTo(Quiz::class);
    }

}
