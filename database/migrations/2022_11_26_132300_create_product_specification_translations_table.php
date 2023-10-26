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
        Schema::create('product_specification_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_specification_id')->unsigned();
            $table->string('locale')->index();
            $table->string('key')->default('');
            $table->longText('value1')->default('');
            $table->longText('value2')->default('');
//            $table->unique(['product_specification_id', 'locale']);
//            $table->foreign('product_specification_id')->references('id')->on('product_specifications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_specification_translations');
    }

};
