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
        Schema::create('rcsmasters', function (Blueprint $table) {
            $table->id();
            $table->string('member_id');
            $table->date('rcs_date');
            $table->string('rcs_month');
            $table->integer('rcs_tobepaid');

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
        Schema::dropIfExists('rcsmasters');
    }
};
