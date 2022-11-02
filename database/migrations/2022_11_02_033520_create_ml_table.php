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
        Schema::create('ml', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('team_name');
            $table->string('team_leader');
            $table->string('no_wa');
            $table->enum('major', ['1', '2', '3'])->default('1');
            $table->string('bukti_bayar');
            $table->string('formulir');
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
        Schema::dropIfExists('ml');
    }
};
