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
        Schema::create('product_detail_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_detail_id')->unsigned();
            $table->string('locale')->index();
            $table->string('key');
            $table->longText('value');
            $table->unique(['product_detail_id', 'locale']);
            $table->foreign('product_detail_id')->references('id')->on('product_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_detail_translations');
    }
};
