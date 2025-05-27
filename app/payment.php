<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\transaction;
use App\Users;

class payment extends Model
{
    protected $table = 'payment';
    protected $primaryKey = 'paymentId';
    protected $fillable = [
        'transactionId',
        'userId',
        'amount',
        'change',
        'payment_method',
        'payment_date',
    ];

    public function transaction()
    {
        return $this->belongsTo(transaction::class, 'transactionId', 'transactionId');
    }

    public function users()
    {
        return $this->belongsTo(Users::class, 'userId', 'userId');
    }
}
