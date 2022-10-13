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
        Schema::create('mspwith_weights', function (Blueprint $table) {
            $table->id();
            $table->string('member_id');
            $table->string('member_name');
            $table->string('member_refered_by');
            $table->float('member_reference');
            $table->float('member_clubfund');
            $table->float('member_referral_clubfund');
            $table->float('member_attend_formationmeeting');
            $table->float('member_attend_clubprogram');
            $table->float('member_responsibility_gap');
            $table->float('member_attend_communityprogram');
            $table->float('member_consume');
            $table->float('member_responsibility');
            $table->float('member_time_donation');
            $table->string('msp');
            $table->tinyInteger('status');


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
        Schema::dropIfExists('mspwith_weights');
    }
};
