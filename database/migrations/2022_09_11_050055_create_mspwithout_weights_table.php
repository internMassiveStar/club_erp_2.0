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
        Schema::create('mspwithout_weights', function (Blueprint $table) {
            $table->id();
            $table->string('member_id');
            $table->string('member_name');
            $table->string('member_refered_by');
            $table->float('member_reference')->nullable();
            $table->float('member_clubfund')->nullable();
            $table->float('member_referral_clubfund')->nullable();
            $table->float('member_attend_formationmeeting')->nullable();
            $table->float('member_attend_clubprogram')->nullable();
            $table->float('member_responsibility_gap');
            $table->float('member_attend_communityprogram')->nullable();
            $table->float('member_consume');
            $table->float('member_responsibility');
            $table->float('member_time_donation')->nullable();
    
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
        Schema::dropIfExists('mspwithout_weights');
    }
};
