<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->increments('paymentId');
            $table->unsignedInteger('transactionId'); // Transaksi terkait
            $table->unsignedInteger('userId'); // Kasir atau admin yang memproses pembayaran
            $table->decimal('amount', 10, 2); // Jumlah pembayaran
            $table->decimal('change', 15, 2)->nullable(); // Kembalian
            $table->string('payment_method'); // Metode pembayaran (misalnya: tunai, kartu)
            $table->date('payment_date'); // Tanggal pembayaran
            $table->timestamps();

            // Foreign key
            $table->foreign('transactionId')->references('transactionId')->
            on('transaction')->onDelete('cascade');
            $table->foreign('userId')->references('userId')->on('users')->
            onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment');
    }
}
