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
        Schema::table('uiux', function (Blueprint $table) {
            $table->string('orisinalitas')->nullable()->after('bukti_bayar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('uiux', function (Blueprint $table) {
            $table->dropColumn('orisinalitas');
        });
    }
};
