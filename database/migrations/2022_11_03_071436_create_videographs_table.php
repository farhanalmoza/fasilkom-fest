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
        Schema::create('videographs', function (Blueprint $table) {
            $table->id();
            $table->enum('participation', ['1', '2'])->default('1');
            $table->string('name');
            $table->string('email');
            $table->string('no_wa');
            $table->string('agency');
            $table->enum('occupation', ['1', '2'])->default('1');
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
        Schema::dropIfExists('videographs');
    }
};
