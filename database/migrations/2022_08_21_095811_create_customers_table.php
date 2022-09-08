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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->nullable();
            $table->string('code');
            $table->bigInteger('created_by')->nullable();
            $table->datetime('deactivated_at')->nullable();
            $table->bigInteger('handled_by')->nullable();
            $table->string('name');
            $table->text('ops_note')->nullable();
            $table->bigInteger('parent_id')->nullable();
            $table->bigInteger('pay_term_id')->nullable();
            $table->bigInteger('price_template_id')->nullable();
            $table->bigInteger('profile_id');
            $table->text('remarks')->nullable();
            $table->bigInteger('status_id');
            $table->bigInteger('updated_by')->nullable();
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
        Schema::dropIfExists('customers');
    }
};
