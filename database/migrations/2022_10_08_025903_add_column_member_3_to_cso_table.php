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
        Schema::table('cso', function (Blueprint $table) {
            $table->string('member_3')->nullable()->after('kartu_pelajar_2');
            $table->string('kartu_pelajar_3')->nullable()->after('kartu_pelajar_2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cso', function (Blueprint $table) {
            //
        });
    }
};
