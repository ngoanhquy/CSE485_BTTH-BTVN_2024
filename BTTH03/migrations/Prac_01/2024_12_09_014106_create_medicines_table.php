<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id('medicine_id'); 
            $table->string('name', 255); 
            $table->string('brand', 100)->nullable(); 
            $table->string('dosage', 50)->nullable(); 
            $table->string('form', 50)->nullable(); 
            $table->decimal('price', 10, 2); 
            $table->integer('stock'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medicines');
    }
}
