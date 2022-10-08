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
        Schema::create('uiux', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('team_name')->nullable();
            $table->string('instansi')->nullable();
            $table->string('no_wa')->nullable();
            $table->string('member_1')->nullable();
            $table->string('identitas_1')->nullable();
            $table->string('member_2')->nullable();
            $table->string('identitas_2')->nullable();
            $table->string('bukti_bayar')->nullable();
            $table->enum('verified', [0, 1, 2])->default(0);
            $table->enum('finalis', [0, 1])->default(0);
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
        Schema::dropIfExists('uiux');
    }
};
