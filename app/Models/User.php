<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'user';

    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

    protected $hidden = [
        'password', 'remember_token', 'api_token', 'deleted_at'
    ];

    protected $dates = [
        'login_at',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
