<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\transaction;
use App\Motors;

class transactionDetail extends Model
{
    protected $table = 'transaction_detail';
    protected $primaryKey = 'transactionDetailId';
    protected $fillable = [
        'transactionId',
        'motorId',
        'quantity',
        'price',
        'total'
    ];

    public function transaction()
    {
        return $this->belongsTo(transaction::class, 'transactionId', 'transactionId');
    }

    public function motor()
    {
        return $this->belongsTo(Motors::class, 'motorId', 'motorId');
    }
}
