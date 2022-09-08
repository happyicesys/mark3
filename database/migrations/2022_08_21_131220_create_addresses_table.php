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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('block_num')->nullable();
            $table->string('building')->nullable();
            $table->text('full_address')->nullable();
            $table->string('unit_num')->nullable();
            $table->string('street_name');
            $table->string('postcode');
            $table->string('city')->nullable()->default('Singapore');
            $table->bigInteger('country_id');
            $table->decimal('latitude', 11, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->integer('type')->nullable();
            $table->integer('sequence')->nullable();
            $table->morphs('modelable');
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
        Schema::dropIfExists('addresses');
    }
};
