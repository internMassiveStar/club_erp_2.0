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
        Schema::create('membereducations', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->string('degree')->nullable();
            $table->string('institute')->nullable();
            $table->string('result')->nullable();
            $table->string('year')->nullable();
            $table->integer('insert_by')->nullable();
            $table->integer('update_by')->nullable();
        
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
        Schema::dropIfExists('membereducations');
    }
};
