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
        Schema::create('cso', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('team_name')->nullable();
            $table->string('member_1')->nullable();
            $table->string('kartu_pelajar_1')->nullable();
            $table->string('member_2')->nullable();
            $table->string('kartu_pelajar_2')->nullable();
            $table->string('bukti_bayar')->nullable();
            $table->enum('verified', [0, 1])->default(0);
            $table->float('try_out', 5, 2)->nullable();
            $table->float('skor', 5, 2)->nullable();
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
        Schema::dropIfExists('cso');
    }
};
