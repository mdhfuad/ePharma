<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->string('slug');
            $table->unsignedInteger('weight');
            $table->unsignedFloat('unit_price');
            $table->unsignedBigInteger('dosage_id');
            $table->unsignedBigInteger('generic_id');
            $table->unsignedBigInteger('company_id');
            $table->timestamps();

            $table->foreign('dosage_id')->references('id')->on('dosages')->cascadeOnDelete();
            $table->foreign('generic_id')->references('id')->on('generics')->cascadeOnDelete();
            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicines');
    }
}
