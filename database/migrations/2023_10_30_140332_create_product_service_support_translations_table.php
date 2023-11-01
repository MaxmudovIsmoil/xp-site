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
        Schema::create('product_service_support_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_service_support_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->longText('description');
            $table->unique(['product_service_support_id', 'locale']);
            $table->foreign('product_service_support_id')->references('id')->on('product_service_supports')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_service_support_translations');
    }
};
