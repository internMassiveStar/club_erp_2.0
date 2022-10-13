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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('mobile');
            $table->string('address');
            $table->string('nid');
            $table->date('joining_date');
            $table->date('resigning_date')->nullable();
            $table->string('last_degree');
            $table->string('last_institute');
      
            $table->integer('last_year');
            $table->integer('last_result');
            $table->string('certificate')->nullable();
            $table->integer('insert_by')->nullable();
            $table->integer('update_by')->nullable();
            $table->rememberToken();
          
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
        Schema::dropIfExists('employees');
    }
};
