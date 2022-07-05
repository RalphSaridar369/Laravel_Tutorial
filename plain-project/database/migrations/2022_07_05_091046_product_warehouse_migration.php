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
        //
        Schema::create('hasProducts',function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('warehouse id');
            $table->unsignedBigInteger('product id');
            $table->bigInteger('quantity');
        });

        Schema::table('hasProducts',function(Blueprint $table){
            $table->foreign('product id')->references('id')->on('product');
        });

        
        Schema::table('hasProducts',function(Blueprint $table){
            $table->foreign('warehouse id')->references('id')->on('warehouse');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('hasProducts');
    }
};
