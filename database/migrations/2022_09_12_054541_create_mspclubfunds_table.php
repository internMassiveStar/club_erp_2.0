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
        Schema::create('mspclubfunds', function (Blueprint $table) {
            $table->id();
            $table->string('member_id');
            $table->integer('ad_paid');
            $table->integer('ad_name_value');
            $table->integer('ad_activities_value');
            $table->integer('total_ad_value');
            $table->integer('actual_ad_value');
            $table->integer('rcs');
            $table->integer('special_rcs');
            $table->integer('donation');
            $table->integer('investment');
            $table->integer('actual_others_value');
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
        Schema::dropIfExists('mspclubfunds');
    }
};
