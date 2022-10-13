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
        Schema::create('memberpersonals', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->string('sopouse_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('children_name_1')->nullable();
            $table->string('children_name_2')->nullable();
            $table->string('children_name_3')->nullable();
            $table->string('date_birth')->nullable();
            $table->string('home_district')->nullable();
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
        Schema::dropIfExists('memberpersonals');
    }
};
