<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table = 'tbl_customers';
    protected $primaryKey = 'customerId';
    protected $fillable = [
        'customerName',
        'email',
        'phone',
        'address',
        'member_status'
    ];
}
