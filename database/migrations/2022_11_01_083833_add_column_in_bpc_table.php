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
        Schema::table('bpc', function (Blueprint $table) {
            $table->string('proposal')->nullable()->after('bmc');
            $table->string('ppt')->nullable()->after('proposal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bpc', function (Blueprint $table) {
            $table->dropColumn('proposal');
            $table->dropColumn('ppt');
        });
    }
};
