<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->increments('transactionId');
            $table->unsignedInteger('userId'); // Kasir atau admin
            $table->unsignedInteger('customerId')->nullable(); // Pelanggan (optional, bisa null)
            $table->decimal('discount', 5, 2)->default(0);
            $table->decimal('totalAmount', 10, 2); // Total jumlah transaksi
            $table->string('status'); // Status transaksi (misalnya: completed, pending)
            $table->timestamps();

            // Foreign key
            $table->foreign('userId')->references('userId')->on('users')
            ->onDelete('cascade');
            $table->foreign('customerId')->references('customerId')->on('tbl_customers')
            ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
