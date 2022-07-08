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
            $table->string('employee_type');
            $table->softDeletes();
            $table->timestamps();
        });

        
        Schema::table('employee', function(Blueprint $table){
            $table->foreign('employee_type_id')->references('id')->on('employeetype');
        });

    }

    public function down()
    {
        //
        Schema::dropIfExists('employeetype');
    }
};
