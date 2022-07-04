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
        
        Schema::create('employeetype', function (Blueprint $table) {
            $table->id();
            $table->string('employee type');
        });

        
        Schema::table('employee', function(Blueprint $table){
            $table->foreign('employee type id')->references('id')->on('employeetype');
        });

    }

    public function down()
    {
        //
        Schema::dropIfExists('employeetype');
    }
};
