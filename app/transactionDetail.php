<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\transactions;
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
        return $this->belongsTo(Transactions::class, 'transactionId', 'transactionId');
    }

    public function motor()
    {
        return $this->belongsTo(Products::class, 'motorId', 'motorId');
    }
}
