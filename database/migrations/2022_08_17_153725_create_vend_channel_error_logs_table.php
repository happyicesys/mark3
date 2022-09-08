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
        Schema::create('vend_channel_error_logs', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_cleared')->default(false);
            $table->bigInteger('vend_channel_id');
            $table->bigInteger('vend_channel_error_id');
            $table->bigInteger('vend_transaction_id')->nullable();
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
        Schema::dropIfExists('vend_channel_error_logs');
    }
};
