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
        Schema::create('msplistvalues', function (Blueprint $table) {
            $table->id();
            $table->string('member_id');
            $table->integer('member_reference')->nullable();
            $table->integer('member_attend_formationmeeting')->nullable();
            $table->integer('member_attend_clubprogram')->nullable();
            $table->integer('member_attend_communityprogram')->nullable();
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
        Schema::dropIfExists('msplistvalues');
    }
};
