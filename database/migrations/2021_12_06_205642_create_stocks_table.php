<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('medicine_id');
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('stock');
            $table->date('mfg_date');
            $table->date('expiry_date');
            $table->unsignedFloat('purchase_price'); // total purchase price
            // $table->unsignedFloat('unit_price'); // selling price per unit

            $table->timestamps();

            $table->foreign('medicine_id')->references('id')->on('medicines')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
