<?php

use Illuminate\Database\Seeder;
use App\transaction;
use App\transactionDetail;
use App\payment;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        transaction::create([
            'userId' => 1,
            'customerId' => 1,
            'discount' => 0,
            'totalAmount' => 10000000,
            'status' => 'completed',
        ]);

        transactionDetail::create([
            'transactionId' => 1,
            'motorId' => 1,
            'quantity' => 2,
            'price' => 10000000,
            'total' => 20000000,
        ]);

        payment::create([
            'transactionId' => 1,
            'userId' => 1,
            'amount' => 25000000,
            'change' => 5000000,
            'payment_method' => 'Tunai',
            'payment_date' => '2023-01-01',
        ]);
    }
}
