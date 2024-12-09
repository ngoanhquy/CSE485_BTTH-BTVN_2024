<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laptops', function (Blueprint $table) {
            $table->id(); 
            $table->string('brand');
            $table->string('model');
            $table->text('specifications');
            $table->boolean('rental_status')->default(false);
            $table->foreignId('renter_id')->nullable()->constrained('renters');
            $table->timestamps(); 
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laptops');
    }
};
