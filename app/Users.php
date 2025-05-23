<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
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
