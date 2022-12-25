<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Builder;  
use Illuminate\Database\Eloquent\Model;

class Manager extends User
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'man_num',
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // protected $table = 'admins';
    public function sendPasswordResetNotification($token)       //追記
    {                                                           //追記
        $url = url("manager/password/reset/$token");              //追記
        $this->notify(new ResetPasswordNotification($url));     //追記
    }                                                           //追記
}
