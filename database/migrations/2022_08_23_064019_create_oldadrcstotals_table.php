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
        Schema::create('oldadrcstotals', function (Blueprint $table) {
            $table->id();
            $table->string('member_id')->unique();
            $table->string('old_total_ad');
            $table->string('old_cash_ad')->default(0);
            $table->string('old_cheque_ad')->default(0);
            $table->string('old_total_paidad')->default(0);
            $table->string('old_total_duead')->default(0);
            $table->string('old_total_rcs');
            $table->string('old_cash_rcs')->default(0);
            $table->string('old_cheque_rcs')->default(0);
            $table->string('old_total_paidrcs')->default(0);
            $table->string('old_total_duercs')->default(0);
          
            $table->string('insert_by')->nullable();

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
        Schema::dropIfExists('oldadrcstotals');
    }
};
