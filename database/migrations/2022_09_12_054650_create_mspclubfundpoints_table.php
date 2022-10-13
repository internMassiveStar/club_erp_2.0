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
        Schema::create('mspclubfundpoints', function (Blueprint $table) {
            $table->id();
            $table->string('member_id');
            $table->float('msp_ad');
            $table->integer('msp_rcs');
            $table->integer('msp_special_rcs');
            $table->integer('msp_donation');
            $table->integer('msp_investment');
            $table->integer('msp_others');

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
        Schema::dropIfExists('mspclubfundpoints');
    }
};
