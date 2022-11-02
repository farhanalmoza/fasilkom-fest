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
        Schema::create('pubg', function (Blueprint $table) {
            $table->id();
            $table->string('team_name');
            $table->string('team_leader');
            $table->string('no_wa');
            $table->enum('major', ['1', '2', '3'])->default('1');
            $table->string('player_2');
            $table->string('player_3');
            $table->string('player_4');
            $table->string('player_5');
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
        Schema::dropIfExists('pubg');
    }
};
