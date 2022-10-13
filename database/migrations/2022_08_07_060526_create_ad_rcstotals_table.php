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
        Schema::create('ad_rcstotals', function (Blueprint $table) {
            $table->id();
            $table->string('member_id')->unique();
            $table->string('total_ad');
            $table->string('cash_ad')->default(0);
            $table->string('cheque_ad')->default(0);
            $table->string('total_paidad')->default(0);
            $table->string('total_duead')->default(0);
            $table->string('total_rcs');
            $table->string('cash_rcs')->default(0);
            $table->string('cheque_rcs')->default(0);
            $table->string('total_paidrcs')->default(0);
            $table->string('total_duercs')->default(0);
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
        Schema::dropIfExists('ad_rcstotals');
    }
};
