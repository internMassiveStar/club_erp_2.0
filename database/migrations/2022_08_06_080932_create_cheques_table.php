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
        Schema::create('cheques', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->string('ad_rcs',3);
            $table->string('type');
            $table->string('bank_name');
            $table->integer('cheque_no')->unique();
            $table->integer('receiving_amount'); 
            
            $table->date('receiving_date');
            $table->date('cheque_date');
            $table->date('honored_date')->nullable();
            $table->date('dishonored_date')->nullable();
            $table->integer('oldcheque_no')->nullable();

            $table->string('cheque_inby');
            $table->string('cheque_managedby')->nullable();
            $table->string('cheque_outby')->nullable();
            $table->string('Remarks')->nullable();
            $table->string('attachment')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('process')->default(0);
            
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
        Schema::dropIfExists('cheques');
    }
};
