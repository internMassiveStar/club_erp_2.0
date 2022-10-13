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
        Schema::create('rcsoperations', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->date('receiving_date');
            $table->integer('receiving_amount');
            $table->string('receiving_tool');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('rcsoperations');
    }
};
