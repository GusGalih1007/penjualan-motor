<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_detail', function (Blueprint $table) {
            $table->increments('transactionDetailId');
            $table->unsignedInteger('transactionId'); // Transaksi terkait
            $table->unsignedInteger('motorId'); // Barang yang dibeli
            $table->integer('quantity'); // Jumlah barang
            $table->decimal('price', 10, 2); // Harga barang
            $table->decimal('total', 15, 2);
            $table->timestamps();

            // Foreign key
            $table->foreign('transactionId')->references('transactionId')->on('transaction')->onDelete('cascade');
            $table->foreign('motorId')->references('motorId')->on('tbl_motors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_detail');
    }
}
