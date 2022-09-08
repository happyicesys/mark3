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
        Schema::table('vend_temps', function (Blueprint $table) {
            $table->renameColumn('value', 'temp');
        });

        Schema::table('vend_data', function (Blueprint $table) {
            $table->renameColumn('value', 'log');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vend_temps', function (Blueprint $table) {
            //
        });
    }
};
