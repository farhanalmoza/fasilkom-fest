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
        Schema::create('pes', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('name');
            $table->string('npm');
            $table->string('no_wa');
            $table->string('ktm');
            $table->enum('major', ['1', '2', '3'])->default('1');
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
        Schema::dropIfExists('pes');
    }
};
