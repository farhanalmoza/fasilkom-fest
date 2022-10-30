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
        Schema::create('karya_uiux', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->references('id')->on('uiux')->onDelete('cascade');
            $table->string('super');
            $table->string('proposal');
            $table->string('desain');
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
        Schema::dropIfExists('karya_uiux');
    }
};
