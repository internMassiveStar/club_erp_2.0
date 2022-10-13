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
        Schema::create('weightages', function (Blueprint $table) {
            $table->id();
            $table->float('msp1');
            $table->float('msp2');
            $table->float('msp3');
            $table->float('msp4');
            $table->float('msp5');
            $table->float('msp6');
            $table->float('msp7');
            $table->float('msp8');
            $table->float('msp9');
            $table->float('msp10');
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
        Schema::dropIfExists('weightages');
    }
};
