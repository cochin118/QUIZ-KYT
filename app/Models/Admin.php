<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Builder;  
use Illuminate\Database\Eloquent\Model;

class Admin extends User
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        // 'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // protected $casts = [
    //     // 'email_verified_at' => 'datetime',
    // ];
    // protected $table = 'admins';
}
