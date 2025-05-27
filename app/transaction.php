<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Users;
use App\Customers;
use App\transactionDetail;
use App\payment;

class transaction extends Model
{
    protected $table = 'transaction';
    protected $primaryKey = 'transactionId';
    protected $fillable = [
        'userId',
        'customerId',
        'discount',
        'totalAmount',
        'status',
    ];

    public function details()
    {
        return $this->hasMany(transactionDetail::class, 'transactionId', 'transactionId');
    }

    public function payment()
    {
        return $this->hasOne(payment::class, 'transactionId', 'transactionId');
    }

    public function users()
    {
        return $this->belongsTo(Users::class, 'userId', 'userId');
    }

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customerId', 'customerId');
    }
}
