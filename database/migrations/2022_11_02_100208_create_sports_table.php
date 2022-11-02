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
        Schema::create('sports', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->enum('category', ['1', '2', '3'])->default('1');
            $table->string('leader');
            $table->string('npm');
            $table->string('no_wa');
            $table->string('team_name');
            $table->string('formulir');
            $table->string('ktm');
            $table->string('bukti_bayar');
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
        Schema::dropIfExists('sports');
    }
};
