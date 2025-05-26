<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'userId';

    protected $fillable = [
        'userName',
        'email',
        'password',
        'role',
        'phone'
    ];
}
