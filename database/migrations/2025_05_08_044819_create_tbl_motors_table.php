<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMotorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_motors', function (Blueprint $table) {
            $table->increments('motorId');
            $table->string('motorName', 30);
            $table->string('color', 20);
            $table->unsignedInteger('categoryId');
            $table->unsignedInteger('engineId');
            $table->unsignedInteger('brandId');
            $table->string('numberPlate', 15);
            $table->string('condition', 10);
            $table->integer('price');
            $table->integer('stock');
            $table->text('photo');
            $table->timestamps();

            $table->foreign('categoryId')->references('categoryId')->on('tbl_category');
            $table->foreign('engineId')->references('engineId')->on('tbl_engine');
            $table->foreign('brandId')->references('brandId')->on('tbl_brand');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_motors');
    }
}
