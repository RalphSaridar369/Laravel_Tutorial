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
            $table->unsignedBigInteger('warehouse_id');
            $table->unsignedBigInteger('product_id');
            $table->bigInteger('quantity');
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('product');
            $table->foreign('warehouse_id')->references('id')->on('warehouse');
        
        });

        // Schema::table('hasProducts',function(Blueprint $table){
        //     $table->foreign('product_id')->references('id')->on('product');
        // });

        
        // Schema::table('hasProducts',function(Blueprint $table){
        //     $table->foreign('warehouse_id')->references('id')->on('warehouse');
        // });
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
