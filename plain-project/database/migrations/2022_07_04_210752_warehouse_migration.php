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
        Schema::create('warehouse',function(Blueprint $table){
            $table->id();
            $table->string('warehouse name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('employee',function(Blueprint $table){
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
        Schema::dropIfExists('warehouse');
    }
};
