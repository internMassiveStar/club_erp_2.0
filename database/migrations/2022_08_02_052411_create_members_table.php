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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('mobile');
            $table->string('alt_mobile')->nullable();
            $table->string('address');
            $table->string('area');
            $table->string('category');
            $table->string('type');
            $table->string('nid');
            $table->date('joining_date')->nullable();
            $table->string('ad');
            $table->string('msp');
            $table->string('rcs');
            $table->string('reference_id')->nullable();
            $table->string('remarks')->nullable();
            $table->string('a_photo')->nullable();
            $table->string('a_form')->nullable();
            $table->string('a_nid')->nullable();
            $table->string('a_noc')->nullable();
            $table->string('a_certifacte_1')->nullable();
            $table->string('a_certifacte_2')->nullable();
            $table->string('a_certifacte_3')->nullable();
            $table->integer('insert_by')->nullable();
            $table->integer('update_by')->nullable();
            $table->integer('status')->default(0);
            $table->integer('norcs')->default(0);
            $table->integer('role')->default(0);
            $table->rememberToken();

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
        Schema::dropIfExists('members');
    }
};
