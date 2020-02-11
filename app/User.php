<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{   
	use SoftDeletes;
    protected $table = "users";
    protected $dates = ['deleted_at'];


    protected $fillable = [
        'email',
        'password',
        'name',
        'last_login_at',
        'last_login_ip',
    ];
}
